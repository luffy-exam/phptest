<?php
// login.php
include 'db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $result = $conn->query("SELECT * FROM users WHERE username='$username'");
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      $_SESSION['user'] = $row;
      header('Location: dashboard.php');
    } else {
      echo "Invalid credentials.";
    }
  } else {
    echo "User not found.";
  }
}
?>

<form method="POST">
  Username: <input type="text" name="username" required><br>
  Password: <input type="password" name="password" required><br>
  <button type="submit">Login</button>
</form>