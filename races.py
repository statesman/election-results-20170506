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
  with open('results/travis_results_20161108.csv', 'rb') as input_file:

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
  with open('results/williamson_results_20161108.csv', 'rb') as input_file:

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
  with open('results/travis_hays_results_20161108.csv', 'rb') as input_file:

    # Open a reader for the input file
    results = csv.reader(input_file, delimiter=',')
    next(results, None)

    # Loop over the input, parse & write the new file
    for row in results:

      # Pull our data from the CSV columns
      precinct = "H" + str(row[0])
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
build_race_file(["PRESIDENT", "President and Vice-President FEDERAL"], 'pres')
build_race_file(["STRAIGHT PARTY"], 'stpty')
build_race_file(["DISTRICT 10, UNITED STATES REPRESENTATIVE"], 'usr-d10')
build_race_file(["DISTRICT 17, UNITED STATES REPRESENTATIVE"], 'usr-d17')
build_race_file(["DISTRICT 21, UNITED STATES REPRESENTATIVE"], 'usr-d21')
build_race_file(["DISTRICT 25, UNITED STATES REPRESENTATIVE"], 'usr-d25')
build_race_file(["DISTRICT 35, UNITED STATES REPRESENTATIVE"], 'usr-d35')

build_race_file(["RAILROAD COMMISSIONER", "Railroad Commissioner"], 'rr')
build_race_file(["DISTRICT 24, STATE SENATOR"], 'ss-d24')
build_race_file(["DISTRICT 46, STATE REPRESENTATIVE"], 'sr-d46')
build_race_file(["DISTRICT 47, STATE REPRESENTATIVE"], 'sr-d47')
build_race_file(["DISTRICT 48, STATE REPRESENTATIVE"], 'sr-d48')
build_race_file(["DISTRICT 49, STATE REPRESENTATIVE"], 'sr-d49')
build_race_file(["DISTRICT 50, STATE REPRESENTATIVE"], 'sr-d50')
build_race_file(["DISTRICT 51, STATE REPRESENTATIVE"], 'sr-d51')

build_race_file(["PLACE 3, JUSTICE, SUPREME COURT", "Place 3, Justice, Supreme Court"], 'scj-p3')
build_race_file(["PLACE 5, JUSTICE, SUPREME COURT", "Place 5, Justice, Supreme Court"], 'scj-p5')
build_race_file(["PLACE 9, JUSTICE, SUPREME COURT", "Place 9, Justice, Supreme Court"], 'scj-p9')
build_race_file(["PLACE 2, JUDGE, COURT OF CRIMINAL APPEALS", "Pl 2, Judge, Court of Criminal Appeals"], 'ccaj-p2')
build_race_file(["PLACE 5, JUDGE, COURT OF CRIMINAL APPEALS", "Pl 5, Judge, Court of Criminal Appeals"], 'ccaj-p5')
build_race_file(["PLACE 6, JUDGE, COURT OF CRIMINAL APPEALS", "Pl 6, Judge, Court of Criminal Appeals"], 'ccaj-p6')

build_race_file(["DISTRICT ATTORNEY, 53RD JUDICIAL DISTRICT"], 'da-d53')
build_race_file(["SHERIFF"], 's')
build_race_file(["COUNTY TAX ASSESSOR-COLLECTOR"], 'ctax')
build_race_file(["PRECINCT 1, COUNTY COMMISSIONER"], 'cc-p1')
build_race_file(["PRECINCT 3, COUNTY COMMISSIONER"], 'cc-p3')
build_race_file(["PRECINCT 2, CONSTABLE"], 'c-p2')

build_race_file(["PROPOSITION, CITY OF AUSTIN", "City of Austin Bond Election"], 'coa-p1')
build_race_file(["DISTRICT 2, AUSTIN CITY COUNCIL, CITY OF AUSTIN"], 'auscc-d2')
build_race_file(["DISTRICT 4, AUSTIN CITY COUNCIL, CITY OF AUSTIN"], 'auscc-d4')
build_race_file(["DISTRICT 6, AUSTIN CITY COUNCIL, CITY OF AUSTIN", "District 6, Austin City Council"], 'auscc-d6')
build_race_file(["DISTRICT 7, AUSTIN CITY COUNCIL, CITY OF AUSTIN"], 'auscc-d7')
build_race_file(["DISTRICT 10, AUSTIN CITY COUNCIL, CITY OF AUSTIN"], 'auscc-d10')

