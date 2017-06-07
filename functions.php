<?php
 //application functions

function get_place_to_visit(){
 	include("connection.php");
    try {
	 return  $db->query('SELECT city, place_name AS "Place Name", rating AS Rating FROM places_to_visit');
    } catch (Exception $e) {
	 echo "Error!:" . $e->getMessage();
	 return array();
    }
 }

function get_weather_data($city){
	$city = trim(filter_input(INPUT_GET, "city",FILTER_SANITIZE_STR));
	$city = strtoupper($city);
	include("connection.php");
	try {
		$sql = "SELECT temperature AS Temp, humidity AS Humdity, cloud_cover AS 'Cloud Cover'
		        FROM weather_data
		        WHERE city = ?"
		$result = $db->prepare($sql);
		$result-> bindParam(1, $city, PDO::PARAM_STR);
		$result->execute();
	} catch (Exception $e) {
		echo "Error!:" . $e->getMessage();
		exit;		
	}
	var_dump($result->fetchAll());
}
function get_place_ratings($place_name){
     $place_name = trim(filter_input(INPUT_GET, 'place_name', FILTER_SANITIZE_STR));
     $place_name = strtoupper($place_name);
     include "connection.php";
     try {
     	$sql = "SELECT place_name AS Place, rating AS Rating FROM places_to_visit";
     	if (!empty($place_name)) {
     		$result = $db->prepare($sql. "WHERE UPPER($place_name)) LIKE ? ");
     		$result->bindParam(1,"%" . $place_name . "%",PDO::PARAM_STR);
     	}else{
     		$result = $db->prepare($sql);
     	}
     	$result->execute();     	
     } catch (Exception $e) {
     	echo "Bad query";
     	exit;
     }
}

function get_events($city,$place_name){
	$city = trim(filter_input(INPUT_GET, 'city', FILTER_SANITIZE_STR));
	$city = strtoupper($city);
	$place_name = trim (filter_input(INPUT_GET, 'place_name', FILTER_SANITIZE_STR));
	$place_name = strtoupper($place_name);
	include 'connection.php';
	try {
		$sql = "SELECT * FROM events";
		if(!empty($city) || !empty($place_name)){
			$result = $db->prepare($sql . "WHERE $city = ? OR $place_name LIKE ? ");
			$result->bindParam(1, $city, PDO::PARAM_STR);
			$result->bindParam(2, "%" . $place_name . "%", PDO::PARAM_STR);
		}else{
			$result = $db->prepare($sql);			
		}
		$results->execute();
	} catch (Exception $e) {
		echo "Bad query";
		exit;		
	}
	var_dump(result->fetch(PDO::FETCH_ASSOC);

}