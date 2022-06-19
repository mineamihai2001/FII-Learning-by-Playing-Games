<!DOCTYPE html>
<html lang="en">
<?php require_once VIEWS . "/templates/header.php" ?>

<body>
<?php require_once VIEWS . '/templates/navbar.php' ?>
<div id="page">
    <div id="login-frame" meta="login-box" content="The main form where the login credentials are validated">
        <form action="/application/action_login" method="POST" id="login-form" class="component">
            <div class="title">
                <p>Login</p>
            </div>
            <input class="credentials" type="text" placeholder="E-mail or Username" name="username"/>
            <br/>
            <input class="credentials" type="password" placeholder="Password" name="password"/>
            <div class="main-login">
                <button type="submit" class="btn login-btn button_slide">Sign in</button>
            </div>
        </form>
        <div id="buttons" class="component">
            <div class="bar">
                <hr/>
                <p>Or</p>
                <hr/>
            </div>

            <div class="other-logins">
                <script>Cookies.remove('image');</script>
                <script src="https://accounts.google.com/gsi/client?" async defer></script>
                <div id="g_id_onload"
                     data-client_id="899484396458-g6b6iqrtk9f57so14vce3ahlenhahg1h.apps.googleusercontent.com"
                     data-callback="handleCredentialResponse"
                >
                </div>
                <script>
                    function decodeJwtResponse(token) {
                        let base64Url = token.split('.')[1];
                        let base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
                        let jsonPayload = decodeURIComponent(atob(base64).split('').map(function (c) {
                            return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
                        }).join(''));

                        return JSON.parse(jsonPayload)
                    }

                    function handleCredentialResponse(response) {
                        const responsePayload = decodeJwtResponse(response.credential);
                        const url = "/application/api_login";
                        const xmlhttp = new XMLHttpRequest();
                        const params = `name=${responsePayload.given_name}&email=${responsePayload.email}&image=${responsePayload.picture}`;

                        xmlhttp.open("POST", url, true);
                        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xmlhttp.onreadystatechange = () => {
                            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                const response = JSON.parse(xmlhttp.responseText);
                                console.log(response);
                                if (response.status === 'success') {
                                    if(response.image) {
                                        Cookies.set("image", response.image);
                                    }
                                    window.location.href = '/application/homepage';
                                }
                            }
                        }
                        xmlhttp.send(params);

                    }
                </script>
                <div class="g_id_signin" data-type="standard"></div>
            </div>
        </div>
        <div class="signup">
            <a href="signup">Don't have an account yet? Sign-up now.</a>
        </div>
    </div>
</div>
<?php require_once VIEWS . '/templates/footer.php' ?>
</body>

</html>