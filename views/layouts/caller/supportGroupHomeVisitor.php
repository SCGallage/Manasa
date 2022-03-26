<html>

<head>
    <title>{{title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/img/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="assets/css/caller_visitor_volunteer_styles.css">
    <script src="../../assets/js/scripts.js"></script>
</head>

<body>

<div id="top" class="mainContainer col-l-12 col-m-12 col-s-12">
<?php
    include '../views/components/header_caller_function.php';
    include '../views/components/banner_visitor_support_group_home.php';
?>

    {{content}}
<?php
    include '../views/components/about_support_group.php';
    include '../views/components/team_support_group_home.php';
?>
</div>

<?php include "../views/components/footer_client.php"; ?>
<?php include "../views/components/absolute_button_client.php"; ?>

</body>

</html>