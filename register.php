<?php

include 'inc/database.php';

  if (isset($_POST['save'])) {
    $stmt = $conn->prepare('INSERT INTO account (username, password, fullname, email)
    VALUES (:username, :password, :fullname, :email)');
    $stmt->bindValue('username', $_POST['username']);
    $stmt->bindValue('password', $_POST['password']);
    $stmt->bindValue('fullname', $_POST['fullname']);
    $stmt->bindValue('email', $_POST['email']);
    $stmt->execute();
    header('location:index.php');
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>Registeration</title>
  </head>
  <body>
    <div class="form">
      <form method="post">
        <fieldset>
          <legend class="leg">Register Here</legend>
          <table class="tab">
            <tr>
              <td>Username</td>
              <td><input type="text" name="username" placeholder="Username"></td>
            </tr>
            <tr>
              <td>Password</td>
              <td><input type="password" name="password" placeholder="Password"></td>
            </tr>
            <tr>
              <td>Full Name</td>
              <td><input type="text" name="fullname" placeholder="Full Name"></td>
            </tr>
            <tr>
              <td>E-mail</td>
              <td><input type="text" name="email" placeholder="E-mail"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input class="btn" type="submit" name="save" value="Save"> </td>
            </tr>
          </table>
        </fieldset>
      </form>
    </div>
    <script src="js/app.js" charset="utf-8"></script>
  </body>
</html>
