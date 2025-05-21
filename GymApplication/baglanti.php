<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "randevu";

$baglanti = new mysqli($servername, $username, $password, $dbname);

if ($baglanti->connect_error) {
    die("Bağlantı başarısız: " . $baglanti->connect_error);
}

?>