build_race_file(["PLACE 3, ALDERMAN, CITY OF JONESTOWN"], 'coja-p3')
build_race_file(["PLACE 5, ALDERMAN, CITY OF JONESTOWN"], 'coja-p5')

build_race_file(["PLACE 2, COUNCILMEMBER, CITY OF LAGO VISTA"], 'lvcc-p2')
build_race_file(["PLACE 4, COUNCILMEMBER, CITY OF LAGO VISTA"], 'lvcc-p4')
build_race_file(["PLACE 6, COUNCILMEMBER, CITY OF LAGO VISTA"], 'lvcc-p6')
build_race_file(["PROP. 1, CITY OF LAGO VISTA"], 'lv-p1')
build_race_file(["PROP. 2, CITY OF LAGO VISTA"], 'lv-p2')
build_race_file(["PROP. 3, CITY OF LAGO VISTA"], 'lv-p3')

build_race_file(["BOARD OF TRUSTEES, MANOR ISD"], 'msb')
build_race_file(["CITY COUNCIL, PLACE 6, CITY OF MANOR"], 'manor-p6')

build_race_file(["MAYOR, CITY OF PFLUGERVILLE", "City of Pflugerville, Mayor"], 'pflm')
build_race_file(["PLACE 1, COUNCIL MEMBER, CITY OF PFLUGERVILLE", "City of Pflugerville, Council, Place 1"], 'pflcc-p1')
build_race_file(["PROP. 1, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 1"], 'pfl-p1')
build_race_file(["PROP. 2, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 2"], 'pfl-p2')
build_race_file(["PROP. 3, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 3"], 'pfl-p3')
build_race_file(["PROP. 4, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 4"], 'pfl-p4')
build_race_file(["PROP. 5, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 5"], 'pfl-p5')
build_race_file(["PROP. 6, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 6"], 'pfl-p6')
build_race_file(["PROP. 7, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 7"], 'pfl-p7')
build_race_file(["PROP. 8, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 8"], 'pfl-p8')
build_race_file(["PROP. 9, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 9"], 'pfl-p9')
build_race_file(["PROP. 10, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 10"], 'pfl-p10')
build_race_file(["PROP. 11, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 11"], 'pfl-p11')
build_race_file(["PROP. 12, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 12"], 'pfl-p12')
build_race_file(["PROP. 13, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 13"], 'pfl-p13')
build_race_file(["PROP. 14, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 14"], 'pfl-p14')
build_race_file(["PROP. 15, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 15"], 'pfl-p15')
build_race_file(["PROP. 16, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 16"], 'pfl-p16')
build_race_file(["PROP. 17, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 17"], 'pfl-p17')
build_race_file(["PROP. 18, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 18"], 'pfl-p18')
build_race_file(["PROP. 19, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 19"], 'pfl-p19')
build_race_file(["PROP. 20, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 20"], 'pfl-p20')
build_race_file(["PROP. 21, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 21"], 'pfl-p21')
build_race_file(["PROP. 22, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 22"], 'pfl-p22')
build_race_file(["PROP. 23, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 23"], 'pfl-p23')
build_race_file(["PROP. 24, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 24"], 'pfl-p24')
build_race_file(["PROP. 25, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 25"], 'pfl-p25')
build_race_file(["PROP. 26, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 26"], 'pfl-p26')
build_race_file(["PROP. 27, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 27"], 'pfl-p27')
build_race_file(["PROP. 28, CITY OF PFLUGERVILLE", "City of Pflugerville Proposition 28"], 'pfl-p28')

