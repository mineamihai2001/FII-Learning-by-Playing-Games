<!DOCTYPE html>
<html lang="en">
<?php require_once VIEWS . "/templates/header.php" ?>

<body>
<?php require_once  VIEWS . '/templates/navbar.php' ?>
    <div id="page">
        <div id="login-frame">
            <div class="back">
                <a href="login"><i class="fa fa-solid fa-angle-left"></i></a>
            </div>
            <form action="/application/action_signup" method="POST" id="first" class="component">
                <div class="title">
                    <p>Sign-up</p>
                </div>
                <input id="username" name="username" class="credentials" type="text" placeholder="E-mail or Username" />
                <br />
                <input id="password" name="password" class="credentials" type="password" placeholder="Password" />
                <input id="confirm_password" name="confirm_password" class="credentials" type="password" placeholder="Confirm Password" />
                <div id="buttons" class="component">
                    <div class="main-login">
                        <button id="submit-btn" onclick="event.preventDefault()" class="btn login-btn button_slide">Register</button>
                    </div>
                </div>
            </form>
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
    <?php require_once VIEWS . '/templates/footer.php' ?>
</body>

</html>