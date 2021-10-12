<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/navbaronly.css">
    <title>{{title}}</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<nav class="navbar">
    <ul class="navbar-nav">
        <li class="logo">
            <div class="icon-header">
                <img src="./img/icon.png" alt="" class="icon-image">
                <svg
                        id="logo-icon"
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fad"
                        data-icon="angle-double-right"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512"
                        class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x"
                >
                    <g class="fa-group">
                        <path
                                fill="currentColor"
                                d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z"
                                class="fa-sec"
                        ></path>
                        <path
                                fill="currentColor"
                                d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z"
                                class="fa-pri"
                        ></path>
                    </g>
                </svg>
            </div>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fad"
                        data-icon="cat"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                        class="svg-inline--fa fa-cat fa-w-16 fa-9x"
                >
                    <g class="fa-group">
                        <path
                                fill="currentColor"
                                d="M448 96h-64l-64-64v134.4a96 96 0 0 0 192 0V32zm-72 80a16 16 0 1 1 16-16 16 16 0 0 1-16 16zm80 0a16 16 0 1 1 16-16 16 16 0 0 1-16 16zm-165.41 16a204.07 204.07 0 0 0-34.59 2.89V272l-43.15-64.73a183.93 183.93 0 0 0-44.37 26.17L192 304l-60.94-30.47L128 272v-80a96.1 96.1 0 0 0-96-96 32 32 0 0 0 0 64 32 32 0 0 1 32 32v256a64.06 64.06 0 0 0 64 64h176a16 16 0 0 0 16-16v-16a32 32 0 0 0-32-32h-32l128-96v144a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V289.86a126.78 126.78 0 0 1-32 4.54c-61.81 0-113.52-44.05-125.41-102.4z"
                                class="fa-secondary"
                        ></path>
                        <path
                                fill="currentColor"
                                d="M376 144a16 16 0 1 0 16 16 16 16 0 0 0-16-16zm80 0a16 16 0 1 0 16 16 16 16 0 0 0-16-16zM131.06 273.53L192 304l-23.52-70.56a192.06 192.06 0 0 0-37.42 40.09zM256 272v-77.11a198.62 198.62 0 0 0-43.15 12.38z"
                                class="fa-primary"
                        ></path>
                    </g>
                </svg>
                <span class="link-text">Home</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fad"
                        data-icon="alien-monster"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 576 512"
                        class="svg-inline--fa fa-alien-monster fa-w-18 fa-9x"
                >
                    <g class="fa-group">
                        <path
                                fill="currentColor"
                                d="M560,128H528a15.99954,15.99954,0,0,0-16,16v80H480V176a15.99954,15.99954,0,0,0-16-16H416V96h48a16.00079,16.00079,0,0,0,16-16V48a15.99954,15.99954,0,0,0-16-16H432a15.99954,15.99954,0,0,0-16,16V64H368a15.99954,15.99954,0,0,0-16,16v48H224V80a15.99954,15.99954,0,0,0-16-16H160V48a15.99954,15.99954,0,0,0-16-16H112A15.99954,15.99954,0,0,0,96,48V80a16.00079,16.00079,0,0,0,16,16h48v64H112a15.99954,15.99954,0,0,0-16,16v48H64V144a15.99954,15.99954,0,0,0-16-16H16A15.99954,15.99954,0,0,0,0,144V272a16.00079,16.00079,0,0,0,16,16H64v80a16.00079,16.00079,0,0,0,16,16h48v80a16.00079,16.00079,0,0,0,16,16h96a16.00079,16.00079,0,0,0,16-16V432a15.99954,15.99954,0,0,0-16-16H192V384H384v32H336a15.99954,15.99954,0,0,0-16,16v32a16.00079,16.00079,0,0,0,16,16h96a16.00079,16.00079,0,0,0,16-16V384h48a16.00079,16.00079,0,0,0,16-16V288h48a16.00079,16.00079,0,0,0,16-16V144A15.99954,15.99954,0,0,0,560,128ZM224,320H160V224h64Zm192,0H352V224h64Z"
                                class="fa-secondary"
                        ></path>
                        <path
                                fill="currentColor"
                                d="M160,320h64V224H160Zm192-96v96h64V224Z"
                                class="fa-primary"
                        ></path>
                    </g>
                </svg>
                <span class="link-text">Appointments</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fad"
                        data-icon="space-shuttle"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 512"
                        class="svg-inline--fa fa-space-shuttle fa-w-20 fa-5x"
                >
                    <g class="fa-group">
                        <path
                                fill="currentColor"
                                d="M32 416c0 35.35 21.49 64 48 64h16V352H32zm154.54-232h280.13L376 168C243 140.59 222.45 51.22 128 34.65V160h18.34a45.62 45.62 0 0 1 40.2 24zM32 96v64h64V32H80c-26.51 0-48 28.65-48 64zm114.34 256H128v125.35C222.45 460.78 243 371.41 376 344l90.67-16H186.54a45.62 45.62 0 0 1-40.2 24z"
                                class="fa-secondary"
                        ></path>
                        <path
                                fill="currentColor"
                                d="M592.6 208.24C559.73 192.84 515.78 184 472 184H186.54a45.62 45.62 0 0 0-40.2-24H32c-23.2 0-32 10-32 24v144c0 14 8.82 24 32 24h114.34a45.62 45.62 0 0 0 40.2-24H472c43.78 0 87.73-8.84 120.6-24.24C622.28 289.84 640 272 640 256s-17.72-33.84-47.4-47.76zM488 296a8 8 0 0 1-8-8v-64a8 8 0 0 1 8-8c31.91 0 31.94 80 0 80z"
                                class="fa-primary"
                        ></path>
                    </g>
                </svg>
                <span class="link-text">Reports</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <svg
                        class="theme-icon"
                        id="lightIcon"
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fad"
                        data-icon="moon-stars"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                        class="svg-inline--fa fa-moon-stars fa-w-16 fa-7x"
                >
                    <g class="fa-group">
                        <path
                                fill="currentColor"
                                d="M320 32L304 0l-16 32-32 16 32 16 16 32 16-32 32-16zm138.7 149.3L432 128l-26.7 53.3L352 208l53.3 26.7L432 288l26.7-53.3L512 208z"
                                class="fa-secondary"
                        ></path>
                        <path
                                fill="currentColor"
                                d="M332.2 426.4c8.1-1.6 13.9 8 8.6 14.5a191.18 191.18 0 0 1-149 71.1C85.8 512 0 426 0 320c0-120 108.7-210.6 227-188.8 8.2 1.6 10.1 12.6 2.8 16.7a150.3 150.3 0 0 0-76.1 130.8c0 94 85.4 165.4 178.5 147.7z"
                                class="fa-primary"
                        ></path>
                    </g>
                </svg>
                <span class="link-text">Support Group</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <svg
                        class="theme-icon"
                        id="solarIcon"
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fad"
                        data-icon="sun"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                        class="svg-inline--fa fa-sun fa-w-16 fa-7x"
                >
                    <g class="fa-group">
                        <path
                                fill="currentColor"
                                d="M502.42 240.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.41-94.8a17.31 17.31 0 0 0-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4a17.31 17.31 0 0 0 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.41-33.5 47.3 94.7a17.31 17.31 0 0 0 31 0l47.31-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3a17.33 17.33 0 0 0 .2-31.1zm-155.9 106c-49.91 49.9-131.11 49.9-181 0a128.13 128.13 0 0 1 0-181c49.9-49.9 131.1-49.9 181 0a128.13 128.13 0 0 1 0 181z"
                                class="fa-secondary"
                        ></path>
                        <path
                                fill="currentColor"
                                d="M352 256a96 96 0 1 1-96-96 96.15 96.15 0 0 1 96 96z"
                                class="fa-primary"
                        ></path>
                    </g>
                </svg>
                <span class="link-text">Schedule</span>
            </a>
        </li>
        <li class="last-item">
            <a href="#" class="last-link">
                <span class="profile-pic"></span>
                <div class="user-details">
                    <span class="link-text username">Sanka Gallage</span>
                    <span class="link-text occupation">Befriender</span>
                </div>
            </a>
        </li>
    </ul>
