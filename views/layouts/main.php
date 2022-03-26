<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/top_nav.css">
    <link rel="icon" type="image/png" href="http://localhost/assets/img/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="assets/css/caller_visitor_volunteer_styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{title}}</title>
</head>
<body>
    <nav class="top-navigation">
        <div class="nav-icon">
            <img src="./assets/img/icon.png" height="60px" alt="">
        </div>
        <ul class="all-nav-links">
            <li class="nav-item">
                <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="#services" class="nav-link">Service</a>
            </li>
            <li class="nav-item">
                <a href="#about" class="nav-link">About Us</a>
            </li>
            <li class="nav-item">
                <a href="#team" class="nav-link">Our Team</a>
            </li>
        </ul>
        <div class="button-container">
            <a href="/register" class="common-btn register-btn">Register</a>
            <a href="/login" class="common-btn login-btn">Login</a>
        </div>
    </nav>

    {{content}}
</body>
</html>
