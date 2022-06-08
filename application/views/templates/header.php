<?php require_once VIEWS . "/config.php";
if ($page) { ?>

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- STYLES -->
        <link rel="stylesheet" href="/www/css/index.css" />
        <link rel="stylesheet" href=<?php echo $page["style"] ?> />


        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/0d9365b070.js" crossorigin="anonymous"></script>

        <title><?php echo $page["title"] ?></title>
    </head>

<?php } ?>