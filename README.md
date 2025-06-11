Here’s a complete `README.md` file you can use for your **Smart Funnel App** GitHub repository. It includes a step-by-step guide to run the application locally using XAMPP, project setup instructions, technologies used, and key features.

---

````markdown
# 🛒 Smart Funnel App

Smart Funnel App is a simple full-stack e-commerce checkout funnel built using **HTML, CSS, JavaScript, PHP, and MySQL**. It allows users to enter checkout details, submit the form via AJAX, and then redirects them to an upsell page offering a limited-time product. It demonstrates how a basic sales funnel works in web applications.

## 📦 Features

- Responsive checkout form with personal and payment details
- AJAX-based order submission using vanilla JavaScript
- Order data is saved to MySQL using PHP and PDO
- Redirect to upsell page with dynamic product offer
- Display of number of selected items and total price

---

## 🛠 Technologies Used

- Frontend: HTML5, CSS3, JavaScript
- Backend: PHP (with PDO)
- Database: MySQL
- Local Server: XAMPP

---

## 🚀 How to Run This Project Locally

### 1. Clone the Repository

```bash
git clone https://github.com/khanyasir1/full-stack-SmartFunnel-app.git
cd full-stack-SmartFunnel-app
````

### 2. Set Up XAMPP

* Open **XAMPP Control Panel**
* Start **Apache** and **MySQL**

### 3. Import the Database

* Open **phpMyAdmin** at: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
* Create a new database (e.g., `funnel_db`)
* Import the provided SQL file from `sql/schema.sql`

### 4. Configure the Database

Open `includes/db.php` and update the database credentials if needed:

```php
$host = 'localhost';
$dbname = 'funnel_db';
$username = 'root';
$password = '';
```

### 5. Launch the App

Move the project folder (`full-stack-SmartFunnel-app`) to `htdocs` (inside your XAMPP directory).

Then visit:

```
http://localhost/full-stack-SmartFunnel-app/pages/index.php
```

### 6. Test the Funnel

* Fill the checkout form on the main page.
* Submit it — order will be stored in DB via AJAX.
* You'll be redirected to the **Upsell Page** with a special product offer.
* Choose quantity and view total cost dynamically.

---

## ✅ Folder Structure

```



ajax/
│   ├── add_upsell.php         ← Handles AJAX calls from Upsell 1 & 2 pages
│   └── save_order.php         ← Handles initial order form submission via AJAX
│
├── assets/
│   ├── css/
│   │   └── styles.css         ← All custom styles here
│   └── js/
│       └── main.js            ← All JS logic, validation, AJAX calls
│
├── includes/
│   ├── db.php                 ← PDO DB connection (best practice)
│   └── session.php           ← Starts & manages PHP sessions
│
├── pages/
│   └── index.php              ← Initial order form (landing page)
    └── process_checkout.php
│   └── upsell1.php            ← First upsell page
│   └── upsell2.php            ← Second upsell page
│   └── thankyou.php           ← Thank you summary page
│
├── sql/
│   └── schema.sql             ← SQL script to create `member` & `member_orders` tables
└── README.md
```

---

## 📚 License

This project is for learning/demo purposes. You can freely modify or extend it.


