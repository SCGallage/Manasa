<html>

<head>
    <title>{{title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/img/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="assets/css/caller_visitor_volunteer_styles.css">
    <script src="http://localhost/assets/js/scripts.js"></script>
</head>

<body>


<div id="top" class="mainContainer col-l-12 col-m-12 col-s-12">

    <?php include '../views/components/header_caller_home.php'; ?>

    <?php include '../views/components/banner_caller_home.php'; ?>

    <?php include '../views/components/about_client.php'; ?>

    {{content}}

    <?php
        include '../views/components/quests_caller_home.php';
        include '../views/components/team_caller_home.php';
        include "../views/components/absolute_button_client.php";
        ?>

</div>
<?php include "../views/components/footer_client.php"; ?>
</body>

</html>