<?php
// register.php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $role = $_POST['role'];
  $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
  if ($conn->query($sql)) {
    echo "Registration successful.";
  } else {
    echo "Error: " . $conn->error;
  }
}
?>

<form method="POST">
  Username: <input type="text" name="username" required><br>
  Password: <input type="password" name="password" required><br>
  Role: <select name="role">
    <option value="member">Member</option>
    <option value="user">User</option>
  </select><br>
  <button type="submit">Register</button>
</form>