build_race_file(["VILLAGE COUNCIL, TWO YEAR TERM, VILLAGE OF POINT VENTURE"], 'vpv-2')
build_race_file(["VILLAGE COUNCIL, ONE YEAR TERM, VILLAGE OF POINT VENTURE"], 'vpv-1')

build_race_file(["MAYOR, CITY OF SUNSET VALLEY"], 'sv-m')
build_race_file(["CITY COUNCIL, CITY OF SUNSET VALLEY"], 'sv-cc')
build_race_file(["CITY COUNCIL, SPECIAL ELECTION, CITY OF SUNSET VALLEY"], 'sv-scc')
build_race_file(["PROPOSITION NO. 1, CITY OF SUNSET VALLEY"], 'sv-p1')

build_race_file(["COUNCIL MEMBERS, VILLAGE OF VOLENTE"], 'vov-cm')

build_race_file(["DISTRICT 5, MEMBER, STATE BOARD OF EDUCATION"], 'sboe-d5')
build_race_file(["DISTRICT 10, MEMBER, STATE BOARD OF EDUCATION", "Member, State Board of Educ., Dist 10"], 'sboe-d10')
build_race_file(["PLACE 4, ACC TRUSTEE, AUSTIN COMMUNITY COLLEGE DISTRICT", "ACC, Pl 4, Trustee AUSTIN COMMUNITY COLLEGE DISTRICT"], 'acc-p4')
build_race_file(["PLACE 5, ACC TRUSTEE, AUSTIN COMMUNITY COLLEGE DISTRICT", "ACC, Pl 5, Trustee AUSTIN COMMUNITY COLLEGE DISTRICT"], 'acc-p5')
build_race_file(["PLACE 6, ACC TRUSTEE, AUSTIN COMMUNITY COLLEGE DISTRICT", "ACC, Pl 6, Trustee AUSTIN COMMUNITY COLLEGE DISTRICT"], 'acc-p6')
build_race_file(["PLACE 9, ACC TRUSTEE UNEXPIRED TERM, AUSTIN COMMUNITY COLLEGE DISTRICT", "ACC, Pl. 9, Trustee AUSTIN COMMUNITY COLLEGE DISTRICT"], 'acc-p9')
build_race_file(["AISD DISTRICT 2, SINGLE MEMBER TRUSTEE, AUSTIN INDEPENDENT SCHOOL DISTRICT"], 'aisd-d2')
build_race_file(["AISD AT-LARGE POSITION 8, AUSTIN INDEPENDENT SCHOOL DISTRICT"], 'aisd-p8')
build_race_file(["PLACE 3, BOARD OF TRUSTEE, LEANDER ISD", "Leander ISD, Trustee, Place 3"], 'lisd-p3')
build_race_file(["PLACE 4, BOARD OF TRUSTEE, LEANDER ISD", "Leander ISD, Trustee, Place 4"], 'lisd-p4')
build_race_file(["PLACE 5, BOARD OF TRUSTEE, LEANDER ISD", "Leander ISD, Trustee, Place 5"], 'lisd-p5')
build_race_file(["PLACE 7, BOARD OF TRUSTEES, ROUND ROCK ISD", "Trustee, Round Rock ISD, Place 7"], 'rrisd-p7')

