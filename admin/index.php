<?php 
  include_once '../dbconfig.php';
  include_once 'class.admin.php';
  $admin = new admin($DB_con);

  session_start();

  if (!isset($_SESSION['username'])==0) {
    header('Location: home.php');
  }

  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    $admin->ceklogin($username,$password);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/style.css">

  <title>Login Form</title>
</head>
<body>
  <div class="login-wrapper">
    <?php 
    /* handle error */
    if (isset($_GET['error'])) : ?>
      <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" arial-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
      </div>
    <?php endif; ?>
    <form action="" class="form" method="post">
      <img src="image/avatar.png" alt="">
      <h2>Login</h2>
      <div class="input-group">
        <input type="text" name="username" required>
        <label for="loginUser">User Name</label>
      </div>
      <div class="input-group">
        <input type="password" name="password" required>
        <label for="loginPassword">Password</label>
      </div>
      <input type="submit" name="login" value="LOGIN" class="submit-btn">
      <p>
        Note : Harap login jika ingin edit data
      </p>
      <div class="forgot-pw">User : admin</div>
      <div class="forgot-pw">Pass : admin</div>

    </form>

  </div>
</body>
</html>