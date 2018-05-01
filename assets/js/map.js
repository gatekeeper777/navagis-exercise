/**[]
   * Map Scripting
   * Author: Dexter Huinda
 []*/

var map;
var drawingManager;
var infoWindow;
var cebuLatLng = {lat: 10.3157, lng: 123.8854}; // Cebu City Coordinates - 10.3157° N, 123.8854° E

var geoJSON_DATA = [];
var markers = [];
var markers_DATA = [];

function initMap() {
	
	var initZoom = 8;

	// create new instance of google map
	map = new google.maps.Map(document.getElementById('map'), {
		zoom: initZoom,
		center: cebuLatLng
	});
	
	// get geoJSON data using jQuery
	$.getJSON("http://localhost/navagis/map.geojson", function(data) {
		
		geoJSON_DATA.push(data); // save data for later use
		//console.log(geoJSON_DATA);
		
		// and add each feature into the map
		var features = map.data.addGeoJson(data);
		//console.log(features);
		
		/*$.each(features, function(i,v) {
			console.log(v.getProperty('title') + "-" + v.getProperty('restotype') + "-"+ v.getProperty('specialty') + "-"+ v.getProperty('description') + "-"+ v.getProperty('visits')  );
			console.log(v.getId(i));
		});*/
		
	});
	
	//map.data.loadGeoJson('http://localhost/navagis/map.geojson');
			
	// set options for the drawing manager
	drawingManager = new google.maps.drawing.DrawingManager({
	  drawingMode: google.maps.drawing.OverlayType.MARKER,
	  drawingControl: true,
	  drawingControlOptions: {
		position: google.maps.ControlPosition.TOP_CENTER,
		drawingModes: ['circle','rectangle']
	  },
	  circleOptions: {
		fillColor: '#777',
		fillOpacity: 0.3,
		strokeWeight: 1,
		clickable: true,
		editable: false,
		zIndex: 1
	  },
	  rectangleOptions: {
		fillColor: '#777',
		fillOpacity: 0.3,
		strokeWeight: 1,
		clickable: true,
		editable: false,
		zIndex: 1
	  }
	});
	
	drawingManager.setMap(map);
	drawingManager.setDrawingMode(null);
	
	// instantiate new infoWindow()
	infoWindow = new google.maps.InfoWindow();
	
	google.maps.event.addListener(drawingManager,'overlaycomplete',function(e){
		showInfoWindow(e);
	});
	
	google.maps.event.addListener(drawingManager,'circlecomplete',function(circle){
		google.maps.event.addListener(circle, 'click', function () {
			circle.setOptions({fillOpacity:0, strokeOpacity:0, clickable: false});
		});
	});
	
	google.maps.event.addListener(drawingManager,'rectanglecomplete',function(rectangle){
		google.maps.event.addListener(rectangle, 'click', function () {
			rectangle.setOptions({fillOpacity:0, strokeOpacity:0, clickable: false});
		});
	});
	
	map.data.addListener('click', function(e) {
		
		// increment visit counter
		incrementMarkerVisits(e);
		
		// assemble properties in a single array
		var info = [e.feature.getProperty('title'), e.feature.getProperty('description'), e.feature.getProperty('specialty'), e.feature.getProperty('restotype'), e.feature.getProperty('visits')];
		
		showMarkerInfo(e, info);
		
		// show sidebar 2 on top of the main sidebar
		$('#sidebar_2').attr('style','display: block');
		
	});
	
	map.data.addListener('mouseover', function(e) { var arr = new Array(); arr.push(e.feature.getProperty("title")); setTimeout( showMarkerInfo(e, arr), 1500); });
	map.data.addListener('mouseout', function(e) { setTimeout(infoWindow.close(), 2000); });
	
} // end initMap()

function showInfoWindow(e) {

	if (e.type == 'circle') {
		// this is a circle
		;

	} else if (e.type == 'rectangle') {
		// this is a rectangle
		;
	} else {
	
		drawingManager.setDrawingMode(null);
		return false;
	}
	
	var bounds = e.overlay.getBounds();
	var hits = 0;
	
	// iterate through all markers to see if they fall within the area
	$.each(geoJSON_DATA[0].features, function(i,v) {
		latlng = new google.maps.LatLng({lat: v.geometry.coordinates[1], lng: v.geometry.coordinates[0]});
		bounds.contains(latlng) ? hits++ : false;
	});
	
	// center the infoWindow
	infoWindow.setPosition(bounds.getCenter());
	
	// and set the appropriate content
	infoWindow.setContent('There are <strong>' + hits + '</strong> restaurants found within this geographical area.');
	
	drawingManager.setDrawingMode(null);
	
	// show info
	infoWindow.open(map);

} // end showInfoWindow()

function showMarkerInfo(e,info) {
	
	var details = '';
	
	for (i=0; i<info.length; i++) {
		details += info[i] + '<br />'; 
	}
	
	if (info.length < 4) {	
		infoWindow.setContent("<div style='width:150px; text-align: center;'>" + details +"</div>");
		infoWindow.setPosition(e.feature.getGeometry().get());
		infoWindow.setOptions({pixelOffset: new google.maps.Size(0,-30)});
		infoWindow.open(map);
	} else {
		$('#sidebar_2 div.content_title').text(info[0]);
		$('#sidebar_2 div.content_desc').html("<span style='display: block; margin-top: 10px; text-align: center; font-size: 1em;'>Specialty: " + info[2] + "</span><hr style='width: 90%; border-color: #999;'/>" + info[1]);
		$('#sidebar_2 div.content_other_info').html("<span style='display: block; margin-top: 10px; font-size: 1em;'>" + info[3] + "</span><span style='font-size: 1.2em;'>" + info[4] + "</span><small> visits </small> ");
		
	}
	
} // end showMarkerInfo()

function incrementMarkerVisits(e) {
	e.feature.setProperty('visits', Math.abs(e.feature.getProperty('visits')) + 1);
} // end incrementMarkerVisits()

function applyFilter(haystack, action) {
	
	//console.log('Haystack: ' + haystack);
	//console.log('Action: ' + action);
	
	map.data.setStyle(function(feature) {

		if (action == 'clearall') {
			return {visible: false};
		} else {
			
			var rtype = feature.getProperty('restotype');
			
			if ($.inArray(rtype,haystack) != -1)
				return {visible: true };
			else
				return {visible: false };
		}
			
	});

} // end applyFilter()