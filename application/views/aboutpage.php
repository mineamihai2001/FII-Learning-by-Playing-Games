<!DOCTYPE html>
<html lang="en">
<?php require_once VIEWS . "/templates/header.php" ?>

<body>
<?php require_once VIEWS . '/templates/navbar.php' ?>
<div class="section">
        <div class="container">
            <div class="content-section">
                <div class="title">
                    <h1>About Us</h1>
                </div>
                <div class="content">
                    <h3>
                      Innovate Learning
                    </h3>
                    <p>
                      This website is our take of learning the PC components by using games and simple to process information with a well structured learning pattern so the information is as easy as possible to understand and remember.
                      We are a team of 3 people with creative and smart ideas that put together this website using html, CSS, a little javascript for the front-end and for the back-end we used PHP.
                      Our code is well structured and for now with zero know bugs. :)
                      We tried our best to offer support in learning the main components of a computer. 
                      We aimed to save the progress of every user in the learning process based on different difficulty levels.
                      We also wanted to generate a leaderboard of the best users.
                      We hope that we managed to get pretty close to our goals, but the website can still get some further development when we get better.
                      Thanks for using our website and for any questions the user can contact us with the details given in the documentation link bellow.
                    </p>
                    <div class="button">
                        <a href="\docs\scholarly.html"> >>> Documentation here <<< </a>
                    </div>
                    <div class="button">
                        <a href="\docs\openapi.yaml"> >>> Open API docs <<< </a>
                    </div>
                </div>
                <div class="social">
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                </div>

            </div>
            <div class="image-section">
                <img src="\www\images\aboutusexample.jpg" alt="imagine">
            </div>
        </div>
    </div>
<?php require_once VIEWS . "/templates/details.php" ?>
<?php require_once VIEWS . "/templates/footer.php" ?>
</body>

</html>