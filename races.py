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
  # with open('results/travis_results_20161108.csv', 'rb') as input_file:

  #   # Open a reader for the input file
  #   results = csv.reader(input_file, delimiter=',')
  #   next(results, None)

  #   # Loop over the input, parse & write the new file
  #   for row in results:

  #     # Pull our data from the CSV columns
  #     precinct = row[0]
  #     in_county = is_in_county(precinct)
  #     candidate_name = row[2]
  #     total_votes = int(row[4])
  #     race = row[1]
  #     party = row[3]

  #     if race in target_races and in_county:

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

  #   # Write the last row
  #   write_precinct_data(races, current_precinct, precinct_data)

  # Loop through Williamson results and add them to precinct data
  with open('results/williamson_results_20170506.csv', 'rb') as input_file:

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

  # Loop through Hays county results from city of austin and add them to the precinct data
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

  #   # Write the last row
  #   write_precinct_data(races, current_precinct, precinct_data)

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
build_race_file(["Round Rock ISD Proposition 1"], 'rrisdp1')
build_race_file(["Round Rock ISD Proposition 2"], 'rrisdp2')
build_race_file(["Round Rock ISD Proposition 3"], 'rrisdp3')
build_race_file(["Pl 6, Board of Trustees, PflugervilleISD PFLUGERVILLE"], 'pvisdp6')
build_race_file(["Pl 7, Board of Trustees, PflugervilleISD PFLUGERVILLE"], 'pvisdp7')
build_race_file(["Pl 2 Board of Trustees, PflugervilleISD PFLUGERVILLE ISD"], 'pvisdp2')
build_race_file(["Hutto ISD, Board of Trustees"], 'hisdt')
build_race_file(["Granger ISD, Trustees"], 'gisdt')
build_race_file(["Thrall ISD, Trustees (At Large)"], 'tisdt')
build_race_file(["Liberty Hill ISD, Trustee, Place 1"], 'lhisdp1')
build_race_file(["Liberty Hill ISD, Trustee, Place 2"], 'lhisdp2')
build_race_file(["Georgetown ISD, Trustee, Place 4"], 'gisdp4')
build_race_file(["Georgetown ISD, Trustee, Place 5"], 'gisdp5')
build_race_file(["City of Florence, Alderpersons"], 'fa')
build_race_file(["City of Granger, Mayor"], 'grm')
build_race_file(["City of Granger, Council Member"], 'grcm')
build_race_file(["City of Taylor, City Council At Large"], 'tc')
build_race_file(["City of Cedar Park, Council, Place 1"], 'cpp1')
build_race_file(["City of Hutto, Council, Place 1"], 'hp1')
build_race_file(["City of Hutto, Council, Place 4"], 'hp4')
build_race_file(["City of Round Rock, Mayor"], 'rrm')
build_race_file(["City of Round Rock, Council, Place 1"], 'rrcp1')
build_race_file(["City of Round Rock, Council, Place 4"], 'rrcp4')
build_race_file(["City of Round Rock, Proposition 1"], 'rrp1')
build_race_file(["City of Round Rock, Proposition 2"], 'rrp2')
build_race_file(["City of Round Rock, Proposition 3"], 'rrp3')
build_race_file(["City of Round Rock, Proposition 4"], 'rrp4')
build_race_file(["MUD 34 Proposition 1 WILLIAMSON COUNTY MUD 34"], 'm34p1')
build_race_file(["MUD 34 Proposition 2 WILLIAMSON COUNTY MUD 34"], 'm34p2')
build_race_file(["MUD 34 Proposition 3 WILLIAMSON COUNTY MUD 34"], 'm34p3')
build_race_file(["MUD 34 Proposition 4 WILLIAMSON COUNTY MUD 34"], 'm34p4')
build_race_file(["MUD 34 Proposition 5 WILLIAMSON COUNTY MUD 34"], 'm34p5')
build_race_file(["MUD 34 Proposition 6 WILLIAMSON COUNTY MUD 34"], 'm34p6')
build_race_file(["City of Hutto, Proposition 1"], 'hp1')
build_race_file(["City of Hutto, Proposition 2"], 'hp2')
build_race_file(["City of Hutto, Proposition 3"], 'hp3')
build_race_file(["City of Hutto, Proposition 4"], 'hp4')
build_race_file(["City of Hutto, Proposition 5"], 'hp5')
build_race_file(["City of Hutto, Proposition 6"], 'hp6')
build_race_file(["City of Hutto, Proposition 7"], 'hp7')
build_race_file(["City of Hutto, Proposition 8"], 'hp8')
build_race_file(["City of Hutto, Proposition 9"], 'hp9')
build_race_file(["City of Hutto, Proposition 10"], 'hp10')
build_race_file(["City of Hutto, Proposition 11"], 'hp11')
build_race_file(["City of Hutto, Proposition 12"], 'hp12')
build_race_file(["City of Hutto, Proposition 13"], 'hp13')
build_race_file(["City of Hutto, Proposition 14"], 'hp14')
build_race_file(["City of Hutto, Proposition 15"], 'hp15')
build_race_file(["City of Hutto, Proposition 16"], 'hp16')
build_race_file(["City of Hutto, Proposition 17"], 'hp17')
build_race_file(["City of Hutto, Proposition 18"], 'hp18')
build_race_file(["City of Hutto, Proposition 19"], 'hp19')
build_race_file(["City of Hutto, Proposition 20"], 'hp20')
build_race_file(["City of Hutto, Proposition 21"], 'hp21')
build_race_file(["Emergency Services District 8 EMERGENCY SERVICES"], 'esd8')
build_race_file(["Emergency Services District 8 ANNEX ANNEX EMERGENCY"], 'esd8a')
build_race_file(["Emergency Services District 9 EMERGENCY SERVICES"], 'esd9')
build_race_file(["Emergency Services District 9 ANNEX ANNEX EMERGENCY"], 'esd9a')
