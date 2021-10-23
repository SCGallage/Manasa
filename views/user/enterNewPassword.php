<link rel="stylesheet" href="./assets/css/user/enter_password_reset.css">
<main>
    <div class="container">
        <div class="container-icon">
            <img src="./assets/img/icon.png" alt="">
        </div>
        <div class="container-header">
            <p class="title">RESET YOUR PASSWORD</p>
            <p class="info">Please fill both fields in the form below.</p>
        </div>
        <div class="container-body">
            <form action="/updatepassword" method="post">
                <div class="input-field">
                    <label class="email-label" for="">New Password</label>
                    <input class="email-input" type="password" name="password" id="password">
                    <span class="required-text">*Required</span>
                </div>
                <div class="input-field">
                    <label class="email-label" for="">Confirm Password</label>
                    <input class="email-input" type="password" name="conpassword" id="conpassword">
                    <span class="required-text">*Required</span>
                </div>
                <button type="submit" class="send-mail-btn" >RESET PASSWORD</button>
            </form>
        </div>
    </div>
</main>
<script src="./assets/js/user/validate_fields.js"></script>