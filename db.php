<?php
  $host = 'localhost'; //nazwa hosta lub adres IP
	$login = 'root';
	$password = '';
	$dbname = 'baza'; //nazwa bazy danych

  $con = mysqli_connect($host,$login,$password,$dbname);

  //Sprawdzenie połączenia
  if (mysqli_connect_errno()) {
    echo "Błąd połączenia" . mysqli_connect_error();
  }
?>
