<?php


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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Admin Dashboard</title>

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

 
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

  
  <link rel="stylesheet" href="style2.css">
</head>

<body>
  <div class="grid-container">

  
    <header class="header">
      <div class="menu-icon" onclick="openSidebar()">
        <span class="material-icons-outlined">menu</span>
      </div>
      <div class="header-left">
        <h2>DASHBOARD</h2>
      </div>
      <div class="header-right">

        <!-- <span class="material-icons-outlined">
          <a href="mailto:">email</a> </span> -->
        <span class="material-icons-outlined">
          <img src="admin.png" alt="" srcset="">
        </span>
      </div>
    </header>
   
    <aside id="sidebar">
      <div class="sidebar-title">
        <div class="sidebar-brand">
          <span class="material-icons-outlined">inventory</span> Admin
        </div>
        <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
      </div>

      <ul class="sidebar-list">
        <li class="sidebar-list-item">
          <span class="material-icons-outlined">dashboard</span> Dashboard
        </li>


        <li class="sidebar-list-item">
          <span class="material-icons-outlined" >fact_check</span> <a href="first.php" style="text-decoration: none;color: #9799ab;"> About-us</a>
        </li>

        <li class="sidebar-list-item">
          <span class="material-icons-outlined">poll</span><a href="check.php" style="text-decoration: none;color: #9799ab;"> Result</a>
        </li>

        <li class="sidebar-list-item">
          <span class="material-icons-outlined" >logout</span> <a href="logout.php" style="text-decoration: none;color: #9799ab;">Logout</a>
        </li>

      </ul>
    </aside>
    
    <!-- Main -->
    <main class="main-container">

      <div class="main-title">
        <div class="aligned">
          <span class="info">
          <h3>Hi, <span class="bold_info">user</span></h3>
      <h1>Welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p class="para_info">Ready to boost your confidence by quizzing with us !!</p>

          </span>

          <span class="info-img">

            <img src="img1.png" width="200">
          </span>


        </div>

      </div>

      <br><br>

      <div class="main-cards">


<div class="card">
  <div class="card-inner">
    <p class="text-primary">TOTAL QUESTIONS</p>
  </div>
  <span class="text-primary font-weight-bold"><?php
  $sql = "SELECT * from questions";
  if ($result = mysqli_query($conn, $sql)) {
  
      $rowcount = mysqli_num_rows( $result );
      
   }
  
   echo $rowcount ; ?></span>
</div>

<div class="card">
  <div class="card-inner">
    <p class="text-primary">ATTEMPTED</p>
  </div>
  <span class="text-primary font-weight-bold"><?php 
  if (isset($_POST['submit'])) {
    if (!empty($_POST['quizcheck'])) {
        $count = count($_POST['quizcheck']);
    }
}
  
  echo $count ; ?> </span>
</div>

<div class="card">
  <div class="card-inner">
    <p class="text-primary">RIGHT QUESTIONS</p>
  </div>
 
  <span class="text-primary font-weight-bold">
  <?php
  $result =0;
  $i=1;


  $selected = $_POST['quizcheck'];

  
 
    $q="select * from questions";
    $query=mysqli_query($conn,$q);
  
    while ($rows=mysqli_fetch_array($query)) {
  
        $checked =$rows['ans_id'] == $selected[$i];
        
        
        if ($checked) {
            $result++;
        }
        $i++;
    }

    if ($checked != 25 || $result==0  )
    echo "<script>alert('Do attemp all questions');window.location.href=' quiz.php '</script>";
   
    
else {
  echo $result ; 
 
}
    
  
  

 
  
  $wrong=25-$result;
  $name = $_SESSION['user_name'];
            $finalresult = " insert into user2(username,totalques,attemptedques,answerscorrect,wrongques,review) values ('$name','5','$count','$result','$wrong','') ";
            $queryresult= mysqli_query($conn,$finalresult); 
            ?>
            </span>
</div>

<div class="card">
  <div class="card-inner">
    <p class="text-primary">TOTAL SCORE</p>
  </div>
  <span class="text-primary font-weight-bold"><?php 
  $score=$result*5;
  echo $score ; ?></span>
</div>

</div>

<br><br>

 <div class="charts">

<div class="charts-card">
  <p class="chart-title">Total Score in graph format</p>
  <div id="bar-chart"></div>
</div>

<div class="charts-card">
  <p class="chart-title">Total Score</p>
  <div class="circle-wrap">
    <div class="circle">
      <div class="mask full">
        <div class="fill"></div>
      </div>
      <div class="mask half">
        <div class="fill"></div>
      </div>
      <div class="inside-circle"> 
       <?php
       echo (($score*100)/125)."%";
       ?>
       </div>
    </div>
  </div>
</div> 



      </div>
    </main>
    <!-- End Main -->


  </div>

  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
  
  <script>
  var sidebarOpen = false;
var sidebar = document.getElementById("sidebar");

function openSidebar() {
  if (!sidebarOpen) {
    sidebar.classList.add("sidebar-responsive");
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if (sidebarOpen) {
    sidebar.classList.remove("sidebar-responsive");
    sidebarOpen = false;
  }
}



// ---------- CHARTS ----------

// BAR CHART
var barChartOptions = {
  series: [{
    data: [
      <?php
      echo $count;
      ?>,
      <?php
      echo $result;
      ?>,
      <?php
      echo $wrong;
      ?>,
      
    ]
  }],
  chart: {
    type: 'bar',
    height: 350,
    toolbar: {
      show: false
    },
  },
  colors: [
    "#246dec",
    "#cc3c43",
    "#367952",
    "#f5b74f",
    "#4f35a1"
  ],
  plotOptions: {
    bar: {
      distributed: true,
      borderRadius: 4,
      horizontal: false,
      columnWidth: '40%',
    }
  },
  dataLabels: {
    enabled: false
  },
  legend: {
    show: false
  },
  xaxis: {
    categories: ["Attempted", "Right", "Wrong"],
  },
  yaxis: {
    title: {
      text: "Questions"
    }
  }
};

var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
barChart.render();



  </script>
</body>

</html>