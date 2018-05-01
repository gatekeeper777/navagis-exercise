
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Dashboard | Restaurants</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="assets/css/custom.css">
    </head>
    <body>

        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3 class="">&nbsp;</h3>
                    <strong>&nbsp;</strong>
                </div>

                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-filter"></i>
                            Filter Restaurants
                        </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><span>Show 5 </span><i class="glyphicon glyphicon-star"></i> <input type="checkbox" class="checkbox" checked value="5 Star" /></li>
                            <li><span>Show 4 </span><i class="glyphicon glyphicon-star"></i> <input type="checkbox" class="checkbox" checked value="4 Star" /></li>
                            <li><span>Show 3 </span><i class="glyphicon glyphicon-star"></i> <input type="checkbox" class="checkbox" checked value="3 Star" /></li>
							<li><span>Show 2 </span><i class="glyphicon glyphicon-star"></i> <input type="checkbox" class="checkbox" checked value="2 Star" /></li>
							<li><span>Show 1 </span><i class="glyphicon glyphicon-star"></i> <input type="checkbox" class="checkbox" checked value="1 Star" /></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="hidden">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            About
                        </a>
                        <a class="hidden" href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-circle-arrow-right"></i>
                            Directions
                        </a>
                        <ul class="collapse list-unstyled hidden" id="pageSubmenu_0">
                            <li><input type="text" class="form-control" placeholder="Starting point..." title="Please indicate the starting point"></input></li>
                            <li><input type="text" class="form-control" placeholder="Destination..." title="Click a marker on the map"></input></li>
                        </ul>
                    </li>
                </ul>
            </nav>
			
			<nav id="sidebar_2">
                <div class="sidebar-header">
                    <h3 class="">&nbsp;</h3>
                    <strong>&nbsp;</strong>
                </div>

				<div class="close"><i class="glyphicon glyphicon-remove"></i></div>
				
				<div class="content">
					<div class="content_title">&nbsp;</div>
					<div class="content_desc">&nbsp;</div>
					<div class="content_other_info">&nbsp;</div>
				</div>
                
                <ul class="list-unstyled components">
                    <li>
						<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-circle-arrow-right"></i>
                            <small>Get Directions</small>
                        </a>
						<ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><input type="text" class="form-control" placeholder="Starting point..." title="Please indicate the starting point"></input></li>
                            <li><input type="text" class="form-control" placeholder="Destination..."></input></li>
                        </ul>
					</li>
                    <li class="hidden"><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-chevron-left"></i>
                                <span>Hide</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a class="help" href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
				<p>&nbsp;</p>
				
				<!-- map container -->
				<div id="map">
					<div class="line"></div>
				</div>
				
				<!-- -->
				<div id="analytics" class="hidden">
					<h2>Analytics</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

					<div class="line"></div>
				</div>

                
            </div>
        </div>

        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		 
		 <!-- Map Js -->
		 <script src="assets/js/map.js"></script>
		 
		 <!-- Google Map API -->
		 <script async defer
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsFg1_J-PMZ7B9WmllbyofGiQXczDKlEI&libraries=drawing&callback=initMap"
		 ></script>

		 <!-- Other jQuery Stuff -->
         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
					 
					 if ($('div.navbar-header i').hasClass('glyphicon-chevron-right')) {
						 $('div.navbar-header i').removeClass('glyphicon-chevron-right').addClass('glyphicon-chevron-left');
						 $('div.navbar-header span').text('Hide');
					 } else {
						 $('div.navbar-header i').removeClass('glyphicon-chevron-left').addClass('glyphicon-chevron-right');
						 $('div.navbar-header span').text('Show');
					 }
                 });
				 
				 // close sidebar 2
				 $('#sidebar_2').on('click', 'div.close i', function() { $('#sidebar_2').fadeOut('fast'); });
				 
				 //
				 $(document).on('change', 'input.checkbox', function(e) {

					var allchecked = [];
					 
					// capture all checked checkboxes in an array
					$.each($('.checkbox:checkbox:checked'), function(i,v) {
						 allchecked.push($(v).val());
					 });
					 
					 setTimeout(applyFilter(allchecked, 'set'), 1000);

				 });
				 
				 // show analytics
				 //$('#analytics').removeClass('hidden');
				 
				 // show help dialog
				 $('nav').on('click','a.help', function() {
					 alert('This is the help page.');
					 return false;
				 });
				 
             });
         </script>
    </body>
</html>
