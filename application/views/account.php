<!DOCTYPE html>
<html lang="en">
<?php require_once VIEWS . "/templates/header.php" ?>

<body>
<?php require_once VIEWS . "/templates/navbar.php" ?>
    <div id="main">
        <div id="user-data">
            <img id="user-picture" class="profile" src="/www/images/profile_sample.jpg" alt="profile_pic" />
            <div id="status">
                <h2>Current status is :</h2>
            </div>
        </div>
        <div id="leaderboards">
            <button id="ajax-trigger">Get LeaderBoards</button>
            <table id="result-table"></table>
        </div>
    </div>
</body>

<link href="https://unpkg.com/tabulator-tables@5.2.7/dist/css/tabulator_midnight.min.css" rel="stylesheet">
<script type="text/javascript" src="https://unpkg.com/tabulator-tables@5.2.7/dist/js/tabulator.min.js"></script>

<?php require_once VIEWS . "/templates/details.php" ?>
<?php require_once VIEWS . "/templates/footer.php" ?>
</html>