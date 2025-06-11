CREATE DATABASE IF NOT EXISTS upsell_db;
USE upsell_db;

-- Table to store main order info
CREATE TABLE `member_orders` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `member_id` INT NOT NULL,
  `first_name` VARCHAR(100),
  `last_name` VARCHAR(100),
  `username` VARCHAR(100),
  `email` VARCHAR(150),
  `address` VARCHAR(255),
  `address2` VARCHAR(255),
  `country` VARCHAR(100),
  `state` VARCHAR(100),
  `zip` VARCHAR(20),
  `payment_method` VARCHAR(50),
  `cc_name` VARCHAR(100),
  `cc_number` VARCHAR(25),
  `cc_expiration` VARCHAR(15),
  `cc_cvv` VARCHAR(10),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Table to store upsells linked to member_id
CREATE TABLE member_upsells (
  id INT AUTO_INCREMENT PRIMARY KEY,
  member_id VARCHAR(100) NOT NULL,
  product_name VARCHAR(100),
  price DECIMAL(10,2),
  added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
