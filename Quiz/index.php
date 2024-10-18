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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <link rel="stylesheet" href="css/index.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>
    <div class="grid-container">

        <header class="header">

            <div class="header-left">
                <!-- <span class="material-icons-outlined">menu</span> -->
                <span class="main-title">DASHBOARD</span>

            </div>
            <div class="header-right">

                <span class="material-icons-outlined">
                    <a href="mailto:">email</a> </span>
                <span class="material-icons-outlined">
                    <img src="img/logo2.png" alt="" srcset="">
                </span>
            </div>
        </header>


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
                    <span class="material-icons-outlined">inventory_2</span> Homepage
                </li>

                <li class="sidebar-list-item">
                    <span class="material-icons-outlined">poll</span> Results
                </li>
            </ul>
        </aside>
        <!-- End Sidebar -->






        <main class="main-container">


            <div class="front-img">

                <div class="aligned">
                    <span class="info">
                        <h1>Hi,<span><?php echo $_SESSION['user_name'] ?></span></h1>
                        <p>Get ready to boost your confidence</p>
                    </span>

                    <span class="imgg">

                        <img src="img/logo.png" width="150">
                    </span>


                </div>

            </div>

            <div class="main-cards">


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
                    <p class="chart-title">Total Score </p>

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


                </div>

            </div>


        </main>


    </div>


    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="index.js"></script>

</body>

</html>