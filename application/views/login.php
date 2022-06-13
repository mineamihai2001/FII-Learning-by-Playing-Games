<!DOCTYPE html>
<html lang="en">
<?php require_once VIEWS . "/templates/header.php" ?>

<body>
<?php require_once VIEWS . '/templates/navbar.php' ?>
<div id="page">
    <div id="login-frame">
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
                <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
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
                <!--                    <div class="btn login-google button_slide class="g_id_signin"" data-type="standard">-->
                <!--                        <div>-->
                <!--                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 128 128" id="Social_Icons" version="1.1" viewBox="0 0 128 128" xml:space="preserve">-->
                <!--                                <g id="_x31__stroke">-->
                <!--                                    <g id="Google">-->
                <!--                                        <rect clip-rule="evenodd" fill="none" fill-rule="evenodd" height="128" width="128" />-->
                <!--                                        <path clip-rule="evenodd" d="M27.585,64c0-4.157,0.69-8.143,1.923-11.881L7.938,35.648    C3.734,44.183,1.366,53.801,1.366,64c0,10.191,2.366,19.802,6.563,28.332l21.558-16.503C28.266,72.108,27.585,68.137,27.585,64" fill="#FBBC05" fill-rule="evenodd" />-->
                <!--                                        <path clip-rule="evenodd" d="M65.457,26.182c9.031,0,17.188,3.2,23.597,8.436L107.698,16    C96.337,6.109,81.771,0,65.457,0C40.129,0,18.361,14.484,7.938,35.648l21.569,16.471C34.477,37.033,48.644,26.182,65.457,26.182" fill="#EA4335" fill-rule="evenodd" />-->
                <!--                                        <path clip-rule="evenodd" d="M65.457,101.818c-16.812,0-30.979-10.851-35.949-25.937    L7.938,92.349C18.361,113.516,40.129,128,65.457,128c15.632,0,30.557-5.551,41.758-15.951L86.741,96.221    C80.964,99.86,73.689,101.818,65.457,101.818" fill="#34A853" fill-rule="evenodd" />-->
                <!--                                        <path clip-rule="evenodd" d="M126.634,64c0-3.782-0.583-7.855-1.457-11.636H65.457v24.727    h34.376c-1.719,8.431-6.397,14.912-13.092,19.13l20.474,15.828C118.981,101.129,126.634,84.861,126.634,64" fill="#4285F4" fill-rule="evenodd" />-->
                <!--                                    </g>-->
                <!--                                </g>-->
                <!--                            </svg>-->
                <!--                            <p>Sign in with Google</p>-->
                <!--                        </div>-->
                <!--                    </div>-->

<!--                <button class="btn login-microsoft button_slide">-->
<!--                    <div>-->
<!--                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"-->
<!--                             height="512px" style="enable-background: new 0 0 512 512" version="1.1"-->
<!--                             viewBox="0 0 512 512" width="512px" xml:space="preserve">-->
<!--                                <g id="_x32_16-microsoft">-->
<!--                                    <g>-->
<!--                                        <rect height="215.65" style="fill: #f25022" width="215.648" x="30.905"-->
<!--                                              y="30.904"/>-->
<!--                                        <rect height="215.65" style="fill: #7fba00" width="215.648" x="265.446"-->
<!--                                              y="30.904"/>-->
<!--                                        <rect height="215.651" style="fill: #00a4ef" width="215.648" x="30.905"-->
<!--                                              y="265.444"/>-->
<!--                                        <rect height="215.651" style="fill: #ffb900" width="215.648" x="265.446"-->
<!--                                              y="265.444"/>-->
<!--                                    </g>-->
<!--                                </g>-->
<!--                            <g id="Layer_1"/>-->
<!--                            </svg>-->
<!--                        <p>Sing in with Microsoft</p>-->
<!--                    </div>-->
<!--                </button>-->


                <!--                <button class="btn login-facebook button_slide">-->
                <!--                    <div>-->
                <!--                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"-->
                <!--                             enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.0"-->
                <!--                             viewBox="0 0 32 32" width="32px" xml:space="preserve">-->
                <!--                                <g>-->
                <!--                                    <path d="M32,30c0,1.104-0.896,2-2,2H2c-1.104,0-2-0.896-2-2V2c0-1.104,0.896-2,2-2h28c1.104,0,2,0.896,2,2V30z"-->
                <!--                                          fill="#3B5998"/>-->
                <!--                                    <path d="M22,32V20h4l1-5h-5v-2c0-2,1.002-3,3-3h2V5c-1,0-2.24,0-4,0c-3.675,0-6,2.881-6,7v3h-4v5h4v12H22z"-->
                <!--                                          fill="#FFFFFF" id="f"/>-->
                <!--                                </g>-->
                <!--                            <g/>-->
                <!--                            <g/>-->
                <!--                            <g/>-->
                <!--                            <g/>-->
                <!--                            <g/>-->
                <!--                            <g/>-->
                <!--                            </svg>-->
                <!--                        <p>Log in with Facebook</p>-->
                <!--                    </div>-->
                <!--                </button>-->
            </div>
        </div>
        <div class="signup">
            <a href="signup">Don't have an accout yet? Sign-up now.</a>
        </div>
    </div>
</div>
<?php require_once VIEWS . '/templates/footer.php' ?>
</body>

</html>