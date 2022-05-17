<!DOCTYPE html>
<html lang="en">
<?php require_once './templates/header.php' ?>

<body>
    <?php require_once './templates/navbar.php' ?>
    <div id="page">
        <div id="login-frame">
            <div class="back">
                <a href="login.html"><i class="fa fa-solid fa-angle-left"></i></a>
            </div>
            <div id="first" class="component">
                <div class="title">
                    <p>Sign-up</p>
                </div>
                <input class="credentials" type="text" placeholder="E-mail or Username" />
                <br />
                <input class="credentials" type="text" placeholder="Password" />
                <input class="credentials" type="text" placeholder="Confirm Password" />
            </div>
            <div id="buttons" class="component">
                <div class="main-login">
                    <button class="btn login-btn button_slide">Register</button>
                </div>
            </div>
            <div class="agreement">
                <input type="checkbox" />
                <a>I agree to the terms and conditions</a>
            </div>
            <div class="agreement">
                <input type="checkbox" />
                <a>I want to subscribe to the newsletter and/or <br />
                    receive notifications about news and offers</a>
            </div>
        </div>
    </div>
</body>

</html>