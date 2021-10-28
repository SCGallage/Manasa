<html>

<head>
    <title>Manasa.lk/Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/img/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="assets/css/caller_visitor_volunteer_styles.css">
    <script src="http://localhost/assets/js/scripts.js"></script>
</head>

<body>


<div id="top" class="mainContainer col-l-12 col-m-12 col-s-12">

    <?php include 'components/caller/header_caller_home.php'; ?>

    <?php include 'components/caller/banner_caller_home.php'; ?>

    <?php include 'components/client/about_client.php'; ?>

    {{content}}

    <?php
        include 'components/caller/quests_caller_home.php';
        include 'components/caller/team_caller_home.php';
        include "components/client/absolute_button_client.php";
        ?>

</div>
<?php include "components/client/footer_client.php"; ?>
</body>

</html>