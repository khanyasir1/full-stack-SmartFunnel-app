<?php include('../includes/session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Final Upsell Offer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
  <div class="container text-center mt-5">
    <h2 class="mb-4">🎯 Last Chance to Upgrade!</h2>

    <div class="card mx-auto" style="max-width: 400px;">
      <img src="/funnel-test-app/images/product.jpg" class="card-img-top" alt="Upsell Product 3">
      <div class="card-body">
        <h5 class="card-title">Exclusive VIP Access</h5>
        <p class="card-text">Get lifetime access for only <strong>$99</strong>.</p>

        <div class="d-grid gap-2">
          <button id="acceptUpsell3" class="btn btn-success">Add to My Order</button>
          <a href="thankyou.php" class="btn btn-outline-secondary">No, Complete Order</a>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/main.js"></script>
  <script>
    document.getElementById('acceptUpsell3').addEventListener('click', function () {
      fetch('../ajax/add_upsell.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ product: 'Upsell Product 3', price: 99 })
      }).then(res => res.json())
        .then(data => {
          if (data.success) {
            window.location.href = 'thankyou.php';
          } else {
            alert('Failed to add upsell.');
          }
        });
    });
  </script>
</body>
</html>
