<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:first.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Admin Dashboard</title>

  <!-- Montserrat Font -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity= "sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous"/>
  <link rel="stylesheet" href="style2.css">
</head>

<body>
  <div class="grid-container">

    <!-- Header -->
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
    <!-- End Header -->

    <!-- Sidebar -->
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
          <span class="material-icons-outlined" >fact_check</span><a href="first.php" style="text-decoration: none;color: #9799ab;"> About-us</a>
        </li>

        <li class="sidebar-list-item">
          <span class="material-icons-outlined">poll</span><a href="check.php" style="text-decoration: none;color: #9799ab;"> Result</a>
        </li>

        <li class="sidebar-list-item">
          <span class="material-icons-outlined">logout</span> <a href="logout.php" style="text-decoration: none;color: #9799ab;">Logout</a>
        </li>

      </ul>
    </aside>
    <!-- End Sidebar -->

    <!-- Main -->
    <main class="main-container">

      <div class="main-title">
        <div class="aligned">
          <span class="info">
          <h3>Hi, <span class="bold_info">user</span></h3>
      <h1>Welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p class="para_info">Ready to boost your confidence by quizzing with us !!</p>

            <!-- <h1>Hi,Sudesh Sir</h1>
            <p>Ready to boost your confidence</p> -->
          </span>

          <span class="info-img">

            <img src="img1.png" width="200" >
          </span>


        </div>

      </div>

      <br><br>

      <div class="quiz_content">
      <div class="dropdown-menu">
      <a href="" class="btn">Quiz</a>
<div class="menu-content">
<a class="links" href="quiz.php">Level 1</a>
<a class="links" href="quiz2.php">Level 2</a>
<a class="links" href="quiz3.php">Level 3</a>


</div>
</div>
        <a href="check.php" class="btn">Result</a>
        <a href="logout.php" class="btn">logout</a>
      </div>

      <!-- <div class="main-cards">


        <div class="card">
          <div class="card-inner">
            <p class="text-primary">TOTAL QUESTIONS</p>
          </div>
          <span class="text-primary font-weight-bold">25</span>
        </div>

        <div class="card">
          <div class="card-inner">
            <p class="text-primary">ATTEMPTED</p>
          </div>
          <span class="text-primary font-weight-bold">23</span>
        </div>

        <div class="card">
          <div class="card-inner">
            <p class="text-primary">RIGHT QUESTIONS</p>
          </div>
          <span class="text-primary font-weight-bold">15</span>
        </div>

        <div class="card">
          <div class="card-inner">
            <p class="text-primary">TOTAL SCORE</p>
          </div>
          <span class="text-primary font-weight-bold">30</span>
        </div>

      </div>



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
              <div class="inside-circle"> 70% </div>
            </div>
          </div>
        </div> -->

      </div>
    </main>
    <!-- End Main -->

  </div>

  <!-- Scripts -->
  <!-- ApexCharts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
  <!-- Custom JS -->
  <script src="chart.js"></script>

  
</body>

</html>