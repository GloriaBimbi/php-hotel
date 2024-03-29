<?php 

require __DIR__ . "/./init.php";

// se c'è la chiave parking-status allora stampa true, altrimenti stampa false
$filter_parking = isset($_GET['parking-status']) ? true : false;

// funzione per filtrare gli hotel sulla base del parcheggio  
if($filter_parking) {
   $hotels = array_filter($hotels, function($hotel){
    return $hotel['parking'];
    }, ARRAY_FILTER_USE_BOTH);
}

// se c'è la chiave star_number allora stampa true, altrimenti stampa false
$filter_star = isset($_GET['star_number']) ? true : false;
if(isset($_GET['star_number'])) {
    $selected_star = $_GET['star_number'];
}else{
    $selected_star = 0;
}
//var_dump($_GET['star_number']);

// funzione per filtrare gli hotel sulla base delle stelle
if($filter_star) {
    $hotels = array_filter($hotels, function($hotel ){    
        global  $selected_star;
        return $hotel['vote'] >= $selected_star;
     }, ARRAY_FILTER_USE_BOTH);
 }


?>