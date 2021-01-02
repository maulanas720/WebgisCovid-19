</script><!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>

 <script src="<?=base_url('assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js')?>"></script>
 <script src="<?=base_url('assets/js/leaflet.ajax.js')?>"></script>
 <script src="<?=site_url('api/data/kecamatan')?>"></script>
 <script src="<?=site_url('api/data/rumahsakit/point')?>"></script>
 <script src="<?=site_url('api/data/kasus/point')?>"></script>
 <link rel="stylesheet" href="<?=site_url('assets/cluster/dist/MarkerCluster.css')?>" />
	<link rel="stylesheet" href="<?=site_url('assets/cluster/dist/MarkerCluster.Default.css')?>" />
	<script src="<?=site_url('assets/cluster/dist/leaflet.markercluster-src.js')?>"></script>

   <script type="text/javascript">

   	var map = L.map('map').setView([-6.8877617,107.7773433], 9);
	   var layersKecamatan=[];
   	var Layer=L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
});
	map.addLayer(Layer);

	var myStyle2 = {
	    "color": "#ffff00",
	    "weight": 1,
	    "opacity": 0.9
	};
	function getColorKecamatan(KODE){
		for(i=0;i<dataKecamatan.length;i++){
			var data=dataKecamatan[i];
			if(data.kd_kecamatan==KODE){
				return data.warna_kecamatan;
			}
		}
	}

	function popUp(f,l){
	    var out = [];
	    if (f.properties){
			out.push("Provinsi: "+f.properties['PROVINSI']);
			out.push("Kabupaten: "+f.properties['KABUPATEN']);
	        l.bindPopup(out.join("<br />"));
			l.bindTooltip(f.properties['KABUPATEN'],{
				permanent:true,
				direction:"center",
				className:"no-background"
			});
	    }
	}

	function iconByName(name) {
		return '<i class="icon" style="background-color:'+name+';border-radius:50%"></i>';
	}

	function featureToMarker(feature, latlng) {
		return L.marker(latlng, {
			icon: L.divIcon({
				className: 'marker-'+feature.properties.amenity,
				html: iconByName(feature.properties.amenity),
				iconUrl: '../images/markers/'+feature.properties.amenity+'.png',
				iconSize: [25, 41],
				iconAnchor: [12, 41],
				popupAnchor: [1, -34],
				shadowSize: [41, 41]
			})
		});
	}

	var baseLayers = [
		/*{
			name: "OpenStreetMap",
			layer: Layer
		},
		/*{	
			name: "OpenCycleMap",
			layer: L.tileLayer('http://{s}.tile.opencyclemap.org/cycle/{z}/{x}/{y}.png')
		},
		{
			name: "Outdoors",
			layer: L.tileLayer('http://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png')
		}*/
	]

	for(i=0;i<dataKecamatan.length;i++){
		var data=dataKecamatan[i];
		var layer={
			name: data.nm_kecamatan,
			icon: iconByName(data.warna_kecamatan),
			layer: new L.GeoJSON.AJAX(["<?=base_url()?>assets/unggah/geojson/"+data.geojson_kecamatan],
				{
					onEachFeature:popUp,
					style: function(feature){
						var KODE=feature.properties.KODE;
						return {
							"color": getColorKecamatan(KODE),
						    "weight": 1,
						    "opacity": 1
						}

					},
				}).addTo(map)
			}
		layersKecamatan.push(layer);
	}
	var overLayers = [{
		group: "Layer Kecamatan",
		layers: layersKecamatan
	}
	];
	var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers,{
		collapsibleGroups: true
	});

	//marker
	var markers = L.markerClusterGroup();

	var myIcon = L.Icon.extend({
	    options: {
	    	iconSize: [38, 45]
	    }
	});
	map.addControl(panelLayers);
	var marker = L.geoJSON(rumahsakitPoint, {
	    pointToLayer: function (feature, latlng) {
	    	console.log(feature)
	        return L.marker(latlng, {
	        	icon : new L.icon({
					iconUrl: feature.properties.icon,
					iconSize: [38, 45]
					})
	        });
	    },
    	onEachFeature: function(feature,layer){
    		 if (feature.properties && feature.properties.name) {
		        layer.bindPopup(feature.properties.popUp);
		    }
    	}
	});
	markers.addLayer(marker);
	map.addLayer(markers);

	L.geoJSON(kasusPoint, {
	    pointToLayer: function (feature, latlng) {
	    	console.log(feature)
	        return L.marker(latlng, {
	        	icon : new L.icon({
					iconUrl: feature.properties.icon,
					iconSize: [38, 45]
					})
	        });
	    },
    	onEachFeature: function(feature,layer){
    		 if (feature.properties && feature.properties.name) {
		        layer.bindPopup(feature.properties.popUp);
		    }
    	}
	}).addTo(map)

   </script>