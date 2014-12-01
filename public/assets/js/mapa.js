function mostrarMapa(cod_partido){
    $( document ).ready(function() {
    	console.log(cod_partido);
    	$("#MapaModal").modal();
    	var map=  L.map("map");
    	map.invalidateSize();

	  	var mapquestOSM = L.tileLayer("http://{s}.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png", {
	        maxZoom: 19,
	        subdomains: ["otile1", "otile2", "otile3", "otile4"],
	        attribution: 'Tiles courtesy of <a href="http://www.mapquest.com/" target="_blank">MapQuest</a> <img src="http://developer.mapquest.com/content/osm/mq_logo.png">. Map data (c) <a href="http://www.openstreetmap.org/" target="_blank">OpenStreetMap</a> contributors, CC-BY-SA.'
	      });
	  	
	  	map.addLayer(mapquestOSM);
	  	
	  	map.setView(new L.LatLng(-36.82687474287728, -59.94140624999999), 7);

	  	// EDITOR

	  	var drawnItems = new L.FeatureGroup();
		map.addLayer(drawnItems);

		var drawControl = new L.Control.Draw({
			draw: {
				position: 'topleft',
				polygon: {
					title: 'Dibujar un poligono',
					tooltip:"Dibujar",
					allowIntersection: false,
					drawError: {
						color: '#b00b00',
						timeout: 1000
					},
					shapeOptions: {
						color: '#bada55'
					},
					showArea: true
				},
				marker:false,
				line:false,
				circle:false,
				polyline:false,
				rectangle:false
			},
			edit: {
				featureGroup: drawnItems
			}
		});
		map.addControl(drawControl);

		map.on('draw:created', function (e) {
			var type = e.layerType,
				layer = e.layer;

			if (type === 'marker') {
				layer.bindPopup('A popup!');
			}

			drawnItems.addLayer(layer);
			//var json = layer.toGeoJSON()
  			//var geom = JSON.stringify(json);
  			var geom=toWKT(layer);

  			$(".geometria_barrio").val(geom);
		});
	  	
	});



}

function toWKT(layer) {
    var lng, lat, coords = [];
    if (layer instanceof L.Polygon || layer instanceof L.Polyline) {
        var latlngs = layer.getLatLngs();
        for (var i = 0; i < latlngs.length; i++) {
	    	latlngs[i]
	    	coords.push(latlngs[i].lng + " " + latlngs[i].lat);
	        if (i === 0) {
	        	lng = latlngs[i].lng;
	        	lat = latlngs[i].lat;
	        }
	};
        if (layer instanceof L.Polygon) {
            return "POLYGON((" + coords.join(",") + "," + lng + " " + lat + "))";
        } else if (layer instanceof L.Polyline) {
            return "LINESTRING(" + coords.join(",") + ")";
        }
    } else if (layer instanceof L.Marker) {
        return "POINT(" + layer.getLatLng().lng + " " + layer.getLatLng().lat + ")";
    }
}