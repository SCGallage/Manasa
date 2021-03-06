<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="http://localhost/assets/img/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="<?php echo $_ENV['BASE_URL']?>/assets/css/navbaronly.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <title>{{title}}</title>

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
                <img src="http://localhost/assets/img/icon1.png" alt="" class="icon-image">
                <svg viewBox="0 0 28 28" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" d="M7 16h18M7 25h18M7 7h18" class="stroke-000000">
                    </path></svg>
            </div>
        </li>

        <li class="nav-item">
            <a href="/mod/ModDash" class="nav-link">
                <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_263:670)">
                        <path d="M44.9996 44.0191H3.42151L18.2079 29.2127L24.6908 35.6955C24.7879 35.7913 24.9037 35.8662 25.0309 35.9156C25.2745 36.0157 25.5477 36.0157 25.7912 35.9156C25.9184 35.8662 26.0342 35.7913 26.1314 35.6955L43.579 18.2079V24.6707C43.579 24.9361 43.6844 25.1905 43.872 25.3781C44.0596 25.5658 44.3141 25.6712 44.5794 25.6712C44.8447 25.6712 45.0992 25.5658 45.2868 25.3781C45.4744 25.1905 45.5798 24.9361 45.5798 24.6707V15.7869C45.5798 15.5215 45.4744 15.2671 45.2868 15.0794C45.0992 14.8918 44.8447 14.7864 44.5794 14.7864H35.7155C35.4502 14.7864 35.1958 14.8918 35.0081 15.0794C34.8205 15.2671 34.7151 15.5215 34.7151 15.7869C34.7151 16.0522 34.8205 16.3067 35.0081 16.4943C35.1958 16.6819 35.4502 16.7873 35.7155 16.7873H42.1784L25.3911 33.5746L18.9082 27.0918C18.8152 26.998 18.7046 26.9236 18.5827 26.8728C18.4608 26.822 18.33 26.7959 18.1979 26.7959C18.0659 26.7959 17.9351 26.822 17.8132 26.8728C17.6913 26.9236 17.5806 26.998 17.4876 27.0918L2.00089 42.5985V1.00043C2.00089 0.735103 1.89549 0.480639 1.70787 0.293021C1.52025 0.105403 1.26578 0 1.00045 0C0.735121 0 0.480657 0.105403 0.293039 0.293021C0.105421 0.480639 1.80748e-05 0.735103 1.80748e-05 1.00043V45.0196C-0.00155008 45.2806 0.0989759 45.5319 0.28014 45.7199V45.7199C0.373759 45.8055 0.482258 45.8734 0.600279 45.92C0.725469 45.9802 0.861642 46.0143 1.00045 46.02H45.0196C45.2849 46.02 45.5394 45.9146 45.727 45.727C45.9146 45.5394 46.02 45.2849 46.02 45.0196C46.02 44.7542 45.9146 44.4998 45.727 44.3122C45.5394 44.1245 45.2849 44.0191 45.0196 44.0191H44.9996Z" fill="#F0F0F0"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_263:670">
                            <rect width="46" height="46" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
                <span class="link-text">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="/mod/Volunteer" class="nav-link">
                <svg data-name="Layer 1" viewBox="0 0 450 450" xmlns="http://www.w3.org/2000/svg">
                    <path d="M502.13 189a6 6 0 0 0-8.23-2.05l-47.5 28.53a6 6 0 0 0-2.65 3.45l-10.12 34.6c-.36-.16-.72-.33-1.09-.48l-140.81-73.73a6 6 0 0 0-6.64.74c-.33.28-32.68 27.71-60.32 49.52-17.58 13.86-34.11 7.7-41.88 3.23l47.46-65.21a74.38 74.38 0 0 1 66.32-30.21l73 7.88a6 6 0 0 0 4.48-1.35l43.65-36.4a6 6 0 0 0-7.67-9.2l-41.7 34.76-70.62-7.61a86.4 86.4 0 0 0-49.32 10.58l-96.65 1.1-41.82-35.94a6 6 0 0 0-7.81 9.09l43.53 37.41a6 6 0 0 0 3.91 1.45h.07l81.88-.94a85.47 85.47 0 0 0-11 12.33l-51.08 70.21a6 6 0 0 0 1 8.09c10.28 8.74 36.41 20 61.64.14C255 221 281 199.21 289.76 191.8l137.79 72.08a23.88 23.88 0 0 1 5.77 3.32l.14.11a24.77 24.77 0 0 1 9.19 16c1.12 8-1.72 15.28-7.82 20a22.82 22.82 0 0 1-9.33 4.26c-21.34 4.4-73.89-17.24-92.36-26a6 6 0 1 0-5.14 10.86c2.26 1.07 45 21.11 77.39 26.38-.54 2.94-3.66 17.46-13.67 24.34-5.26 3.64-11.63 4.57-19.43 2.83-33.88-7.52-69.53-20.2-69.89-20.32a6 6 0 0 0-4 11.27c.35.13 33 11.75 65.94 19.52-1.84 8.24-8.54 23.43-32.91 22.77-36-1.2-56.18-15.39-56.38-15.53a6 6 0 0 0-7 9.69c.7.52 13.75 9.78 37.51 14.77-11.21 9.3-32.53 22.08-55.67 10.33-9.57-4.87-15.33-7.82-18.78-9.62a1 1 0 0 1-.11-.1A124 124 0 0 0 249.69 374a5.85 5.85 0 0 0 1.27-1.87c.21-.51 5.21-12.49-.7-24.24-3.95-7.87-11.62-13.49-22.74-16.8-2.62-8-10.7-27.06-29.05-30.6a33.63 33.63 0 0 0-6.73-16.58c-6.88-9-18.13-14.85-33.42-17.54-1.5-14-20-27.13-31-32.8-19.11-9.81-63.07 8.38-81.77 17L19.33 223.2a6 6 0 1 0-8.65 8.28L35 256.93c-7.63 6.56-12.3 16.2-8 26.46C30.19 291 42.18 304.87 55.52 310A37.93 37.93 0 0 0 66 312.22c3.51 12.29 13.35 30.63 31.59 35.71 3.41 11.84 14.63 28.81 39.4 30.7 3.31 11.73 14.64 27.55 41.57 27.55h1.95c14.4-.4 27.69-5 38.71-10.58.46.34 1 .69 1.59 1.07l-.06.14 1 .45c4.18 2.52 11.24 6.11 22.69 11.93a53 53 0 0 0 24.29 5.91c22.22 0 41.75-13.79 52-24.61 3.32.34 6.73.61 10.34.73h2.26c28.53 0 39.85-18.59 42.86-32.58 1.12.09 2.24.16 3.33.16a32.89 32.89 0 0 0 19.08-5.8c15.24-10.53 18.56-31.57 18.76-32.94.64 0 1.29.05 1.91.05a42.51 42.51 0 0 0 8.68-.8 34.59 34.59 0 0 0 14.21-6.5 33 33 0 0 0 12.35-31.13 37.11 37.11 0 0 0-10.48-21l10.55-36.1 45.5-27.32a6 6 0 0 0 2.05-8.26ZM38 278.76c-2.86-6.86 4.32-13.1 8.68-15.53 23.44-11.23 51-20.57 66.5-20.57a19.38 19.38 0 0 1 8.6 1.57c14.62 7.5 24.56 18.38 24.67 23.84 0 .66 0 2-2.81 3.63l-3.32 1.9c-16 9.17-58.57 33.52-80.58 25.16-9.82-3.76-19.64-15.08-21.74-20Zm40.39 33c24.95-3.25 53.6-19.62 67.88-27.8l3.26-1.86a19.49 19.49 0 0 0 5.25-4.24c27.72 4.36 31.56 18.69 31.91 24.7-17.13 11.08-58.07 34.72-79.12 34.72-17.74.03-26.01-16.66-29.14-25.49Zm32.45 37.36c28.2-2.19 73.83-31 83.35-37.15 12.7 1.24 19.13 15 21.52 21.72-10.83 8-46.66 32.95-73.89 33.11h-.31c-18.81.03-27.11-10.29-30.63-17.65Zm69.26 45c-20.38.72-27.91-9.09-30.69-15.89 30.54-3.91 65.12-28.64 74.54-35.76 7.84 2.3 13.08 5.87 15.52 10.65 2.7 5.27 1.45 11 .77 13.26-5.1 4.8-30.58 26.98-60.1 27.79Z" fill="#ffffff" class="fill-000000">
                    </path></svg>
                <span class="link-text">Volunteer Events</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="/mod/Schedule" class="nav-link">
                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.3 0V6.3H8.4V0H6.3ZM33.6 0V6.3H35.7V0H33.6ZM0 2.1V42H42V2.1H37.8V4.2H39.9V10.5H2.1V4.2H4.2V2.1H0ZM10.5 2.1V4.2H31.5V2.1H10.5ZM2.1 12.6H39.9V39.9H2.1V12.6ZM28.3664 20.9918C28.0939 20.9994 27.835 21.1126 27.6445 21.3076L17.8869 31.0652L14.4293 27.6076C13.4397 26.5769 11.9138 28.1027 12.9445 29.0924L17.1445 33.2924C17.5546 33.7023 18.2192 33.7023 18.6293 33.2924L29.1293 22.7924C29.8124 22.1246 29.3213 20.9656 28.3664 20.9918Z" fill="#F0F0F0"/>
                </svg>
                <span class="link-text">Schedule</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="/mod/ModUsers" class="nav-link">
                <svg viewBox="0 0 48 48" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" d="M43 42H5a4 4 0 0 1-4-4V17a4 4 0 0 1 4-4h15V9a4 4 0 0 1 8 0v4h15a4 4 0 0 1 4 4v21a4 4 0 0 1-4 4zm-25.986-7.512v.004c-.004 0-.018-.781-.018-.781s1.166-.601 2.031-1.378c.507-.417.741-1.362.741-1.362.137-.828.238-2.877.238-3.703 0-2.062-1.033-4.28-4.007-4.28v-.008.007c-2.974 0-4.007 2.219-4.007 4.28 0 .826.102 2.875.238 3.703 0 0 .234.945.741 1.362.865.777 2.031 1.378 2.031 1.378s-.014.781-.018.781v-.004s.029 1.146.029 1.487c0 1.362-1.365 2.018-2.223 2.018h-.003c-2.593.113-3.205.976-3.21.984-.158.254-.378.506-.579 1.024h14.004c-.201-.518-.421-.77-.582-1.022-.005-.009-.617-.871-3.21-.984h-.003c-.857 0-2.223-.655-2.223-2.018 0-.342.03-1.488.03-1.488zM26 9a2 2 0 0 0-4 0v6a2 2 0 0 0 4 0V9zm19 8a2 2 0 0 0-2-2H28a4 4 0 0 1-8 0H5a2 2 0 0 0-2 2v21a2 2 0 0 0 2 2h1.797c.231-.589.656-1.549 1.16-2.24.025-.014.848-1.739 4.998-1.79.006-.021.01-1.042.022-1.027a7.286 7.286 0 0 1-1.051-.816c-.255-.156-1.161-1.029-1.452-2.583-.087-.542-.488-3.099-.488-4.166 0-3.171 1.265-6.381 5.953-6.381h.121c4.688 0 5.953 3.21 5.953 6.381 0 1.067-.401 3.624-.488 4.166-.291 1.554-1.197 2.427-1.452 2.583a7.11 7.11 0 0 1-1.051.816c.013-.015.017 1.007.022 1.027 4.151.051 4.974 1.776 4.998 1.79.504.691.929 1.651 1.16 2.24H43a2 2 0 0 0 2-2V17zm-5 9H28a1 1 0 1 1 0-2h12a1 1 0 1 1 0 2zm-12 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2zm0 4h6a1 1 0 1 1 0 2h-6a1 1 0 1 1 0-2zm4-3a1 1 0 0 1 1-1h4a1 1 0 1 1 0 2h-4a1 1 0 0 1-1-1zM23 9h2v2h-2V9z" fill-rule="evenodd" fill="#ffffff" class="fill-000000"></path>
                </svg>
                <span class="link-text">Users</span>
            </a>
        </li>

        <li class="last-item">
            <a href="#" class="last-link">
                <img src="http://localhost/assets/img/user/<?php echo $_SESSION['profile_pic'] ?>" class="profile-pic">
                <div class="user-details">
                    <span class="username"><?php echo $_SESSION['user_name'] ?></span>
                    <span class="occupation"><?php echo $_SESSION['user_data'] ?></span>
                </div>
            </a>
        </li>
    </ul>
</nav>
<div class="vertical-panel">
    <div class="notifications-container">
        <button class="icon-button notifications">
            <span class="material-icons">notifications</span>
            <span class="notification-count">2</span>
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
            <li class="single-setting"><a class="top-nav-link" href="#">
            <span class="material-icons">
              manage_accounts
            </span>
                    <span class="setting-text">
              Profile Settings
            </span>
                </a>
            </li>
            <li class="single-setting">
                <a class="top-nav-link" href="/logout">
            <span class="material-icons">
              logout
            </span>
                    <span class="setting-text">
              Logout
            </span>
                </a>
            </li>
        </ul>
    </div>
</div>
<main>
    {{content}}
</main>
<script src="<?php echo $_ENV['BASE_URL']?>/assets/js/vertical_nav.js"></script>
</body>
</html>
