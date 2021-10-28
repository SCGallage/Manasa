<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="http://localhost/assets/css/setting.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
</head>
<body>
<main>
    <div class="grid-container">
        <div class="grid-item-01 styling">
            <h3 class="grid-main-heading">Account Settings</h3>
        </div>
        <div class="grid-item-02 styling">
            <h4 class="grid-item-heading">Profile Picture</h4>
            <div class="grid-item-01-content">
                <img src="./img/profile.png" alt="" srcset="">
                <button class="upload-btn">Upload New Picture</button>
                <button class="delete-btn">Remove Profile Picture</button>
            </div>
        </div>
        <div class="grid-item-03 styling">
            <h4 class="grid-item-heading">Profile Details</h4>
            <div class="second-grid-container">
                <div class="grid-item-05">
                    <div class="flex-item-01 margin-setting-01">
                        <div class="input-field-01">
                            <label for="">Username</label>
                            <input class="input-style" type="text" name="" id="">
                        </div>
                    </div>
                    <div class="flex-item-02 margin-setting-01">
                        <div class="input-field-02">
                            <label for="">First Name</label>
                            <input class="input-style" type="text" name="" id="">
                        </div>
                        <div class="input-field-02">
                            <label for="">Last Name</label>
                            <input class="input-style" type="text" name="" id="">
                        </div>
                    </div>
                    <div class="flex-item-03">
                        <button class="update-btn">Update Profile</button>
                    </div>
                </div>
                <div class="grid-item-06">
                    <div class="flex-item-04">
                        <div class="input-field-01 margin-setting-01">
                            <label for="">Email</label>
                            <input class="input-style" type="text" name="" id="">
                        </div>
                        <div class="input-field-01">
                            <label for="">Date of Birth</label>
                            <input class="input-style" type="date" name="" id="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid-item-04 final-styling">
            <h4 class="grid-item-heading">Update Password</h4>
            <div class="third-grid">
                <div class="third-grid-item-01">
                    <div class="input-field-01 margin-setting-01">
                        <label for="">Password</label>
                        <input class="input-style" type="text" name="" id="">
                    </div>
                    <button class="update-btn">Update Password</button>
                </div>
                <div class="third-grid-item-02">
                    <div class="input-field-01">
                        <label for="">Confirm-Password</label>
                        <input class="input-style" type="text" name="" id="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
