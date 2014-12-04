function mostrarMapa(cod_partido,editar){

	var container = L.DomUtil.get("map");
	if (container._leaflet) {
			map.remove();
			var div = document.createElement("div");
			div.setAttribute("id", "map");
			$(".modal-body").append(div);
		}    

    $( document ).ready(function() {
    	
 
		
    	
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

		if(editar){
	  		var geojson = Terraformer.WKT.parse($(".geometria_barrio").val());
	  		var layer=L.geoJson(geojson);
	  		
	  		L.geoJson(geojson, {
			  onEachFeature: function (feature, layer) {
			    drawnItems.addLayer(layer);
			  }
			});
	  		$(".leaflet-draw-draw-polygon").fadeOut();
	  			
	  	}

		map.on('draw:created', function (e) {
			var type = e.layerType,
				layer = e.layer;
			var geojson = layer.toGeoJSON();
    		var wkt = Terraformer.WKT.convert(geojson.geometry);	
			
			if (type === 'marker') {
				layer.bindPopup('A popup!');
			}

			drawnItems.addLayer(layer);			  			

  			$(".geometria_barrio").val(wkt);
  			$(".leaflet-draw-draw-polygon").fadeOut();
		});

		map.on('draw:edited', function (e) {
			var layers = e.layers;
    		layers.eachLayer(function (layer) {
        		var geojson = layer.toGeoJSON();
    			var wkt = Terraformer.WKT.convert(geojson.geometry);	
    			$(".geometria_barrio").val(wkt);
    		});
						  			
		});

		map.on('draw:deleted',function(e){
			$(".leaflet-draw-draw-polygon").fadeIn();
		});

		$("#actualizar_geom").click(function(e){
			console.log("mostrando mapa para edicion");
			mostrarMapa('',true);
		});
	  	
	});



}
