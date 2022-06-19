<?php require_once VIEWS . "/config.php";
if ($page) { ?>

    <nav class="navbar">
        <div class="nav-item nav-brand">
            <a class="nav-logo" href="/application/home">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 32 32" version="1.1" viewBox="0 0 32 32" xml:space="preserve">
                    <g id="Layer_2" />
                    <g id="Layer_3" />
                    <g id="Layer_4" />
                    <g id="Layer_5" />
                    <g id="Layer_6" />
                    <g id="Layer_7" />
                    <g id="Layer_8" />
                    <g id="Layer_9" />
                    <g id="Layer_10" />
                    <g id="Layer_11" />
                    <g id="Layer_12" />
                    <g id="Layer_13" />
                    <g id="Layer_14" />
                    <g id="Layer_15" />
                    <g id="Layer_16" />
                    <g id="Layer_17" />
                    <g id="Layer_18" />
                    <g id="Layer_19" />
                    <g id="Layer_20" />
                    <g id="Layer_21" />
                    <g id="Layer_22" />
                    <g id="Layer_23" />
                    <g id="Layer_24" />
                    <g id="Layer_25" />
                    <g id="Layer_26" />
                    <g id="Layer_27" />
                    <g id="Layer_28" />
                    <g id="Layer_29">
                        <g>
                            <g>
                                <path d="M16,6.9585c-0.5522,0-1-0.4478-1-1v-3.917c0-0.5522,0.4478-1,1-1s1,0.4478,1,1v3.917     C17,6.5107,16.5522,6.9585,16,6.9585z" fill="#4391B2" />
                            </g>
                            <g>
                                <path d="M11,7c-0.5522,0-1-0.4478-1-1V2c0-0.5522,0.4478-1,1-1s1,0.4478,1,1v4C12,6.5522,11.5522,7,11,7z" fill="#4391B2" />
                            </g>
                            <g>
                                <path d="M21,7c-0.5527,0-1-0.4478-1-1V2c0-0.5522,0.4473-1,1-1s1,0.4478,1,1v4C22,6.5522,21.5527,7,21,7z" fill="#4391B2" />
                            </g>
                            <g>
                                <path d="M16,30.9585c-0.5522,0-1-0.4478-1-1v-3.917c0-0.5522,0.4478-1,1-1s1,0.4478,1,1v3.917     C17,30.5107,16.5522,30.9585,16,30.9585z" fill="#4391B2" />
                            </g>
                            <g>
                                <path d="M11,31c-0.5522,0-1-0.4478-1-1v-4c0-0.5522,0.4478-1,1-1s1,0.4478,1,1v4C12,30.5522,11.5522,31,11,31z" fill="#4391B2" />
                            </g>
                            <g>
                                <path d="M21,31c-0.5527,0-1-0.4478-1-1v-4c0-0.5522,0.4473-1,1-1s1,0.4478,1,1v4C22,30.5522,21.5527,31,21,31z" fill="#4391B2" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <path d="M5.9585,17h-3.917c-0.5522,0-1-0.4478-1-1s0.4478-1,1-1h3.917c0.5522,0,1,0.4478,1,1S6.5107,17,5.9585,17     z" fill="#4391B2" />
                            </g>
                            <g>
                                <path d="M6,22H2c-0.5522,0-1-0.4478-1-1s0.4478-1,1-1h4c0.5522,0,1,0.4478,1,1S6.5522,22,6,22z" fill="#4391B2" />
                            </g>
                            <g>
                                <path d="M6,12H2c-0.5522,0-1-0.4478-1-1s0.4478-1,1-1h4c0.5522,0,1,0.4478,1,1S6.5522,12,6,12z" fill="#4391B2" />
                            </g>
                            <g>
                                <path d="M29.958,17h-3.916c-0.5527,0-1-0.4478-1-1s0.4473-1,1-1h3.916c0.5527,0,1,0.4478,1,1     S30.5107,17,29.958,17z" fill="#4391B2" />
                            </g>
                            <g>
                                <path d="M30,22h-4c-0.5527,0-1-0.4478-1-1s0.4473-1,1-1h4c0.5527,0,1,0.4478,1,1S30.5527,22,30,22z" fill="#4391B2" />
                            </g>
                            <g>
                                <path d="M30,12h-4c-0.5527,0-1-0.4478-1-1s0.4473-1,1-1h4c0.5527,0,1,0.4478,1,1S30.5527,12,30,12z" fill="#4391B2" />
                            </g>
                        </g>
                        <g>
                            <path d="M27,6v20c0,0.55-0.45,1-1,1H6c-0.55,0-1-0.45-1-1V6c0-0.55,0.45-1,1-1h20C26.55,5,27,5.45,27,6z" fill="#48B1DD" />
                        </g>
                        <g>
                            <path d="M23,12v8c0,1.65-1.35,3-3,3h-8c-1.65,0-3-1.35-3-3v-8c0-1.65,1.35-3,3-3h8C21.65,9,23,10.35,23,12z" fill="#96CEE5" />
                        </g>
                    </g>
                    <g id="Layer_30" />
                    <g id="Layer_31" />
                </svg>
                <p>Learn<b>TheComputer</b></p>
            </a>
        </div>
        <?php if ($page['navbar'] == "yes") { ?>
            <input id="collapse" type="checkbox" style="display: none" />
            <label id="menu-btn" class="nav-item" for="collapse">
                <div class="burger"></div>
            </label>
            <ul class="nav-list">
                <li class="nav-item"><a href="homepage">Home</a></li>
                <li class="nav-item current"><a href="lesson">Learn</a></li>
                <li class="nav-item"><a href="about">About</a></li>
                <li class="nav-item"><a href="account">Account</a></li>
                <li id="logout-btn" class="nav-item"><a href="/application/logout">Logout</a></li>
                <li class="nav-item">
                    <a href="">
                        <img id="picture" class="profile" src="/www/images/profile_sample.jpg" alt="profile_pic" />
                    </a>
                </li>
            </ul>
        <?php } ?>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
<?php } ?>