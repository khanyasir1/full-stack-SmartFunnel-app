<?php
session_start();

if (!isset($_SESSION['member_id'])) {
  $_SESSION['member_id'] = uniqid('mem_');
}
