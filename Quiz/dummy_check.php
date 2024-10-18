<?php


session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

$conn = mysqli_connect('localhost','root');
mysqli_select_db($conn,'quizdbase');

if (isset($_POST['submit'])) {
if (!empty($_POST['quizcheck'])) {
    $count = count($_POST['quizcheck']);
    echo "Out of 5,you have selected " .$count. "options" ;

    $result =0;
    $i=1;

    $selected = $_POST['quizcheck'];
    print_r($selected);

    $q="select * from questions";
    $query=mysqli_query($conn,$q);

    while ($rows=mysqli_fetch_array($query)) {
        print_r($rows['ans_id']);

        $checked =$rows['ans_id'] == $selected[$i];

        if ($checked) {
            $result++;
        }
        $i++;
    }

    echo "<br> Your total Score is " .$result;
}
} 

$name = $_SESSION['user_name'];
            $finalresult = " insert into user(username,totalques,answerscorrect) values ('$name','5','$result') ";
            $queryresult= mysqli_query($conn,$finalresult); 

?>