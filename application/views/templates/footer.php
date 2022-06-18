<?php require_once VIEWS . "/config.php";
if ($page) { ?>

    <script src="/www/js/modules.js" type="module"></script>
    <script src="/www/js/index.js" type="module"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    <script src=<?php echo $page["src"] ?> type="module"></script>
    
<?php } ?>