<?php
    include 'inc/database.php';

    if (isset($_POST['save'])) {

      $stmt = $conn->prepare('SELECT * FROM account WHERE username = :username');
      $stmt->bindValue('username', $_POST['username']);
      $stmt->execute();

      $stmt = $conn->prepare('UPDATE account SET password = :password, fullname = :fullname, email = :email WHERE username = :username');
      $stmt->bindValue('username', $_POST['username']);
      $stmt->bindValue('password', $_POST['password'] == '' ? $account->password : $_POST['password']);
      $stmt->bindValue('fullname', $_POST['fullname']);
      $stmt->bindValue('email', $_POST['email']);
      $stmt->execute();
      header('location:index.php');
    }

    $stmt = $conn->prepare('SELECT * FROM account WHERE username = :username');
    $stmt->bindValue('username', $_GET['username']);
    $stmt->execute();
    $account = $stmt->fetch(PDO::FETCH_OBJ);

    ?>

    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/edit.css">
        <link rel="stylesheet" href="css/register.css">
        <title>Update Account</title>
      </head>
      <body>
        
        <div id="form">
            <form class="form" method="post">
              <fieldset>
                <legend>Account Information</legend>
                <table>
                  <tr>
                    <td>Username</td>
                    <td><?php echo $account->username; ?><input type="hidden" name="username" value="<?php echo $account->username; ?>"></td>
                  </tr>
                  <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                  </tr>
                  <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="fullname" value="<?php echo $account->fullname; ?>"></td>
                  </tr>
                  <tr>
                    <td>E-mail</td>
                    <td><input type="text" name="email" value="<?php echo $account->email; ?>"></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><input class="btn" type="submit" name="save" value="Save"></td>
                  </tr>
                </table>
              </fieldset>
            </form>
        </div>
      </body>
    </html>
