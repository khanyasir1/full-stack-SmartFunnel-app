<?php
header('Content-Type: application/json');
session_start();
require_once('../includes/db.php');

$data = json_decode(file_get_contents('php://input'), true);

$product = $data['product'] ?? '';
$price = $data['price'] ?? 0;
$member_id = $_SESSION['member_id'];

try {
  $stmt = $pdo->prepare("INSERT INTO member_upsells (member_id, product_name, price) 
                         VALUES (?, ?, ?)");
  $stmt->execute([$member_id, $product, $price]);

  echo json_encode(['success' => true]);
} catch (Exception $e) {
  echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
