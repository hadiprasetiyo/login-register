<?php
  require '../includes/config.php';
  require '../includes/functions.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) 
  {
    if ($_POST['action'] == 'login') 
    {
      // Proses login
      $email = $_POST['email'];
      $password = $_POST['password'];

      $stmt = $pdo->prepare("SELECT id, full_name, email, password, role FROM users WHERE email = :email");
      $stmt->execute(array(':email' => $email));
      $user = $stmt->fetch();

      if ($user && password_verify($password, $user['password'])) 
      {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] === 'admin') 
        {
          header("Location: ../dashboard/dashboard_admin.php");
        } 
        else 
        {
          header("Location: ../dashboard/dashboard_user.php");
        }
      }
      else 
      {
        $error = "Email atau kata sandi salah!";
      }
    } 
    elseif ($_POST['action'] == 'register') 
    {
      // Proses pendaftaran
      $full_name = $_POST['full_name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];
      $role = 'user'; // Default role: user

      if (strlen($password) < 8) 
      {
        $error = "Kata sandi harus terdiri dari minimal 8 karakter.";
      } 
      elseif ($password !== $confirm_password) 
      {
        $error = "Konfirmasi kata sandi tidak cocok.";
      } 
      else 
      {
        // Check if the email is already registered
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->execute(array(':email' => $email));
        $count = $stmt->fetchColumn();

        if ($count == 0) 
        {
          $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

          $stmt = $pdo->prepare("INSERT INTO users (full_name, email, password, role) VALUES (:full_name, :email, :password, :role)");
          $stmt->execute(array(':full_name' => $full_name, ':email' => $email, ':password' => $hashedPassword, ':role' => $role));
          header("Location: form_login.php");
        } 
        else 
        {
          $error = "Email sudah terdaftar. Gunakan email lain.";
        }
      }
    }
  }
?>
