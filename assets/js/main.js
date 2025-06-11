// // // Form Validation for index.php
// // document.addEventListener('DOMContentLoaded', function () {
// //   const form = document.getElementById('checkout-form');
// //   if (form) {
// //     form.addEventListener('submit', function (e) {
// //       e.preventDefault();

// //       if (!form.checkValidity()) {
// //         form.classList.add('was-validated');
// //         return;
// //       }

// //       const formData = new FormData(form);
// //       const data = {};
// //       formData.forEach((value, key) => {
// //         data[key] = value;
// //       });

// //       fetch('../ajax/save_order.php', {
// //         method: 'POST',
// //         headers: {
// //           'Content-Type': 'application/json'
// //         },
// //         body: JSON.stringify(data)
// //       })
// //         .then(res => res.json())
// //         .then(result => {
// //           if (result.success) {
// //             window.location.href = 'upsell1.php';
// //           } else {
// //             alert('Order submission failed. Try again.');
// //           }
// //         })
// //         .catch(() => {
// //           alert('Something went wrong while submitting the form.');
// //         });
// //     });
// //   }
// // });



// document.addEventListener("DOMContentLoaded", function () {
//   const form = document.getElementById("checkout-form");
//   if (!form) return;

//   form.addEventListener("submit", function (e) {
//     e.preventDefault();

//     const formData = new FormData(form);
//     const data = {};
//     formData.forEach((value, key) => {
//       data[key] = value;
//     });

//     fetch("../ajax/save_order.php", {
//       method: "POST",
//       headers: {
//         "Content-Type": "application/json",
//       },
//       body: JSON.stringify(data),
//     })
//       .then((response) => response.json())
//       .then((result) => {
//         if (result.success) {
//           console.log("Order saved successfully ✅");
//           // ✅ Redirect or show success message
//           window.location.href = "upsell1.php"; // or show custom success UI
//         } else {
//           console.error("Server error:", result.error);
//           alert("Failed to save order: " + result.error);
//         }
//       })
//       .catch((error) => {
//         console.error("Something went wrong:", error);
//         alert("Something went wrong while submitting the form.");
//       });
//   });
// });


document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("checkout-form");
  if (!form) return;

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    // Show validation feedback
    if (!form.checkValidity()) {
      form.classList.add("was-validated");
      return;
    }

    const formData = new FormData(form);
    const data = {};
    formData.forEach((value, key) => {
      data[key] = value;
    });

    fetch("../ajax/save_order.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then(async (response) => {
        const text = await response.text();
        try {
          const json = JSON.parse(text);
          return json;
        } catch (e) {
          console.error("Invalid JSON returned:", text);
          throw new Error("Invalid JSON response from server");
        }
      })
      .then((result) => {
        if (result.success) {
          console.log("✅ Order saved successfully");
          window.location.href = "upsell1.php";
        } else {
          console.error("❌ Server Error:", result.error);
          alert("Failed to save order: " + result.error);
        }
      })
      .catch((error) => {
        console.error("❌ JS Error:", error);
        alert("Something went wrong while submitting the form.");
      });
  });
});