</nav>
<div class="vertical-panel">
    <div class="notifications-container">
        <button class="icon-button notifications">
            <span class="material-icons">notifications</span>
            <span class="notification-count">22</span>
        </button>
        <ul class="notifications-list">
            <li class="single-notification">
            <span class="material-icons">
              error
            </span>
                <span class="notification-text">
              This is a notification!
            </span>
            </li>
            <li class="single-notification">
            <span class="material-icons">
              error
            </span>
                <span class="notification-text">
              This is a notification!
            </span>
            </li>
            <li class="single-notification">
            <span class="material-icons">
              error
            </span>
                <span class="notification-text">
              This is a notification!
            </span>
            </li>
            <li class="single-notification">
            <span class="material-icons">
              error
            </span>
                <span class="notification-text">
              This is a notification!
            </span>
            </li>
        </ul>
    </div>
    <div class="settings-container">
        <button class="icon-button settings">
            <span class="material-icons">settings</span>
        </button>
        <ul class="settings-list">
            <li class="single-setting">
            <span class="material-icons">
              manage_accounts
            </span>
                <span class="setting-text">
              Profile Settings
            </span>
            </li>
            <li class="single-setting">
            <span class="material-icons">
              logout
            </span>
                <span class="setting-text">
              Logout
            </span>
            </li>
            </li>
        </ul>
    </div>
</div>
<main>
    <h1>Manage Support Group</h1>
    {{content}}
</main>
<script src="script.js"></script>
</body>
</html>

