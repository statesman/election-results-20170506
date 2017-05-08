import simplejson

# Get the JSON files for Travis and Williamson and combine them
travis_file = open('travis.geojson', 'r')
text = travis_file.read()
travis_file.close()
travis_geo = simplejson.loads(text)

williamson_file = open('williamson.geojson', 'r')
text = williamson_file.read()
williamson_file.close()
williamson_geo = simplejson.loads(text)

hays_file = open('hays.geojson', 'r')
text = hays_file.read()
hays_file.close()
hays_geo = simplejson.loads(text)

# Loop through Williamson, and align the precinct name with Travis's and clean
# out the rest of the junk props
for precinct in williamson_geo['features']:
  old_precinct = precinct['properties']['Label']
  del precinct['properties']
  precinct['properties'] = {
    'PCT': 'W' + str(old_precinct)
  }

# Loop through Hays, and align the precinct name with Travis's and clean
# out the rest of the junk props
for precinct in hays_geo['features']:
  old_precinct = precinct['properties']['PRECINCT']
  del precinct['properties']
  precinct['properties'] = {
    'PCT': 'H' + str(old_precinct)
  }

geo = {
  "type": "FeatureCollection",
  # "features": travis_geo['features'] + williamson_geo['features']
  "features": travis_geo['features'] + williamson_geo['features'] + hays_geo['features']
}

json_out = open('combined.geojson', 'w')
json_out.write(simplejson.dumps(geo))
json_out.close()
