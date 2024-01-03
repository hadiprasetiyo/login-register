<?php
  function is_password_used($pdo, $password) 
  {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE password = :password");
    $stmt->execute(array(':password' => $password));
    $count = $stmt->fetchColumn();
    return $count > 0;
  }
  function logout() 
  {
    session_destroy();
    header("Location: index.php");
  }
?>