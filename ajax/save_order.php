<?php
session_start();
require_once('../includes/db.php');

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

// Capture all posted fields
$first_name = $data['first_name'] ?? '';
$last_name = $data['last_name'] ?? '';
$username = $data['username'] ?? '';
$email = $data['email'] ?? '';
$address = $data['address'] ?? '';
$address2 = $data['address2'] ?? '';
$country = $data['country'] ?? '';
$state = $data['state'] ?? '';
$zip = $data['zip'] ?? '';
$payment_method = $data['payment_method'] ?? '';
$cc_name = $data['cc_name'] ?? '';
$cc_number = $data['cc_number'] ?? '';
$cc_expiration = $data['cc_expiration'] ?? '';
$cc_cvv = $data['cc_cvv'] ?? '';
$member_id = $_SESSION['member_id'] ?? '';

// Ensure proper data types
if (!$member_id) {
  echo json_encode(['success' => false, 'error' => 'Session expired or member_id missing.']);
  exit;
}

try {
  $stmt = $pdo->prepare("INSERT INTO member_orders (
    member_id, first_name, last_name, username, email, address, address2, country, state, zip,
    payment_method, cc_name, cc_number, cc_expiration, cc_cvv
  ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  $stmt->execute([
    $member_id, $first_name, $last_name, $username, $email,
    $address, $address2, $country, $state, $zip,
    $payment_method, $cc_name, $cc_number, $cc_expiration, $cc_cvv
  ]);

  echo json_encode(['success' => true]);
} catch (Exception $e) {
  echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
exit;
