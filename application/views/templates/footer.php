<?php require_once VIEWS . "/config.php";
if ($page) { ?>
    <body>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- 3 coloane, company, get help, online shop, follow us -->
                <div class="footer-col">
                    <h4>
                    company
                    </h4>
                    <ul>
                        <!-- itemele continute de company -->
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">privacy policy</a></li>
                        <li><a href="#">website GIT</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>
                    get help
                    </h4>
                    <ul>
                        <!-- itemele continute de gethelp-->
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">contact</a></li>
                        <li><a href="#"></a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>
                    online shop
                    </h4>
                    <ul>
                        <!-- itemele continute de online shop -->
                        <li><a href="#">merch</a></li>
                        <li><a href="#">merch</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>
                    follow us
                    </h4>
                    <!-- itemele continute de follow us -->
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
    <script src="/www/js/modules.js" type="module"></script>
    <script src="/www/js/index.js" type="module"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    <script src=<?php echo $page["src"] ?> type="module"></script>
    
<?php } ?>