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
	        attribution: ''
	      });
	  	var gcallejero=new L.Google('ROADMAP');
	  	var gsatelital=new L.Google('SATELLITE');
	  	var ghibrido=new L.Google('HYBRID');

	  	var capa_folios = L.tileLayer.wms("http://190.188.234.6/geoserver/wms", {
		    layers: 'registro:folios',
		    format: 'image/png',
		    transparent: true,
		    attribution: ""
		});

	  	var base_sstuv = L.tileLayer.wms("http://190.188.234.6/geoserver/wms", {
		    layers: 'partidos_pba_2014_cod_catastro,circunscripcion,secciones,macizos_pba,parcelas',
		    format: 'image/png',
		    transparent: true,
		    attribution: ""
		});

	  	var catastro = L.tileLayer.wms("http://cartoservices.arba.gov.ar/geoserver/cartoservice/wms", {
		    layers: 'cartoservice:grupocapas',
		    format: 'image/png',
		    transparent: true,
		    attribution: ""
		});

	  	var  geodesia = L.tileLayer.wms("http://www.mosp.gba.gov.ar/geoserver/Geodesia/wms?", {
		    layers: 'ParcelarioCompleto',
		    format: 'image/png',
		    transparent: true,
		    attribution: ""
		});

	  	map.addLayer(mapquestOSM);

	  	var baseMaps = {
		    "OSM": mapquestOSM,
		    "Google Satelital": gsatelital,
		    "Google Callejero": gcallejero,
		    "Google Híbrido":ghibrido,
		    "Catastro ARBA":catastro,
		    "Parcelario Geodesia":geodesia
		    
		};

		var overlayMaps = {
			"Base complementaria":base_sstuv,
			"Folios":capa_folios
		};
		
		L.control.layers(baseMaps, overlayMaps).addTo(map);
	  	map.addLayer(base_sstuv);
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
  			var area = L.GeometryUtil.geodesicArea(layer.getLatLngs());
        	$(".superficie_barrio").val(round(area/10000,2));
		});

		map.on('draw:edited', function (e) {
			var layers = e.layers;
    		layers.eachLayer(function (layer) {
        		var geojson = layer.toGeoJSON();
    			var wkt = Terraformer.WKT.convert(geojson.geometry);	
    			$(".geometria_barrio").val(wkt);
    			var area = L.GeometryUtil.geodesicArea(layer.getLatLngs());
        		$(".superficie_barrio").val(round(area/10000,2));
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

function round(value, decimals) {
    return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
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
			partidos['017']=[-62.4210578943063,-35.3930364412551,14,false];
			partidos['134']=[-57.3397635564368,-35.3879588893983,14,true];
			partidos['030']=[-58.467138059724,-34.8191890003529,14,true];
			partidos['051']=[-60.0984681982464,-38.0331675706441,14,false];
			partidos['090']=[-60.7334329421152,-34.1970876867739,14,false];
			partidos['002']=[-60.2822020484416,-35.0310789126329,14,true];
			partidos['102']=[-59.6881636924375,-34.7693381776016,14,false];
			partidos['121']=[-59.7924837423463,-34.171725125731,14,false];
			partidos['094']=[-59.4471010372522,-34.4415356828941,14,false];
			partidos['067']=[-60.2550696067623,-34.2927902585234,14,false];
			partidos['052']=[-62.4222221400218,-37.0109018134045,14,false];
			partidos['081']=[-63.1646789207133,-36.2679547276334,14,false];
			partidos['095']=[-59.4739256523757,-34.2426634984641,14,false];
			partidos['092']=[-62.3477191452088,-37.7620800775824,14,false];
			partidos['054']=[-60.946880439229,-34.5930640851912,14,true];
			partidos['049']=[-61.0388479189837,-35.0012125707763,14,true];
			partidos['078']=[-60.3222898377905,-36.8931982368962,14,true];
			partidos['001']=[-62.76118390586,-37.1804769358729,14,true];
			partidos['033']=[-57.8389488943584,-38.2691040905143,14,true];
			partidos['108']=[-60.2763181012157,-38.3765577232418,14,true];
			partidos['010']=[-60.1075693581245,-34.0680194567488,14,false];
			partidos['056']=[-60.8006001115708,-37.5449241401871,14,true];
			partidos['085']=[-62.7685973889746,-37.5494986726944,14,false];
			partidos['023']=[-61.3498755537824,-37.9853191164639,14,false];
			partidos['086']=[-58.2557247259003,-34.7136363894205,14,true];
			partidos['003']=[-58.3845030356102,-34.7988754675011,14,true];
			partidos['103']=[-59.1366548595403,-37.3303546460454,14,true];
			partidos['125']=[-56.9713740573437,-37.2607249982286,14,true];
			partidos['111']=[-62.6933176413705,-38.8304091391576,14,false];
			partidos['034']=[-60.0146507129532,-36.0226985479864,14,false];
			partidos['061']=[-58.7827986552147,-38.1644297582014,14,false];
			partidos['123']=[-56.6887407105839,-36.5824402798154,14,false];
			partidos['044']=[-61.891723408774,-34.7653229782732,14,false];
			partidos['101']=[-58.6220137920701,-34.6510577232598,14,true];
			partidos['135']=[-58.6517859935613,-34.6028045441868,14,true];
			partidos['076']=[-58.7385446211042,-38.5562099477776,14,true];
			partidos['069']=[-57.4291579607531,-37.743009485028,14,false];
			partidos['113']=[-61.8356754565133,-38.8505238973722,14,true];
			partidos['022']=[-61.2877231148533,-38.7195413172196,14,false];
			partidos['126']=[-61.2902004332813,-38.9858651289946,14,true];
			partidos['118']=[-58.7955472745648,-34.3452610718091,12,true];
			partidos['132']=[-58.7537278224317,-34.5267757026291,14,true];
			partidos['039']=[-57.1368609314978,-36.9952105205975,14,false];
			partidos['124']=[-56.8681909450252,-37.1117234550862,14,true];
			partidos['025']=[-58.3928919182071,-34.6995018405334,14,true];
			partidos['130']=[-58.5250160073078,-34.8546899070317,14,true];
			partidos['082']=[-60.5747294855506,-33.8969523921085,14,true];
			partidos['045']=[-57.5501820141784,-37.9974133531645,12,true];
			partidos['080']=[-61.8980868115709,-35.8101994266628,14,true];
			partidos['059']=[-61.5434427044782,-34.4982434935277,14,false];
			partidos['109']=[-60.1716802346261,-35.433629801576,14,false];
			partidos['071']=[-59.432570552592,-34.6505590948559,14,true];
			partidos['068']=[-58.8352570144737,-34.7836720425174,12,false];
			partidos['011']=[-61.1128760181556,-36.2307638892474,14,false];
			partidos['079']=[-62.9836151062877,-40.8022420188391,14,true];
			partidos['013']=[-58.2386190759668,-35.1684832862411,14,false];
			partidos['006']=[-59.8626794945576,-36.7768541269167,14,true];
			partidos['117']=[-58.5648591846466,-34.6037213655458,14,true];
			partidos['097']=[-58.5104448383009,-34.4674927243786,14,true];
			partidos['110']=[-58.4900705765675,-34.5107864020848,14,true];
			partidos['131']=[-58.7127211399639,-34.5437416686031,14,true];
			partidos['066']=[-57.8814805717694,-36.8616861549058,14,true];
			partidos['106']=[-62.2211984271271,-38.1006060351792,14,true];
			partidos['024']=[-61.93168342277,-37.4584367655642,14,false];
			partidos['099']=[-59.6612855096813,-33.6754620267843,14,true];
			partidos['087']=[-60.0035403521578,-33.4835644733021,14,true];
			partidos['007']=[-62.2638520842493,-38.7189607190385,12,true];
			partidos['004']=[-58.3645812900918,-34.6744775867874,14,true];
			partidos['077']=[-60.8860901714064,-35.4447339762223,14,true];
			partidos['016']=[-61.3648005397295,-35.6235886818622,14,false];
			partidos['060']=[-61.5310595437731,-34.8677412587262,14,false];
			partidos['137']=[-57.8971312058546,-35.8728313540568,14,false];	

		}
