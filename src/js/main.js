(function(jQuery, ElectionMap, _) {

  var addRailLine = function(map) {
    // Draw the proposed rail line
    $.getJSON('rail-routes/new.json', function(data) {
      var rail_line = data.features[0].geometry.coordinates;
      var transposed_coords = _.map(rail_line, function(el) {
        return [el[1], el[0]];
      });
      map.gmap.drawPolyline({
        path: transposed_coords,
        strokeColor: '#B72B21',
        strokeOpacity: 0.75,
        strokeWeight: 5,
        zIndex: 1000
      });
      map.key.add({
        color: "#B72B21",
        label: "Proposed rail line"
      });
    });
  };

  $(function() {

    var map = new ElectionMap('#map');

    // default race to show
    var defaultRace = 'rrisdp1';

    if(window.location.hash) {
      defaultRace = window.location.hash.slice(1);
      $('#race').val(defaultRace);
    }

    map.drawWinners(defaultRace);

    $("#address").geocomplete({
      map: map.gmap.map,
      bounds: map.gmap.getBounds(),
      types: ['address']
    }).bind("geocode:result", function(e, result){
      map.mark(result.geometry.location.k, result.geometry.location.B);
    });

    $('#race').change(function() {
      var race = $(this).val();
      if(race === "rail") {
        map.drawSupport("rail", "For");
        addRailLine(map);
      }
      else {
        map.drawWinners(race);
      }
    });

  });

}(jQuery, ElectionMap, _));
