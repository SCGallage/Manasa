 <main>
    <link rel="stylesheet" href="./assets/css/user/register_style.css">
    <div class="container">
        <div class="card">
            <div class="card-left">
                <div class="card-content">
                    <div class="card-title">
                        <span class="main-heading">Join With Us!</span>
                        <span class="anonymous-text"></span>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="registerForm" enctype="multipart/form-data">
                            <div class="select-type">
                                User Type:
                                <select name="usertype" id="usertype" class="select-input">
                                    <option value="Normal" selected>Caller</option>
                                    <option value="Anonymous">Anonymous Caller</option>
                                    <option value="Befriender">Befriender</option>
                                    <option value="Volunteer">Volunteer</option>
                                </select>
                            </div>
                            <div class="grid-container">
                                <div class="input-field" id="anon-field">
                                    <label for="username">Username</label><br>
                                    <input type="text" class="text-field" name="username" id="username" required><br>
                                    
                                    <h5 class="validation-msg" id="user-text">*Required</h5>
                                </div>
                                <div class="input-field" id="anon-field">
                                    <label for="email">Email</label><br>
                                    <input type="text" class="text-field" name="email" id="email" required><br>
                                    <h5 class="validation-msg" id="email-text">*Required</h5>
                                    
                                </div>
                                <div class="input-field">
                                    <label for="fname">First Name</label><br>
                                    <input type="text" class="text-field" name="fname" id="fname" required><br>
                                    
                                    <h5 class="validation-msg" id="fname-text">*Required</h5>
                                </div>
                                <div class="input-field">
                                    <label for="password">Last Name</label><br>
                                    <input type="text" class="text-field" name="lname" id="lname" required><br>
                                    <h5 class="validation-msg" id="lname-text">*Required</h5>
                    
                                </div>
                                <div class="input-field" id="anon-field">
                                    <label for="email">Password</label><br>
                                    <input type="password" class="text-field" name="password" id="password" required><br>
                                    <h5 class="validation-msg" id="password-text" >*Required</h5>
                                </div>
                                <div class="input-field" id="anon-field">
                                    <label for="password">Confirm-Password</label><br>
                                    <input type="password" class="text-field" name="conpassword" id="conpassword" required><br>
                                    <h5 class="validation-msg" id="conpassword-text">*Required</h5>
                                    
                                </div>
                                <div class="input-field">
                                    <label for="email">Date of Birth</label><br>
                                    <input type="date" class="text-field" name="dateOfBirth" id="dateOfBirth"><br>
                                    <h5 class="validation-msg" id="dob-text">*Required</h5>
                                </div>
                                <div class="input-field" id="anon-field">
                                    <label for="gender">Gender</label><br>
                                    <select name="gender" id="gender" class="select-input additional" required>
                                        <option value="-------" selected disabled>--------</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                        <option value="N">Rather Not Say</option>
                                    </select>
                                    <h5 class="validation-msg">*Required</h5>
                                </div>
                            </div>
                            <div id="upload-div" class="file-upload disable">
                                <h4>Attach Your CV (*.pdf, max: 15MB)</h4>
                                <input type="file" name="cv" id="cv" accept=".pdf" hidden>
                                <button type="button" class="btn fake-btn" name="uploadBtn" id="uploadBtn">Choose File</button>
                                <span class="file-name" id="fileName">
                            No File Chosen, yet.
                        </span>
                                <button type="button" class="btn remove-btn disable" id="removeFile">Remove</button>
                            </div>
                            <div class="input-check">
                                <input type="checkbox" name="Remember Me" id="terms-box" required>
                                <span class="checkbox-text">I accept the <a href="#">terms and conditions</a> and read the <a href="#">privacy policy</a>.</span>
                            </div>
                            <div class="grid-container">
                                <div class="gsign-up">
                                    <a href="<?=$auth_url ?>" class="btn google-signup">Sign Up with Google</a>
                                    <img src="./assets/img/user/google.png" alt="">
                                </div>
                                <button type="submit" class="btn login">Register</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="card-right"></div>
        </div>
    </div>
