<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['surname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "INSERT INTO kullanicilar (name, surname, phone, username, password) VALUES ('$username', '$surname', '$phone', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: giris.html");
        exit();
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>