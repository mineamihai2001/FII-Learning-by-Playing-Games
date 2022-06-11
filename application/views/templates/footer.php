<?php require_once VIEWS . "/config.php";
if ($page) { ?>

    <script src="/www/js/modules.js" type="module"></script>
    <script src="/www/js/index.js" type="module"></script>
    <script src=<?php echo $page["src"] ?> type="module"></script>
<?php } ?>