</main>
 <script src="./assets/js/user/validate_fields.js"></script>
<script>
    const fileUploader = document.getElementById('cv');
    const uploadBtn = document.getElementById('uploadBtn');
    const fileName = document.getElementById('fileName');
    const fileRemoveBtn = document.getElementById('removeFile');
    const userType = document.getElementById('usertype');
    const uploadDiv = document.getElementById('upload-div');
    const inputFields = document.querySelectorAll('.input-field');
    const textFields = document.querySelectorAll('.text-field');

    var anonymousFlag = false;

    uploadBtn.addEventListener('click', (e) => {
        fileUploader.click();
    });

    fileUploader.addEventListener('change', (e) => {
        console.log(fileUploader.files[0]);
        fileName.innerHTML = fileUploader.files[0]["name"]+" "+(fileUploader.files[0]["size"]/1024);
        if ((fileUploader.files[0]["size"]/1048576) > 0.1){
            console.log("exceeded");
            fileName.style.color = "rgba(173, 5, 5)";
            fileName.innerHTML = fileUploader.files[0]["name"]+" "+"(Size Exceeded)";
        }
        fileRemoveBtn.classList.remove("display-btn");
        console.log(fileRemoveBtn.classList);
    });

    const changeOrientation = () => {
                document.querySelector('.card').style.gridTemplateColumns = "60% 40%";
                document.querySelector('.card-right').style.display = "block";
                document.querySelector('.container').style.width = "1200px";
                document.querySelector('.gsign-up').style.display = "block";
                document.querySelector('.main-heading').style.textAlign = "";
                for (let i = 0; i < inputFields.length; i++) {
                    if (inputFields[i].id !== 'anon-field' && inputFields[i].id !== 'conpassword' && inputFields[i].id !== 'username' && inputFields[i].id !== 'email'){
                        inputFields[i].classList.remove('disable');
                        textFields[i].disabled = false;
                        fnameState = false;
                        lnameState = false;
                    }
                }
                document.querySelectorAll('.grid-container').forEach(item => {
                    item.style.gridTemplateColumns = "45% 45%"
                });
                document.querySelector('.anonymous-text').innerHTML = "";
                anonymousFlag = false;
    };

    console.log(userType.value);

    userType.addEventListener('change', () => {

        if (userType.value === 'Anonymous') {
            anonymousFlag = true;
            document.querySelectorAll('.grid-container').forEach(item => {
                item.style.gridTemplateColumns = "100%"
            });
            document.querySelector('.card').style.gridTemplateColumns = "100%";
            document.querySelector('.card-right').style.display = "none";
            document.querySelector('.container').style.width = "500px";
            document.querySelector('.gsign-up').style.display = "none";
            document.querySelector('.main-heading').style.textAlign = "center";
            console.log(inputFields.length);
            for (let i = 0; i < inputFields.length; i++) {
                if (inputFields[i].id !== 'anon-field'){
                    inputFields[i].classList.add('disable');
                    textFields[i].disabled = true;
                    fnameState = true;
                    lnameState = true;
                    //console.log(textFields[i].disabled);
                }
                //console.log(inputFields[i]);
            }
            if (!uploadDiv.classList.contains('disable')){
                uploadDiv.classList.add('disable');
            }

            document.querySelector('.anonymous-text').innerHTML = "We understand your need to be anonymous. However we just need a nickname to identify you.";
        }
        else if (userType.value !== 'Normal') {
            if(anonymousFlag){
                changeOrientation();
            }
            uploadDiv.classList.remove('disable');
        }
        else if(anonymousFlag){
            changeOrientation();
        }
        else if (!uploadDiv.classList.contains('disable')){
            uploadDiv.classList.add('disable');
        }
    });


</script>
<!--<script src="./register_validate.js"></script>-->
</body>
</html>