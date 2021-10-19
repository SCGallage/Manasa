<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/navbaronly.css">
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
                <img src="./assets/css//img/icon.png" alt="" class="icon-image">
                <svg
                        id="logo-icon"
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fas"
                        data-icon="bars"
                        class="svg-inline--fa fa-bars fa-w-14"
                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
                    </path>
                </svg>
            </div>
        </li>
        <li class="nav-item">
            <a href="/AdminDash" class="nav-link">
                <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fas"
                        data-icon="home"
                        class="svg-inline--fa fa-home fa-w-18"
                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z">
                    </path></svg>
                <span class="link-text">Home</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="/Volunteer" class="nav-link">
                <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fas"
                        data-icon="hands-helping"
                        class="svg-inline--fa fa-hands-helping fa-w-20"
                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                    <path fill="currentColor" d="M488 192H336v56c0 39.7-32.3 72-72 72s-72-32.3-72-72V126.4l-64.9 39C107.8 176.9 96 197.8 96 220.2v47.3l-80 46.2C.7 322.5-4.6 342.1 4.3 357.4l80 138.6c8.8 15.3 28.4 20.5 43.7 11.7L231.4 448H368c35.3 0 64-28.7 64-64h16c17.7 0 32-14.3 32-32v-64h8c13.3 0 24-10.7 24-24v-48c0-13.3-10.7-24-24-24zm147.7-37.4L555.7 16C546.9.7 527.3-4.5 512 4.3L408.6 64H306.4c-12 0-23.7 3.4-33.9 9.7L239 94.6c-9.4 5.8-15 16.1-15 27.1V248c0 22.1 17.9 40 40 40s40-17.9 40-40v-88h184c30.9 0 56 25.1 56 56v28.5l80-46.2c15.3-8.9 20.5-28.4 11.7-43.7z">
                    </path>
                </svg>

                <span class="link-text">Volunteers</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="/Schedule" class="nav-link">
                <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fas"
                        data-icon="calendar-alt"
                        class="svg-inline--fa fa-calendar-alt fa-w-14"
                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z">
                    </path>
                </svg>
                <span class="link-text">Schedule</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="/SupportGroup" class="nav-link">
                <?xml version="1.0" encoding="iso-8859-1"?>
                <!-- Generator: Adobe Illustrator 16.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="536.071px" height="536.07px" viewBox="0 0 536.071 536.07" style="enable-background:new 0 0 536.071 536.07;"
                     xml:space="preserve">
                  <g>
                      <path fill="currentColor" d="M147.128,91.076c0-37.95,30.766-68.716,68.721-68.716c37.95,0,68.719,30.766,68.719,68.716s-30.769,68.715-68.719,68.715
                      C177.894,159.792,147.128,129.026,147.128,91.076z M248.873,206.607c0.689-14.963,5.84-28.812,14.127-40.261
                      c-5.816-1.218-11.827-1.865-17.995-1.865h-58.304c-6.15,0-12.153,0.642-17.939,1.845c8.819,12.232,14.094,27.171,14.18,43.343
                      c10.72-5.896,23.02-9.253,36.085-9.253C229.625,200.416,239.714,202.624,248.873,206.607z M260.505,212.775
                      c19.96,12.517,33.957,33.688,36.517,58.274c8.133,3.801,17.171,5.994,26.746,5.994c34.968,0,63.311-28.346,63.311-63.313
                      c0-34.971-28.343-63.311-63.311-63.311C289.12,150.42,261.031,178.257,260.505,212.775z M219.026,342.411
                      c34.962,0,63.307-28.354,63.307-63.311c0-34.962-28.345-63.311-63.307-63.311c-34.965,0-63.322,28.348-63.322,63.311
                      C155.705,314.057,184.061,342.411,219.026,342.411z M245.882,346.72h-53.717c-44.697,0-81.069,36.369-81.069,81.072v65.703
                      l0.171,1.029l4.522,1.406c42.658,13.323,79.718,17.779,110.224,17.779c59.571,0,94.114-16.987,96.242-18.074l4.231-2.141h0.449
                      v-65.703C326.936,383.089,290.585,346.72,245.882,346.72z M350.638,281.364h-53.314c-0.579,21.332-9.683,40.542-24.081,54.35
                      c39.732,11.815,68.802,48.657,68.802,92.178v20.245c52.629-1.938,82.963-16.846,84.961-17.851l4.232-2.152h0.449v-65.715
                      C431.693,317.728,395.324,281.364,350.638,281.364z M364.889,149.069c19.961,12.519,33.957,33.691,36.511,58.277
                      c8.134,3.801,17.171,5.99,26.746,5.99c34.975,0,63.316-28.342,63.316-63.304c0-34.972-28.342-63.311-63.316-63.311
                      C393.503,86.717,365.416,114.56,364.889,149.069z M455.01,217.658h-53.303c-0.579,21.332-9.682,40.542-24.08,54.349
                      c39.731,11.811,68.801,48.658,68.801,92.179v20.245c52.624-1.934,82.964-16.84,84.962-17.852l4.226-2.145h0.455v-65.723
                      C536.077,254.024,499.708,217.658,455.01,217.658z M107.937,277.044c12.386,0,23.903-3.618,33.67-9.777
                      c3.106-20.241,13.958-37.932,29.454-49.975c0.065-1.188,0.174-2.361,0.174-3.561c0-34.971-28.351-63.311-63.298-63.311
                      c-34.977,0-63.316,28.339-63.316,63.311C44.621,248.704,72.959,277.044,107.937,277.044z M164.795,335.714
                      c-14.331-13.742-23.404-32.847-24.072-54.055c-1.971-0.147-3.928-0.295-5.943-0.295H81.069C36.366,281.364,0,317.728,0,362.425
                      v65.709l0.166,1.023l4.528,1.412c34.214,10.699,64.761,15.616,91.292,17.153v-19.837
                      C95.991,384.371,125.054,347.523,164.795,335.714z"/>
                  </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                  </svg>
                <span class="link-text">Support Group</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="/SessionReport" class="nav-link">
                <svg aria-hidden="true"
                     focusable="false"
                     data-prefix="fas"
                     data-icon="file-alt"
                     class="svg-inline--fa fa-file-alt fa-w-12"
                     role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path fill="currentColor" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm64 236c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12v8zm0-64c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12v8zm0-72v8c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm96-114.1v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z">
                    </path></svg>
                <span class="link-text">Reports</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="/SearchUsers" class="nav-link">
                <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fas"
                        data-icon="user-cog"
                        class="svg-inline--fa fa-user-cog fa-w-20"
                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M610.5 373.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3.7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3.4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 400.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm201.2 226.5c-2.3-1.2-4.6-2.6-6.8-3.9l-7.9 4.6c-6 3.4-12.8 5.3-19.6 5.3-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-5.5-17.7 1.9-36.4 17.9-45.7l7.9-4.6c-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-16-9.2-23.4-28-17.9-45.7.9-2.9 2.2-5.8 3.2-8.7-3.8-.3-7.5-1.2-11.4-1.2h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c10.1 0 19.5-3.2 27.2-8.5-1.2-3.8-2-7.7-2-11.8v-9.2z">
                    </path></svg>
                <span class="link-text">Users</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fas"
                        data-icon="cog"
                        class="svg-inline--fa fa-cog fa-w-16"
                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z">
                    </path>
                </svg>

                <span class="link-text">Settings</span>
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
<main>
    {{content}}
</main>
</body>
</html>
