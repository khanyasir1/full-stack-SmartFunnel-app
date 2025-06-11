<?php
include('../includes/session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Special Offer - Upsell</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
  <div class="container text-center mt-5">
    <h2 class="mb-4">🔥 One-Time Special Offer Just for You!</h2>

    <div class="card mx-auto" style="max-width: 400px;">
      <img src="/funnel-test-app/images/product.jpg" class="card-img-top" alt="Upsell Product">
      <div class="card-body">
        <h5 class="card-title">Premium Add-On Product</h5>
        <p class="card-text">Get this amazing deal for just <strong>$49</strong> instead of $99!</p>

        <div class="d-grid gap-2">
          <button id="acceptUpsell" class="btn btn-success">Yes, Add to My Order</button>
          <a href="upsell2.php" class="btn btn-outline-secondary">No, Thanks</a>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/main.js"></script>
  <script>
    document.getElementById('acceptUpsell').addEventListener('click', function () {
      fetch('../ajax/add_upsell.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ product: 'Upsell Product 1', price: 49 })
      }).then(res => res.json())
        .then(data => {
          if (data.success) {
            window.location.href = 'upsell2.php';
          } else {
            alert('Failed to add upsell.');
          }
        });
    });
  </script>
</body>
</html>
