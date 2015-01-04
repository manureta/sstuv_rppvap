var partidos=[];
var map;
function mostrarMapa(cod_partido,editar){
	var zoom=11;
	if(!cod_partido){
		cod_partido='all'; // toda la provincia
		zoom=6;
	}
	cargarPartidos();

	var container = L.DomUtil.get("map");
	if (container._leaflet) {
			map.remove();
			var div = document.createElement("div");
			div.setAttribute("id", "map");
			$(".modal-body").append(div);
		}    

    $( document ).ready(function() {
    	
     	
    	$("#MapaModal").modal();

    	map=  L.map("map");
    	map.invalidateSize();

	  	var mapquestOSM = L.tileLayer("http://{s}.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png", {
	        maxZoom: 19,
	        subdomains: ["otile1", "otile2", "otile3", "otile4"],
	        attribution: 'Tiles courtesy of <a href="http://www.mapquest.com/" target="_blank">MapQuest</a> <img src="http://developer.mapquest.com/content/osm/mq_logo.png">. Map data (c) <a href="http://www.openstreetmap.org/" target="_blank">OpenStreetMap</a> contributors, CC-BY-SA.'
	      });
	  	
	  	var capa_folios = L.tileLayer.wms("http://190.188.234.6/geoserver/wms", {
		    layers: 'registro:folios',
		    format: 'image/png',
		    transparent: true,
		    attribution: ""
		});

	  	map.addLayer(mapquestOSM);
	  	map.addLayer(capa_folios);
	  	
	  	map.setView(new L.LatLng(partidos[cod_partido][1],partidos[cod_partido][0]), partidos[cod_partido][2]);

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

		if(editar!="solover")map.addControl(drawControl);

		if(editar && ($(".geometria_barrio").val()!=="")){
	  		var geojson = Terraformer.WKT.parse($(".geometria_barrio").val());
	  		var layer=L.geoJson(geojson);
	  		
	  		L.geoJson(geojson, {
			  onEachFeature: function (feature, layer) {
			    drawnItems.addLayer(layer);
			  }
			});
	  		$(".leaflet-draw-draw-polygon").fadeOut();
	  		map.fitBounds(drawnItems.getBounds());	
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
  			var area = L.GeometryUtil.geodesicArea(layer.getLatLngs()).toFixed(2);
        	$(".superficie_barrio").val(area/10000);
		});

		map.on('draw:edited', function (e) {
			var layers = e.layers;
    		layers.eachLayer(function (layer) {
        		var geojson = layer.toGeoJSON();
    			var wkt = Terraformer.WKT.convert(geojson.geometry);	
    			$(".geometria_barrio").val(wkt);
    			var area = L.GeometryUtil.geodesicArea(layer.getLatLngs()).toFixed(2);
        		$(".superficie_barrio").val(area/10000);
        		$(".boton_guardar").removeAttr("disabled");
    		});
						  			
		});

		map.on('draw:deleted',function(e){
			$(".leaflet-draw-draw-polygon").fadeIn();
		});
/*
		$("#actualizar_geom").click(function(e){
			var p = $(".partido").val().substring(0,3);
			mostrarMapa(p,true);
		});

*/		
	  	
	});



}

