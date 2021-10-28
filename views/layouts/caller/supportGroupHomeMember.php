<html>

<head>
    <title>Manasa.lk/SupportGroupHome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/img/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="assets/css/caller_visitor_volunteer_styles.css">
    <script src="../../assets/js/scripts.js"></script>
</head>

<body>

<div id="top" class="mainContainer col-l-12 col-m-12 col-s-12">
<?php
    include 'components/caller/header_caller_function.php';
    include 'components/caller/banner_caller_support_group_home.php';
?>

    {{content}}
<?php
    include 'components/caller/about_support_group.php';
    include 'components/caller/team_support_group_home.php';
?>
</div>

<?php include "components/client/footer_client.php"; ?>
<?php include "components/client/absolute_button_client.php"; ?>

</body>

</html>