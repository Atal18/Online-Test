<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:first.php');
}

$conn = mysqli_connect('localhost','root');
mysqli_select_db($conn,'quizdbase');

?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Quiz</title>
        <link rel="stylesheet" href="style3.css">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
     
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="
         https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

         <style type="text/css">
         .animateuse{
         animation: leelaanimate 0.5s infinite;
         }
         @keyframes leelaanimate{
         0% { color: red },
         10% { color: yellow },
         20%{ color: blue }
         40% {color: green },
         50% { color: pink }
         60% { color: orange },
         80% {  color: black },
         100% {  color: brown }
         }

         body{
             color:#333;
         }
      </style>
        
    </head>
    <body>


<div>
<h1 class="text-center text-white font-weight-bold text-uppercase bg-dark" >  SUBTLE ONLINE TEST </h1><br>
      <div class="container ">

        <div class="container">
            

<div class=" col-lg-12 text-center">
               <h3> <a href="#" class="text-uppercase text-warning " > <?php echo $_SESSION['user_name']; ?>,</a> Welcome to Subtle Online Test </h3>
            </div>
            <br>
            <div class="col-lg-8 d-block m-auto bg-light quizsetting ">
               <div class="card">
                  <p class="card-header text-center" > <?php echo $_SESSION['user_name']; ?>, you have to select only one out of 4. Best of Luck <i class="fas fa-thumbs-up"></i>	 </p>
               </div>
               <br>
            
     <form action="check.php" method="post">
            <?php

          for ($i=1; $i < 26;$i++ ) { 
              
            $q = "select * from questions where qid=$i";
            $query = mysqli_query($conn,$q);
            while ($rows = mysqli_fetch_array($query)) {
                ?>

                <div class="card">
                    <h4 class="card-header">
                        <?php  echo $rows['question'] ?>
                    </h4>
                
                <?php
                $q = "select * from answers where ans_id=$i";
                $query = mysqli_query($conn,$q);
                while ($rows = mysqli_fetch_array($query)) {
                    ?>
                <div class="card-body">
                    <input type="radio" name="quizcheck[<?php echo $rows['ans_id'];?>]" id="" value=" <?php echo $rows['aid']; ?>">
                    <?php echo $rows['answer']; ?>

                </div>

    

            <?php



            }
        }
      
        }
            ?>

        <!-- </div> -->

        <input type="submit" name="submit" value="Submit" class="btn btn-success m-auto d-block"><a href="check.php" ></a>
        </form>
        </div>
        </div>

</div>
    </body>
    </html>