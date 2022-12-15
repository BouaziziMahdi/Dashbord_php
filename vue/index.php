<?php

 include '../model/connexion.php' ;

session_start();

   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email,FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass,FILTER_SANITIZE_STRING);

   $select_user = $connexion->prepare("SELECT * FROM users WHERE Email = ? AND password = ?");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $_SESSION['user_id'] = $row['id'];
      header('location:dashboard.php');
   }else{
      $message[] = 'incorrect username or password!';
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
   <title>login</title>
</head>
<body>


      <form action="" method="post" >
        <div class="container">
        <h2 class="text-center mb-5 shadow-sm p-3">Welcome TO Gestion Stock</h2>
        </div>
      <div class="container text-center">
  <div class="row">
    <div class="col">
        <img  src="https://www.celewish.com/images/contact-img.svg" alt="imagecontact" style="height:400px; width:400px;"  >
          </div>
          <div class="col">
      <div class="col-md-7 shadow rounded p-5" >
        <div class="row">
          <div class="col-mb-3"> 
            <label class="form-label">Email</label>
            <input onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'enter your email'" id="email" class="form-control" type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')" />
          </div>
          <div class="col-mb-3">
            <label class="form-label">Password</label>
            <input onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'enter your password'" class="form-control" type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')" />
          </div>
          <button 
          type="submit" value="login now" class="btn" name="submit"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
          >
          LogIn Now
          </button>
          <p>don't have an account?</p>
      <a href="./userregistre.php" class="option-btn">register now</a>
   </form>

   </div>
</div>
</div>
</section>













<?php include './footer.php'; ?>




</body>
</html>
