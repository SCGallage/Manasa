<link rel="stylesheet" href="./assets/css/user/reset_password.css">
<main>
    <div class="container">
        <div class="container-icon">
            <img src="./assets/img/icon.png" alt="">
        </div>
        <div class="container-header">
            <p class="title">FORGOT YOUR PASSWORD?</p>
            <p class="info">Please fill in the email that you used to register. You will be sent an email with instructions on how to reset your password.</p>
        </div>
        <div class="container-body">
            <form action="/resetpassword" method="post">
                <div class="input-field">
                    <label class="email-label" for="">Email Address</label>
                    <input class="email-input" type="text" name="email" id="email">
                    <span class="required-text">*Required</span>
                </div>
                <button type="submit" class="send-mail-btn" >SEND EMAIL</button>
            </form>
        </div>
        <div class="container-footer">
                <span class="footer-text">
                    Remember Your Password?
                    <a href="/login" class="signin-link">Sign In</a>
                </span>
        </div>
    </div>
</main>