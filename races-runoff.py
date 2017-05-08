import csv, sys, simplejson

def is_in_county(p):
  """
  Check if the precinct number has a letter prefix, which would mean it's
  from another county.
  """
  try:
    float(p[0:1])
    return True
  except ValueError:
    return False


def write_precinct_data(races, precinct, data):
  """
  Write the race data to the passed precinct data dict
  """
  try:
    sorted_races = sorted(races, key=lambda k: k['votes'], reverse=True)
    data[precinct] = {
      'races': sorted_races,
      'winner': sorted_races[0]
    }

    # Special handling for ties
    if (sorted_races[0]['votes'] == sorted_races[1]['votes']):
      data[precinct]['winner'] = {
        'candidate': 'Tie',
        'votes': '-',
        'party': 'TIE'
      }
  except IndexError:
    pass


# And walk the CSV
def build_race_file(target_races, filename):

  # Get the JSON files for Travis and combine them (willimson edited out)
  combined = open('precincts/combined-simplified.geojson', 'r')
  text = combined.read()
  combined.close()
  geo = simplejson.loads(text)

  races = []
  current_precinct = None
  running_vote_total = 0
  precinct_data = {}

  # Loop through Travis results and add them to precinct data
  with open('results/travis_results_20161213.csv', 'rb') as input_file:

    # Open a reader for the input file
    results = csv.reader(input_file, delimiter=',')
    next(results, None)

    # Loop over the input, parse & write the new file
    for row in results:

      # Pull our data from the CSV columns
      precinct = row[0]
      in_county = is_in_county(precinct)
      candidate_name = row[2]
      total_votes = int(row[4])
      race = row[1]
      party = row[3]

      if race in target_races and in_county:

        if current_precinct != precinct and current_precinct != None:
          if running_vote_total > 0:
            write_precinct_data(races, current_precinct, precinct_data)

          races = []
          running_vote_total = 0

        races.append({
          'candidate': candidate_name,
          'votes': total_votes,
          'party': party
        })

        current_precinct = precinct

        # Keep a running vote total to calculate the percentage down the road
        running_vote_total = running_vote_total + total_votes

    # Write the last row
    write_precinct_data(races, current_precinct, precinct_data)

  # Loop through Williamson results and add them to precinct data
  with open('results/williamson_results_20161213.csv', 'rb') as input_file:

    # Open a reader for the input file
    results = csv.reader(input_file, delimiter=',')
    next(results, None)

    # Loop over the input, parse & write the new file
    for row in results:

      # Pull our data from the CSV columns
      precinct = "W" + str(row[0])
      race = row[1]
      candidate_name = row[2]
      party = row[3]
      if party == "NON":
        party = None
      total_votes = int(row[4])

      if race in target_races:

        if current_precinct != precinct and current_precinct != None:
          if running_vote_total > 0:
            write_precinct_data(races, current_precinct, precinct_data)

          races = []
          running_vote_total = 0

        races.append({
          'candidate': candidate_name,
          'votes': total_votes,
          'party': party
        })

        current_precinct = precinct

        # Keep a running vote total to calculate the percentage down the road
        running_vote_total = running_vote_total + total_votes

  # # Loop through Hays county results from city of austin and add them to the precinct data
  # with open('results/travis_hays_results_20161108.csv', 'rb') as input_file:

  #   # Open a reader for the input file
  #   results = csv.reader(input_file, delimiter=',')
  #   next(results, None)

  #   # Loop over the input, parse & write the new file
  #   for row in results:

  #     # Pull our data from the CSV columns
  #     precinct = "H" + str(row[0])
  #     race = row[1]
  #     candidate_name = row[2]
  #     party = row[3]
  #     if party == "NON":
  #       party = None
  #     total_votes = int(row[4])

  #     if race in target_races:

  #       if current_precinct != precinct and current_precinct != None:
  #         if running_vote_total > 0:
  #           write_precinct_data(races, current_precinct, precinct_data)

  #         races = []
  #         running_vote_total = 0

  #       races.append({
  #         'candidate': candidate_name,
  #         'votes': total_votes,
  #         'party': party
  #       })

  #       current_precinct = precinct

  #       # Keep a running vote total to calculate the percentage down the road
  #       running_vote_total = running_vote_total + total_votes

    # Write the last row
    write_precinct_data(races, current_precinct, precinct_data)

  to_thin = []
  for i, feature in enumerate(geo['features']):
    precinct = feature['properties']['PCT']

    old_props = feature['properties']
    del feature['properties']

    try:
      feature['properties'] = dict(old_props.items() + precinct_data[precinct].items())
    except KeyError:
      to_thin.append(i)
      pass

  for feature in to_thin[::-1]:
    geo['features'].pop(feature)

  json_out = open('public/race-data/' + filename + '.json', 'w')
  json_out.write(simplejson.dumps(geo))
  json_out.close()
build_race_file(["DISTRICT 10, AUSTIN CITY COUNCIL, CITY OF AUSTIN"], 'r-auscc-d10')
build_race_file(["PLACE 4, ACC TRUSTEE, AUSTIN COMMUNITY COLLEGE DISTRICT", "ACC, Pl 4, Trustee AUSTIN COMMUNITY COLLEGE DISTRICT"], 'r-acc-p4')
build_race_file(["PLACE 9, ACC TRUSTEE, UNEXPIRED TERM, AUSTIN COMMUNITY COLLEGE DISTRICT", "ACC, Pl. 9, Trustee AUSTIN COMMUNITY COLLEGE DISTRICT"], 'r-acc-p9')
