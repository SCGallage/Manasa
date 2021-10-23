<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/assets/css/navbaronly.css">
    <title>{{title}}</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<nav class="navbar">
    <ul class="navbar-nav">
        <li class="logo">
            <div class="icon-header">
                <img src="./assets/img/Group 2.png" alt="" class="icon-image">
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
            <a href="/dashboard" class="nav-link">
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
            <a href="/appointments" class="nav-link">
                <svg width="61" height="57" viewBox="0 0 61 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M40.7175 7.90399V3.57199H38.43V7.90399H31.9487V3.57199H29.6612V7.90399H22.7225V3.57199H20.435V7.90399H4.11749V53.428H56.8062V7.90399H40.7175ZM20.435 10.184V14.44H22.7225V10.108H29.7375V14.44H32.025V10.108H38.5062V14.44H40.7937V10.108H54.595V43.7H6.40499V10.184H20.435ZM6.40499 51.148V46.056H54.5187V51.148H6.40499Z" fill="#F0F0F0"/>
                    <path d="M21.5787 22.8H17.2325V27.132H21.5787V22.8Z" fill="#F0F0F0"/>
                    <path d="M32.635 22.8H28.2887V27.132H32.635V22.8Z" fill="#F0F0F0"/>
                    <path d="M43.7675 22.8H39.4212V27.132H43.7675V22.8Z" fill="#F0F0F0"/>
                    <path d="M21.5787 33.896H17.2325V38.228H21.5787V33.896Z" fill="#F0F0F0"/>
                    <path d="M32.635 33.896H28.2887V38.228H32.635V33.896Z" fill="#F0F0F0"/>
                    <path d="M43.7675 33.896H39.4212V38.228H43.7675V33.896Z" fill="#F0F0F0"/>
                </svg>
                <span class="link-text">Appointments</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="/reports" class="nav-link">
                <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_262:653)">
                        <path d="M32.9223 6.39022L26.7556 0.223555C26.6836 0.152113 26.5982 0.0955911 26.5043 0.0572309C26.4103 0.0188707 26.3098 -0.000573638 26.2083 1.28839e-05H6.16666C5.55334 1.28839e-05 4.96515 0.243651 4.53147 0.677328C4.09779 1.11101 3.85416 1.6992 3.85416 2.31251V34.6875C3.85416 35.3008 4.09779 35.889 4.53147 36.3227C4.96515 36.7564 5.55334 37 6.16666 37H30.8333C31.4466 37 32.0348 36.7564 32.4685 36.3227C32.9022 35.889 33.1458 35.3008 33.1458 34.6875V6.93751C33.1464 6.83607 33.127 6.7355 33.0886 6.64159C33.0502 6.54767 32.9937 6.46225 32.9223 6.39022ZM26.9792 2.62855L30.5173 6.16668H27.75C27.5456 6.16668 27.3495 6.08547 27.2049 5.94091C27.0604 5.79635 26.9792 5.60028 26.9792 5.39585V2.62855ZM31.6042 34.6875C31.6042 34.8919 31.5229 35.088 31.3784 35.2326C31.2338 35.3771 31.0378 35.4583 30.8333 35.4583H6.16666C5.96222 35.4583 5.76615 35.3771 5.6216 35.2326C5.47704 35.088 5.39582 34.8919 5.39582 34.6875V2.31251C5.39582 2.10808 5.47704 1.91201 5.6216 1.76745C5.76615 1.62289 5.96222 1.54168 6.16666 1.54168H25.4375V5.39585C25.4375 6.00916 25.6811 6.59735 26.1148 7.03103C26.5485 7.46471 27.1367 7.70835 27.75 7.70835H31.6042V34.6875Z" fill="#F0F0F0"/>
                        <path d="M27.75 13.875H12.3333V15.4167H27.75V13.875Z" fill="#F0F0F0"/>
                        <path d="M27.75 18.5H9.25V20.0417H27.75V18.5Z" fill="#F0F0F0"/>
                        <path d="M27.75 23.125H9.25V24.6667H27.75V23.125Z" fill="#F0F0F0"/>
                        <path d="M21.5833 27.75H9.25V29.2917H21.5833V27.75Z" fill="#F0F0F0"/>
                        <path d="M27.75 27.75H26.2083V29.2917H27.75V27.75Z" fill="#F0F0F0"/>
                        <path d="M24.6667 27.75H23.125V29.2917H24.6667V27.75Z" fill="#F0F0F0"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_262:653">
                            <rect width="37" height="37" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
                <span class="link-text">Reports</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="/supportgroup" class="nav-link">
                <svg width="74" height="74" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M56.6793 25.0598V23.0697C59.1853 21.5956 60.8068 18.8685 60.8068 15.9203V12.3825C60.8068 7.81276 57.1215 4.1275 52.5518 4.1275C47.9821 4.1275 44.2231 7.81276 44.2231 12.3825V15.9203C44.2231 18.7948 45.6972 21.4482 48.2032 22.9223V25.0598C47.0976 25.3546 46.0657 25.7968 45.0339 26.3865C43.4124 22.6275 39.6534 19.9741 35.3048 19.9741C31.0299 19.9741 27.4183 22.4801 25.7231 26.1654C24.765 25.7231 23.8068 25.2809 22.8486 25.0598V23.0697C25.3546 21.5956 26.9761 18.8685 26.9761 15.9203V12.3825C26.9761 7.81276 23.2908 4.1275 18.7211 4.1275C14.1514 4.1275 10.4661 7.81276 10.4661 12.3825V15.9203C10.4661 18.7948 11.9402 21.4482 14.4462 22.9223V25.0598C7.81276 26.9761 3.31674 32.9462 3.31674 39.8745C3.31674 40.4642 3.83268 40.9801 4.42232 40.9801H26.2391C26.3128 40.9801 26.3865 40.9801 26.4602 40.9801C27.3446 42.3805 28.5976 43.5598 30.0717 44.4442V47.761C21.3008 50.1195 15.3307 58.006 15.3307 67.1454C15.3307 67.7351 15.8466 68.251 16.4363 68.251H54.3944C54.9841 68.251 55.5 67.7351 55.5 67.1454C55.5 58.0797 49.2351 50.0458 40.5379 47.761V44.5916C42.0857 43.7072 43.3387 42.5279 44.2968 41.0538H66.9243C67.514 41.0538 68.0299 40.5379 68.0299 39.9482C67.9562 33.0199 63.2391 26.9024 56.6793 25.0598ZM5.5279 38.8426C5.97013 33.0936 10.0976 28.3765 15.7729 27.0498C16.2889 26.9024 16.6574 26.4602 16.6574 25.9442V22.259C16.6574 21.8167 16.4363 21.4482 16.0677 21.3008C14.004 20.2689 12.6773 18.2052 12.6773 15.9203V12.3825C12.6773 9.06575 15.4044 6.33866 18.7211 6.33866C22.0379 6.33866 24.7649 9.06575 24.7649 12.3825V15.9203C24.7649 18.2052 23.3646 20.3426 21.3008 21.3745C20.9323 21.5219 20.6375 21.9642 20.6375 22.4064V25.9442C20.6375 26.4602 21.006 26.9024 21.5219 27.0498C22.7749 27.3446 23.9542 27.7869 25.0598 28.3765C24.9124 29.1136 24.8387 29.8506 24.8387 30.6614V35.3785C24.8387 36.5578 25.0598 37.7371 25.4283 38.8426H5.5279ZM38.9163 42.8964C38.5478 43.0438 38.253 43.4861 38.253 43.9283V48.6454C38.253 49.1614 38.6215 49.6036 39.1375 49.751C46.9502 51.4462 52.6992 58.2271 53.2151 66.1136H17.5418C17.9841 58.2271 23.5857 51.5936 31.3984 49.8247C31.9144 49.6773 32.2829 49.2351 32.2829 48.7191V43.8546C32.2829 43.4124 32.0618 43.0438 31.6932 42.8964C28.8187 41.496 27.0498 38.6215 27.0498 35.4522V30.7351C27.0498 26.0916 30.8088 22.4064 35.3785 22.4064C39.9482 22.4064 43.7072 26.1654 43.7072 30.7351V35.3785C43.7072 38.5478 41.8645 41.496 38.9163 42.8964ZM45.3287 38.8426C45.6972 37.7371 45.9183 36.5578 45.9183 35.3785V30.6614C45.9183 29.998 45.8446 29.261 45.6972 28.6713C46.8765 27.9343 48.2032 27.4183 49.5299 27.1235C50.0458 26.9761 50.4144 26.5339 50.4144 26.0179V22.3327C50.4144 21.8904 50.1932 21.5219 49.8247 21.3745C47.761 20.3426 46.4343 18.2789 46.4343 15.994V12.4562C46.4343 9.13945 49.1614 6.41236 52.4781 6.41236C55.7948 6.41236 58.5219 9.13945 58.5219 12.4562V15.994C58.5219 18.2789 57.1215 20.4163 55.0578 21.4482C54.6892 21.5956 54.3944 22.0379 54.3944 22.4801V26.0179C54.3944 26.5339 54.763 26.9761 55.2789 27.1235C60.9542 28.3765 65.1554 33.241 65.6713 38.9163L45.3287 38.8426Z" fill="#F0F0F0"/>
                </svg>
                <span class="link-text">Support Group</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.3 0V6.3H8.4V0H6.3ZM33.6 0V6.3H35.7V0H33.6ZM0 2.1V42H42V2.1H37.8V4.2H39.9V10.5H2.1V4.2H4.2V2.1H0ZM10.5 2.1V4.2H31.5V2.1H10.5ZM2.1 12.6H39.9V39.9H2.1V12.6ZM28.3664 20.9918C28.0939 20.9994 27.835 21.1126 27.6445 21.3076L17.8869 31.0652L14.4293 27.6076C13.4397 26.5769 11.9138 28.1027 12.9445 29.0924L17.1445 33.2924C17.5546 33.7023 18.2192 33.7023 18.6293 33.2924L29.1293 22.7924C29.8124 22.1246 29.3213 20.9656 28.3664 20.9918Z" fill="#F0F0F0"/>
                </svg>
                <span class="link-text">Schedule</span>
            </a>
        </li>
        <li class="last-item">
            <a href="#" class="last-link">
                <span class="profile-pic"></span>
                <div class="user-details">
                    <span class="username"><?php echo $_SESSION['user_name']; ?></span>
                    <span class="occupation"><?php echo $_SESSION['user_data']; ?></span>
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
{{content}}
</body>
</html>

