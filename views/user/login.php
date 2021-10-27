<link rel="stylesheet" href="./assets/css/user/login_styles.css">
<link rel="stylesheet" href="./assets/css/user/popup_error_styles.css">
<?php if (isset($_SESSION['failed'])) {
    require("user_popup_error.php");
    unset($_SESSION['failed']);
} ?>
<main>
    <div class="container">
        <div class="card">
            <div class="card-left">
                <div class="card-content">
                    <div class="card-title">
                        Welcome Back!
                    </div>
                    <div class="card-body">
                        <form action="/login" method="post">
                        <div class="input-field" id="email-field">
                            <label class="input-label" for="email">Email</label><br>
                            <input type="email" class="text-field" name="email" id="email"><br>
                            <h5>*Required</h5>
                        </div>
                        <div class="input-field">
                            <label class="input-label" for="password">Password</label><br>
                            <input type="password" class="text-field" name="password" id="password"><br>
                            <h5>*Required</h5>
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 20.9932C16.299 20.9932 21 16.2953 21 10.5001C21 4.70495 16.299 0.00702286 10.5 0.00702286C4.70101 0.00702286 0 4.70495 0 10.5001C0 16.2953 4.70101 20.9932 10.5 20.9932Z" fill="#088C15"/>
                                <path d="M9.65803 16.0814L4.6935 12.2138L6.10509 10.4022L9.1537 12.7772L14.1852 5.51677L16.0732 6.82468L9.65803 16.0814Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="input-check">
                            <input type="checkbox" name="Remember Me" id="">
                            <span class="remember-me-text">Remember Me</span>
                            <a href="/resetpassword" class="reset-link">Forgot Password?</a><br>
                        </div>
                        <button type="submit" class="btn login">Login</button>
                        </form>
                        <div class="card-text">
                            or
                        </div>
                        <div class="gsign-up">
                            <a class="btn google-signup" href="<?=$auth_url ?>">Sign Up with Google</a>
                            <img src="./assets/img/user/google.png" alt="">
                        </div>
                        <div class="card-text">
                            Don't have an account?
                        </div>
                        <button class="btn create-account">Create Account</button>
                    </div>
                </div>
            </div>
            <div class="card-right">
                <!-- <img src="./img/login.jpg" height="650px" alt=""> -->
            </div>
        </div>
    </div>
    <script src="./assets/js/user/error_modal.js"></script>
</main>