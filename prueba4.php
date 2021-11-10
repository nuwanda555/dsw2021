<?php
    //mostrar la longitud y latitud de la ISS
    $iss = simplexml_load_file("http://api.open-notify.org/iss-now.json");
    $lat = $iss->iss_position->latitude;
    $lon = $iss->iss_position->longitude;
    echo "La longitud de la ISS es: $lon";
    echo "<br>";
    echo "La latitud de la ISS es: $lat";



?>
