<?php
$host = "localhost";
$db = "checkout_db";
$user = "root";
$pass = "16416@vtc";

try {
  $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "DB connected successfully";
} catch (PDOException $e) {
  // die("DB Connection failed: " . $e->getMessage());
}
?>
