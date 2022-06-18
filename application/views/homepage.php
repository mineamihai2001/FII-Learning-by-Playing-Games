<!DOCTYPE html>
<html lang="en">
<?php require_once VIEWS . "/templates/header.php" ?>

<body>
<?php require_once VIEWS . '/templates/navbar.php' ?>
<section class="hero">
    <div class="title">
        <h1>
            The Best Way for Learning
            <span>
                    <br/>
                    the Computer</span>
        </h1>
    </div>

    <div class="description">
        <p>
            LoremIpsumdolor is a learning based game for you <br/>
            to use and lay the foundations of computers
        </p>
    </div>

    <div class="container">
        <div class="primary-cta">
            <a href="lesson" class="getstarted-cta">Get Started</a>
            <!-- GET STARTED BUTTON change #-->
        </div>

        <div class="secondary-cta">
            <a href="about" class="learnmore-cta">Learn More</a>
            <!-- LEARN MORE BUTTON change #-->
        </div>
    </div>
</section>
<?php require_once VIEWS . "/templates/details.php" ?>

<?php require_once VIEWS . "/templates/footer.php" ?>
</body>

</html>