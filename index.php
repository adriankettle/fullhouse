<?php

include 'inc/database.php';

  if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $stmt = $conn->prepare('FELETE FROM account WHERE username = :username');
    $stmt->bindValue('username', $_GET['username']);
    $stmt->execute();
  }


$stmt = $conn->prepare('SELECT * FROM account');
$stmt->execute();

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
  </head>
  <body>
    <header>
      <a href="register.php">Register</a>
    </header>
    <div class="form">
    <table>
      <tr id="tr">
        <th>Username</th>
        <th>Full Name</th>
        <th>E-mail</th>
        <th>Option</th>
      </tr>
      <?php while($account = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
        <tr>
          <td><?php echo $account->username; ?></td>
          <td><?php echo $account->fullname; ?></td>
          <td><?php echo $account->email; ?></td>
          <td>
            <a href="edit.php?username=<?php echo $account->username; ?>
              &action=delete" onclick="return confirm('Are you sure')">Delete</a>
              | <a href="edit.php?username=<?php echo $account->username; ?>">Edit</a>
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>
  </body>
</html>
