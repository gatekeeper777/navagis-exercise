README FILE FOR WEB DEVELOPMENT EXERCISE
----------------------------------------

Requirements, Prerequisites, Limitations
1. Run using a local web server such as Xampp.
2. Create a folder under `navatis` and transfer all files under it.
3. Local domain to run this exercise is `http://localhost/navatis`.
4. Main file is called `index.php`.
5. Should be connected to the internet as most scripts like the jQuery and others such as Google Map libraries and services connect to external sites.
6. This exercise does not use a database to keep track of visits, the initial visit counts are stored in a json collection file.
7. Visitor counters are incremented when markers are clicked and is only available during the current session.

Main Files
1. index.php 			 - main interface
2. assets/js/map.js		 - external script
3. assets/css/custom.css - external styles
4. map.geojson			 - GEOJSON features data

Missing / Unfinished Parts
1. Directions service has not been implemented as of this writing.
2. Analytics [or graphs] of relationships between restaurant/patrons/revenue are not available as of this writing.
