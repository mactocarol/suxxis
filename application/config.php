<?php
//$con = mysqli_connect("localhost","root","","realestate");
$con=mysqli_connect("localhost","macto4j1_rental","mactosys121","macto4j1_car_rental");
$base_url="https://mactosys.com/car-rental/";



$config =array(
		"base_url" => $base_url."hybridauth/", 
		"providers" => array ( 

			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "797353433483-g68hru756k4sngq5qmoujhp7qhor1tt8.apps.googleusercontent.com",
				"secret" => "Y7tlZCahTd2iMju7_UAjfwbg" ), 
			),

			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "799366307076656", "secret" => "129380feed699b8644fd2c6fe6c2c4e0" ),
                "scope"   => ['email', '', '', ''], // optiona				
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "uhRsWpVuv5cNDy4KMOZuu9ydF", "secret" => "DZGISBfczI1itjYzKI7ziU6cddxrcEUw0LtVdciZjKvkD4kSeH" ), 
			     "includeEmail" => true
			),
			/*
			"LinkedIn" => array ( // 'key' is your twitter application consumer key
               "enabled" => true,
               "keys" => array ( "key" => "", "secret" => "" )
            ),*/
		),
		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,
		"debug_file" => "",
	);