build_race_file(["PLACE 1, DIRECTORS, NORTH AUSTIN MUNICIPAL UTILITY DISTRICT NO. 1", "Dir., N Austin MUD No. 1, Pl. 1"], 'namud1-p1')
build_race_file(["BOARD OF TRUSTEES, WELLS BRANCH COMMUNITY LIBRARY DISTRICT"], 'wblib')
build_race_file(["PLACE 2, DIRECTOR, WELLS BRANCH MUNICIPAL UTILITY DISTRICT", "Wells Branch MUD, Directors, Place 2"], 'wbmud-p2')
build_race_file(["PLACE 4, DIRECTOR, WELLS BRANCH MUNICIPAL UTILITY DISTRICT", "Wells Br. MUD, Dirs., Place 4"], 'wbmud-p4')
build_race_file(["PROPOSITION NO. 1, TRAVIS COUNTY EMERGENCY SERVICES DISTRICT NO. 14"], 'tcsed14-p1')
build_race_file(["DIRECTORS, TRAVIS COUNTY MUNICIPAL UTILITY DISTRICT NO. 11"], 'scmud11-d')
build_race_file(["DIRECTORS, TANGLEWOOD FOREST LIMITED DISTRICT"], 'twld-d')
build_race_file(["DIRECTORS, LOST CREEK LIMITED DISTRICT"], 'lcld-d')
build_race_file(["PROPOSITION NO. 1, TRAVIS COUNTY EMERGENCY SERVICES DISTRICT NO. 7"], 'tcesd7-p1')
build_race_file(["DIRECTORS, WILLIAMSON-TRAVIS COUNTIES MUNICIPAL UTILITY DISTRICT NO. 1", "Dirs, Williamson-Travis Cos. MUD #1"], 'wtmud1-d')
build_race_file(["DIRECTORS, CASCADES MUNICIPAL UTILITY DISTRICT NO. 1"], 'cmud1-d')
build_race_file(["PROPOSITION 1, CASCADES MUNICIPAL UTILITY DISTRICT NO. 1"], 'cmud1-p1')
build_race_file(["PROPOSITION 2, CASCADES MUNICIPAL UTILITY DISTRICT NO. 1"], 'cmud1-p2')
build_race_file(["PROPOSITION 3, CASCADES MUNICIPAL UTILITY DISTRICT NO. 1"], 'cmud1-p3')
build_race_file(["PROPOSITION 4, CASCADES MUNICIPAL UTILITY DISTRICT NO. 1"], 'cmud1-p4')
build_race_file(["PROPOSITION 5, CASCADES MUNICIPAL UTILITY DISTRICT NO. 1"], 'cmud1-p5')
build_race_file(["PROPOSITION 6, CASCADES MUNICIPAL UTILITY DISTRICT NO. 1"], 'cmud1-p6')
build_race_file(["PROPOSITION 7, CASCADES MUNICIPAL UTILITY DISTRICT NO. 1"], 'cmud1-p7')

# WILLIAMSON ONLY
build_race_file(["US Rep., District 31 FEDERAL"], 'usr-d31')
build_race_file(["State Representative, District 52"], 'sr-d52')
build_race_file(["State Representative, District 136"], 'sr-d136')
build_race_file(["County Commissioner, Precinct 1 COMMISSIONER PRECINCT 1"], 'wccc-p1')
build_race_file(["County Commissioner, Precinct 3 COMMISSIONER PRECINCT 3"], 'wccc-p3')
build_race_file(["Block House MUD, Directors"], 'bhmd-d')
build_race_file(["City of Jarrell"], 'jarrell')
build_race_file(["City of Thrall Bond Election"], 'thrall')
build_race_file(["MUD 17 Proposition 1 WILLIAMSON COUNTY MUD 17"], 'wcm17-p1')
build_race_file(["MUD 17 Proposition 2 WILLIAMSON COUNTY MUD 17"], 'wcm17-p2')
build_race_file(["MUD 17 Proposition 3 WILLIAMSON COUNTY MUD 17"], 'wcm17-p3')
build_race_file(["MUD 17 Proposition 4 WILLIAMSON COUNTY MUD 17"], 'wcm17-p4')
build_race_file(["MUD 21 Proposition 1 WILLIAMSON COUNTY MUD 21"], 'wcm21-p1')
build_race_file(["MUD 21 Proposition 2 WILLIAMSON COUNTY MUD 21"], 'wcm21-p2')
build_race_file(["MUD 21 Proposition 3 WILLIAMSON COUNTY MUD 21"], 'wcm21-p3')
build_race_file(["MUD 21 Proposition 4 WILLIAMSON COUNTY MUD 21"], 'wcm21-p4')
build_race_file(["MUD 21 Directors WILLIAMSON COUNTY MUD 21"], 'wcm21-d')
build_race_file(["ESD #5 EMERGENCY SERVICES DISTRICT NO. 5"], 'esd5')
