<!DOCTYPE html>
<html lang="en">
<?php require_once VIEWS . "/templates/header.php" ?>

<body>
<?php require_once VIEWS . "/templates/navbar.php" ?>
<div id="main">
    <div id="user-data">
        <img id="user-picture" class="profile" src="/www/images/profile_sample.jpg" alt="profile_pic"/>
        <div id="status">
            <div id="user-info">
                <h4 id="total">Current status is :</h4>
                <h4 id="current">Current status is :</h4>
                <h4 id="progress">Current status is :</h4>
            </div>
            <button id="ajax-trigger">See Full LeaderBoards</button>
        </div>
    </div>
    <div id="leaderboards">
        <p>Refreshes automatically every 60 seconds</p>
        <table id="result-table"></table>
    </div>
</div>
</body>

<link href="https://unpkg.com/tabulator-tables@5.2.7/dist/css/tabulator_midnight.min.css" rel="stylesheet">
<script type="text/javascript" src="https://unpkg.com/tabulator-tables@5.2.7/dist/js/tabulator.min.js"></script>

<?php require_once VIEWS . "/templates/details.php" ?>
<?php require_once VIEWS . "/templates/footer.php" ?>
</html>