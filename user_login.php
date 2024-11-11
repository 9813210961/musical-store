<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
}

if (isset($_POST['submit'])) {

   $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
   $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
   $hashedPass = sha1($pass);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $hashedPass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if ($select_user->rowCount() > 0) {
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
      exit();
   } else {
      $message[] = 'Incorrect username or password!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="form-container">

   <?php
      if (isset($message)) {
         foreach ($message as $msg) {
            echo '<p class="error-msg">' . htmlspecialchars($msg) . '</p>';
         }
      }
   ?>

   <form action="" method="post">
      <h3>Login now</h3>
      <input type="email" name="email" required placeholder="Enter your email" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="Enter your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="Login now" class="btn" name="submit">
      <p>Don’t have an account?</p>
      <a href="user_register.php" class="option-btn">Register now</a>
   </form>

</section>

</body>
</html>
