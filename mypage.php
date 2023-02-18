<?php

// Vérifier si l'utilisateur est connecté
session_start();

if (!isset($_SESSION['username'])) {
  header('Location: login.php');
	$username = $_SESSION['username'];
  exit();
}

// Si l'utilisateur est connecté, afficher la page
?> 

<link rel="stylesheet" href="style.css" > 
<?php
include ('index.html');
?>  
