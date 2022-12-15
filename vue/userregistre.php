<?php

include '../model/connexion.php' ;
session_start();


if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_user = $connexion->prepare("SELECT * FROM users WHERE Email = ?");
   $select_user->execute([$email,]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $message[] = 'email already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $insert_user = $connexion->prepare("INSERT INTO `users`(name, Email, password) VALUES(?,?,?)");
         $insert_user->execute([$name, $email, $cpass]);
         $message[] = 'registered successfully, login now please!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.2/morph/bootstrap.min.css" integrity="sha512-0FfrskJVVfHU9xtJX0fEwlR/s4gKxATs1CnfrdUsuTiUw9MqWbKwUH0ZYxcoUUnGJ8qdaAzVBtZFpXL363y/Ng==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <title>register</title>
</head>
<body>
   





   <form action="" method="post">
   <div class="container text-center">
   <div class="container">
        <h2 class="text-center mb-5 shadow-sm p-3">Registre Now</h2>
        </div>
  <div class="row">
    <div class="col">
        <img src="https://apcse-expert.com/wp-content/uploads/2020/05/websiteDesignNegocierUnAccord01-1024x1024.png" alt="imagecontact" style="height:400px; width:400px";>
          </div>
          <div class="col">
      <div class="col-md-7 shadow rounded p-5" >
        <div class="row">
          <div class="col-mb-3"> 
            <label class="form-label">Name</label>
            <input onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'enter your name'" class="form-control" type="text" name="name" required placeholder="enter your username" maxlength="20"  class="box" />
          </div>
          <div class="col-mb-3">
            <label class="form-label">Email</label>
            <input onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'enter your email'" class="form-control" type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')" />
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'enter your password'" class="form-control" type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')"/>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input  onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'confirm your password'"class="form-control" type="password" name="cpass" required placeholder="confirm your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')" />
          </div>
          <button type="submit" value="register now" class="btn" name="submit"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
          >
            Registre Now
          </button>
          <p>already have an account?</p>
      <a href="index.php" class="option-btn">login now</a>
   </form>




</body>
</html>