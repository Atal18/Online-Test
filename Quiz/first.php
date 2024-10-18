<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {

            $_SESSION['admin_name'] = $row['name'];
            header('location:user.php');
        } elseif ($row['user_type'] == 'user') {

            $_SESSION['user_name'] = $row['name'];
            header('location:user.php');
        }
    } else {
        $error[] = 'incorrect email or password!';
    }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/first.css">
    <link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Arbutus+Slab&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subtle project</title>
</head>

<body>

    <!-- <div class="navigation">
        <input type="checkbox" class="navigation_checkbox" id="navi-toggle">

        <label for="navi-toggle" class="navigation_button">
            <span class="navigation__icon">&nbsp;</span>
             <span class="navigation__icon">&nbsp;</span>
            <span class="navigation__icon">&nbsp;</span> 
        </label>

        <div class="navigation_background">&nbsp;</div>

        <div class="navigation_nav">
            <ul class="navigation_list">
                <li class="navigation_item"> <a href="#header" class="navigation_links">Home</a></li>
                <li class="navigation_item"> <a href="#section-about" class="navigation_links">About Us</a></li>
                <li class="navigation_item"> <a href="#section-book" class="navigation_links">Sign In</a></li>
                <li class="navigation_item"> <a href="register_form.php" class="navigation_links">Sign Up</a></li>
                 <li class="navigation_item"> <a href="#sectionbook" class="navigation_links">Book Now</a></li> 
            </ul>
        </div>
    </div> -->

    <header class="header" id="header">
        <div class="header__1"></div>
        <div class="header__logo-box">
            <i class="fa-solid fa-rocket header__logo"></i>
        </div>
        <div class="header__text-box">
            <h1 class="header-primary">
                <span class="header-primary--main">Subtle</span>
                <span class="header-primary--sub">Online Test</span>
            </h1>
            <a href="#section-about" class="btn btn--white btn--animated">Get Started</a>
        </div>
    </header>


    <main>

        <section class="section-about" id="section-about">
            <div class="u-text-center u-margin-bottom-large">
                <h2 class="heading-secondary">
                    What is Subtle online Test...?
                </h2>
            </div>
            <div class="row">
                <div class="col-1-of-2">
                    <h3 class="heading-tertiary u-margin-bottom-small">Subtle Online Test Platform !!</h3>
                    <p class="paragraph">The online quiz world has a little something for everyone, so we have put together our Top 10 online free programming quizzes that you definitely will want to try.
                    </p>

                    <h3 class="heading-tertiary u-margin-bottom-small">All about online Quizzes.</h3>
                    <p class="paragraph">Quizzes about space exploration to keep your mind busy while you are social distancing. We hope these quizzes will keep your mind busy while you are social distancing at home.
                    </p>
                    <!-- <a href="#" class="btn-text">Read more &rarr;</a> -->
                </div>
                <div class="col-1-of-2">
                    <div class="composition">
                    <img src="img/quiz5.png" alt="Photo 1" class="composition__photo composition__photo--p1">
                        <img src="img/quiz.png" alt="Photo 2" class="composition__photo composition__photo--p2">
                        <img src="img/quiz13.png" alt="Photo 3" class="composition__photo composition__photo--p3">
                    </div>
                </div>
            </div>
        </section>


        <section class="section-features" id="section-features">
            <div class="section-features__2"></div>
            <div class="row">
                <div class="col-1-of-4">
                    <div class="feature-box">
                        <i class="feature-box__icon fas fa-globe "></i>
                        <h3 class="heading-tertiary u-margin-bottom-small">Online world</h3>
                        <p class="feature-box__text">An online tool to identify the programming skills that may benefit you in recuritment, assessment and selection.</p>
                    </div>
                </div>
                <div class="col-1-of-4">
                    <div class="feature-box">
                        <i class="feature-box__icon far fa-compass"></i>
                        <h3 class="heading-tertiary u-margin-bottom-small"> Exam and Security </h3>
                        <p class="feature-box__text">Get an email and app notifications when someone tries to copy paste, print screen or multiple login attempts.</p>
                    </div>
                </div>
                <div class="col-1-of-4">
                    <div class="feature-box">
                        <i class="feature-box__icon far fa-map"></i>
                        <h3 class="heading-tertiary u-margin-bottom-small">Find your way</h3>
                        <p class="feature-box__text">Create customized registration page in form builder, candidates can create an account in your exam portal.</p>
                    </div>
                </div>
                <div class="col-1-of-4">
                    <div class="feature-box">
                        <i class="feature-box__icon far fa-heart"></i>
                        <h3 class="heading-tertiary u-margin-bottom-small">Awaesome Support</h3>
                        <p class="feature-box__text">The best-in-class phone and email support available for crucial exams. Conduct tests with confidence.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-book" id="section-book">
            <div class="row">
                <div class="book">
                    <div class="book__form">
                        <form action="" method="post" class="form">
                            <div class="u-margin-bottom-medium">
                                <h2 class="heading-secondary">
                                    Sign in Now
                                </h2>
                                <?php
                                if (isset($error)) {
                                    foreach ($error as $error) {
                                        echo '<span class="error-msg">'.$error.'</span>';
                                    };
                                };
                                ?>

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
                                <div class="form__group-button">
                                    <button type="submit" name="submit" class="btn btn--orange">Sign In &rarr;</button>
                                </div>
                            </div>
                            <p style="font-size: 15px;">don't have an account? <a href="register_form.php" style="color: blue ; text-decoration:none";>Sign Up</a></p>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer__logo-box  u-text-center u-margin-bottom-large">
            <i class="fa-solid fa-rocket footer__logo"></i>
        </div>
        <div class="row">
            <div class="col-1-of-2">
                <div class="footer__navigation">
                    <ul class="footer__list">
                        <li class="footer__item"> <a href="#section-about" class="footer__link">About Us</a></li>
                        <li class="footer__item"><a href="#section-features" class="footer__link">Features</a></li>
                        <li class="footer__item"><a href="#section-book" class="footer__link">Enroll Now</a></li>
                        <li class="footer__item"><a href="#header" class="footer__link">SOT</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-1-of-2">
                <p class="footer__copyright">
                    Built by <a href="#" class="footer__link">SOT Team</a>
                    with Effort to take your Quzing Skills to next level.
                    <!-- <a href="#" class="footer__link"> Jonas Schmedtmann </a>  -->
                    <!-- this design is made by jonas itself but we can use this in 
                    personal and commercial project as well without any issue. -->
                    copyright&copy; Subtle Online Test.
                </p>
            </div>
        </div>
    </footer>

    <!-- <section class="row">
        <div class="col-1-of-2">col-1-of-2</div>
        <div class="col-1-of-2">col-1-of-2</div>
    </section> -->

</body>

</html>