function cargarPartidos(){
			partidos['all']=[-58,-37,6,true];
			partidos['055']=[-57.9531182610472,-34.9201559357356,12,true]; 
			partidos['012']=[-60.4912431248804,-35.1152226313929,14,true]; 
			partidos['018']=[-59.8236308180915,-34.376595866889,14,false]; 
			partidos['038']=[-59.0248891082879,-34.0950144347492,14,false]; 
			partidos['040']=[-61.2614811024812,-37.2490084418284,14,false]; 
			partidos['046']=[-58.9531355831663,-34.6063452594321,12,false]; 
			partidos['093']=[-59.7786989777015,-35.6396385799998,14,false]; 
			partidos['098']=[-60.216141980974,-33.3322535411366,14,false]; 
			partidos['119']=[-61.7222820205934,-36.3067621981872,14,false]; 
			partidos['122']=[-62.9602718940259,-36.7513910429451,14,false]; 
			partidos['127']=[-62.8613690466709,-36.4585878017945,14,false]; 
			partidos['128']=[-62.4674933718909,-34.8442042859421,14,false]; 
			partidos['058']=[-59.1002506678815,-36.0135663644531,14,false]; 
			partidos['027']=[-58.0139023841793,-35.5782277523889,14,false]; 
			partidos['062']=[-59.0974898897448,-35.1862875262327,14,true]; 
			partidos['037']=[-57.7918446086296,-36.6405675713892,14,false]; 
			partidos['031']=[-59.0982352919832,-34.2949471216048,14,false]; 
			partidos['032']=[-58.2809373223717,-34.8045709588214,12,true]; 
			partidos['026']=[-60.4730914482252,-34.646325353383,14,true]; 
			partidos['105']=[-57.3251944686673,-36.5202425718284,14,false]; 
			partidos['028']=[-60.0198973918224,-34.8983223411673,14,true]; 
			partidos['120']=[-58.196309480035,-34.7568204033554,14,true]; 
			partidos['008']=[-58.2575508493626,-37.8458227394461,14,true]; 
			partidos['100']=[-58.4227998117286,-35.0241548550439,12,true]; 
			partidos['020']=[-57.8072060318597,-36.0922729950883,14,false]; 
			partidos['021']=[-61.0973454019301,-33.8979416939824,14,true]; 
			partidos['133']=[-58.7012306993599,-34.4980690019624,14,true]; 
			partidos['019']=[-61.748344085716,-36.5987326252353,14,false]; 
			partidos['065']=[-57.5180614631538,-35.0816463249025,14,false]; 
			partidos['036']=[-58.49872566631,-35.7670679668166,14,false]; 
			partidos['015']=[-58.7613163016825,-35.0544773156935,14,false]; 
			partidos['072']=[-58.7246231162323,-34.6705081708628,12,true]; 
			partidos['057']=[-58.5801738150081,-34.4237660390346,14,true]; 
			partidos['053']=[-59.8039955125397,-37.6750559961343,14,false]; 
			partidos['042']=[-56.9439486731787,-36.4070259426036,14,false]; 
			partidos['075']=[-59.2798304117638,-35.0063513457463,14,false];
			partidos['043']=[-58.3177894635941,-35.5153348538151,14,false]; 
			partidos['104']=[-60.0242322482601,-36.357122615306,14,false]; 
			partidos['014']=[-58.9601459611808,-34.1636154296856,12,false]; 
			partidos['116']=[-59.6061304473654,-38.3447701418137,14,false]; 
			partidos['050']=[-63.0334263022607,-35.0333247834172,14,false]; 
			partidos['136']=[-58.6724023916597,-34.6605630275736,14,true]; 
			partidos['129']=[-58.3800874721674,-34.9177821998197,14,false]; 
			partidos['107']=[-62.7339361273962,-35.9739229386806,14,false]; 
			partidos['088']=[-59.0903423852744,-36.775045705792,14,false]; 
			partidos['083']=[-58.1397749785676,-36.0053653314121,14,false]; 
			partidos['089']=[-62.9753068211595,-35.4904774712528,14,false]; 
			partidos['074']=[-58.7913282721188,-34.6508840544068,12,true]; 
			partidos['096']=[-58.5572652326456,-34.4412032963556,14,true]; 
			partidos['009']=[-59.5031337437484,-33.8067836921352,14,false]; 
			partidos['091']=[-59.3311672366028,-35.3975330190739,14,false]; 
			partidos['115']=[-57.9069641136704,-34.8582426221433,14,true]; 
			partidos['070']=[-58.5606964073826,-34.6773549466472,12,true]; 
			partidos['084']=[-58.9126461971162,-34.4577391889146,12,true]; 
			partidos['114']=[-57.8889689478493,-34.8668076252111,14,true]; 
			partidos['041']=[-58.9473505771885,-34.9277171131936,14,false]; 
			partidos['035']=[-61.3053131707865,-34.3049805432617,14,false]; 
			partidos['064']=[-59.1141633707238,-34.5652428988951,12,true]; 
			partidos['063']=[-58.4041143678536,-34.7571079825435,14,true]; 
			partidos['005']=[-58.4891852065273,-37.1534766742845,14,false]; 
			partidos['073']=[-58.8043457164162,-35.4410812030644,14,false]; 
			partidos['029']=[-57.6742923663223,-36.3148573123297,14,false]; 
			partidos['047']=[-58.5378345613138,-34.5771868404597,14,true];	

		}
