<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "<pre>CHECKOUT REACHED:\n";
var_dump($_POST);
echo "</pre>";
// your existing code follows...


include('../includes/db.php');

$firstName = $_POST['first_name'] ?? '';
$lastName = $_POST['last_name'] ?? '';
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$address = $_POST['address'] ?? '';
$address2 = $_POST['address2'] ?? '';
$country = $_POST['country'] ?? '';
$state = $_POST['state'] ?? '';
$zip = $_POST['zip'] ?? '';
$paymentMethod = $_POST['payment_method'] ?? '';
$cc_name = $_POST['cc_name'] ?? '';
$cc_number = $_POST['cc_number'] ?? '';
$cc_expiration = $_POST['cc_expiration'] ?? '';
$cc_cvv = $_POST['cc_cvv'] ?? '';


try {
    $stmt = $pdo->prepare("INSERT INTO member_orders (first_name, last_name, username, email, address, address2, country, state, zip, payment_method, cc_name, cc_number, cc_expiration, cc_cvv)
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$firstName, $lastName, $username, $email, $address, $address2, $country, $state, $zip, $paymentMethod, $cc_name, $cc_number, $cc_expiration, $cc_cvv]);

    echo "<h3 style='color: green;'>Order placed successfully!</h3>";
    echo "<a href='index.php'>Back to Form</a>";
} catch (PDOException $e) {
    echo "<h3 style='color: red;'>Error: " . $e->getMessage() . "</h3>";
    exit;
}
?>
