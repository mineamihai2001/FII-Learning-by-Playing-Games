<!DOCTYPE html>
<html lang="en">
<?php require_once VIEWS . "/templates/header.php" ?>

<body>
    <?php require_once  VIEWS . '/templates/navbar.php' ?>
    <div id="page">
        <div id="current">
            <div id="lesson" class="current-status">
                <div id="current-lesson"></div>
                <div id="lesson-name"></div>
            </div>
            <div id="chapter" class="current-status">
                <div id="current-chapter"></div>
                <div id="chapter-name"></div>
            </div>
        </div>
        <div id="main-pane">
            <div id="lessons-bar">
                <div class="bubble">
                    <div></div>
                    <p></p>
                </div>
                <div class="bar"></div>
                <div class="bubble">
                    <div></div>
                    <p></p>

                </div>
                <div class="bar"></div>
                <div class="bubble">
                    <div></div>
                    <p></p>

                </div>
                <div class="bar"></div>
                <div class="bubble">
                    <div></div>
                    <p></p>

                </div>
                <div class="bar"></div>
                <div class="bubble">
                    <div></div>
                    <p></p>

                </div>
                <div class="bar"></div>
                <div class="bubble">
                    <div></div>
                    <p></p>

                </div>
                <div class="bar"></div>
                <div class="bubble">
                    <div></div>
                    <p></p>

                </div>
            </div>
            <div id="learn">
                <p id="content"></p>
            </div>
        </div>
        <div id="bottom-div">
            <button id="next-btn" class="next">
                <p>Next Lesson</p>
                <i class="fa fa-solid fa-arrow-right"></i>
            </button>
        </div>
    </div>
    <?php require_once VIEWS . "/templates/footer.php" ?>
</body>

</html>