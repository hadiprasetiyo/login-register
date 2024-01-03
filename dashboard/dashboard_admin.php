<?php
  require '../includes/config.php';
  require '../includes/functions.php';

  if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == null) 
  {
    header("Location: ../auth/form_login.php");
    exit;
  }

  if ($_SESSION['role'] !== 'admin') 
  {
    header("Location: dashboard_user.php");
    exit;
  }

  echo "Dashboard Admin. Selamat datang, " . $_SESSION['full_name'];
?>

<a href="../logout.php">Logout</a>