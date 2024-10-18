<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:first.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/first.css">

   <style>
       .form__group{
    /* width: 100%; */
    width:40%;
   padding:5px 10px;
   padding-right:40px;
   font-size: 20px;
   margin:8px 8px;
    /* margin-bottom: 2rem;
   background: rgba(255, 255, 255, 0.5); */
   /* border-radius: 5px;  */
       }
      
       
 /* .section-book form select{
   width: 100%;
   padding:10px 15px;
   padding-left: 4rem;
   font-size: 17px;
   margin:8px 0;
   background: rgba(255, 255, 255, 0.5);
   /* border-radius: 5px; 
}

.section-book form select option{
   background: #fff;
}  */


   </style>

</head>
<body>
   
<!-- <div class="form-container"> -->
<section class="section-book">
<div class="row">
<div class="book">

<div class="book_form">



   <form action="" method="post" class="form">
       <br><br><br>
   <div class="u-margin-bottom-medium">
      <h2 class="heading-secondary" style="margin:0px 25px;">
          Sign Up Now
        </h2>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
    </div>
    <div class="form__group">
                                <input type="text" name="name" placeholder="Enter Your Name" id="name" class="form__input" required>
                                <label for="text" class="form__label">Name</label>
                            </div>
                            <div class="form__group">
                                <input type="email" name="email" placeholder="Enter Email Address" id="email" class="form__input" required>
                                <label for="email" class="form__label">Email Address</label>
                            </div>
                            <div class="form__group">
                                <input type="password" name="password" placeholder="Enter your Password" id="password" class="form__input" required>
                                <label for="name" class="form__label">Password</label>
                            </div>
                            <div class="form__group">
                                <input type="password" name="cpassword" placeholder="Confirm your Password" id="password" class="form__input" required>
                                <label for="name" class="form__label">Confirm Password</label>
                            </div>
                            <div class="user_type">
                            <select name="user_type" class="form__group" style="margin:0px 18px;  background: rgba(255, 255, 255, 0.5); width:32.25%; padding: 1.2rem 1.5rem;">
         
         <option value="user" class="form__input" >user</option>
      
         <option value="admin" class="form__input" >admin</option>
        
        
     </select >
                            </div>
                            <br><br>
      


      <div class="form__group">
                                <div class="form__group-button">
                                    <button type="submit" name="submit" class="btn btn--orange">Login Now &rarr;</button>
                                </div>
                            </div>
      
      <p style="font-size: 20px;margin:0px 18px; ">already have an account? <a href="first.php" style="color: blue ; text-decoration:none">login now</a></p>
      <br><br><br>
    </form>
 </div>
</div>
</div>

</section>
<!-- </div> -->


</body>
</html>