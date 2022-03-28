<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>401 Error</title>
</head>
<style>
    * {
        margin: 0%;
        padding: 0%;
    }
    
    body {
        background-color: #EFEFEF;
    }

    .container {
        display: flex;
        /* flex-direction: column; */
        height: 100vh;
        justify-content: center;
        align-items: center;
        font-family: 'Josefin Sans', sans-serif;
    }

    svg {
        height: 100px;
        width: 100px;
    }

    .content {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 4rem;
    }

    .title-text {
        font-size: 2.5rem;
        font-weight: 700;
        color: #5F5F5F;
    }

    .description-text {
        font-size: 1.5rem;
        font-weight: 400;
        margin-top: 1rem;
        color: #444444;
    }

    .home-link {
        text-decoration: none;
        background-color: #003249;
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 30px;
        margin-top: 1.3rem;
    }
</style>
<body>
    <div class="container">
        <!-- <img src="./assets/img/errors/404.svg" alt="" class="404-image"> -->

        <div class="content">
            <span class="title-text">Missing Permissions!</span>
            <span class="description-text">Don't worry though, there is always a way to get back home.</span>
            <a href="/login" class="home-link">BACK HOME</a>
        </div>
    </div>
</body>
</html>