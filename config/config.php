<?php

// Create connection
$mysqli = mysqli_connect("localhost","alunos","alunos","alunos_formulae_gpsit1_andre_erica");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
?>
