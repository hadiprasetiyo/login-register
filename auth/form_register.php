<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script>
      function validateForm() 
      {
        var password = document.getElementById("password").value;
        if (password.length < 8) 
        {
          alert("Password minimal 8 karakter");
          return false;
        }
        return true;
      }
    </script>
  </head>
  <body>
    <div class="container">
      <h2>Register</h2>
      <form method="post" action="process.php" onsubmit="return validateForm()">
        <input type="hidden" name="action" value="register">
        <div class="mb-3">
          <label for="full_name" class="form-label">Full Name</label>
          <input type="text" name="full_name" id="full_name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="confirm_password" class="form-label">Confirm Password</label>
          <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
      </form>
      <p>Sudah punya akun? <a href="form_login.php">Login</a></p>
    </div>
  </body>
</html>