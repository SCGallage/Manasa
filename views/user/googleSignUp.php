<link rel="stylesheet" href="./assets/css/user/google_register.css">
<main>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <span class="card-title">Almost There!</span>
                <span class="card-description">Few more details and you're ready to go!</span>
            </div>
            <form action="" method="post" enctype="multipart/form-data" >
                <div class="card-body">

                    <div class="user-type-input">
                        <label for="">User Type:</label>
                        <select name="usertype" id="usertype" class="select-input">
                            <option value="Normal" selected>Caller</option>
                            <option value="Befriender">Befriender</option>
                            <option value="Volunteer">Volunteer</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label for="username">Username</label>
                        <input type="text" class="text-field" name="username" id="username">
                        <h5>*Required</h5>
                    </div>
                    <div class="input-field">
                        <label for="">Date of Birth</label>
                        <input type="date" class="text-field" name="dateOfBirth" id="dob">
                        <h5>*Required</h5>
                    </div>
                    <div class="input-field">
                        <label for="">Gender</label>
                        <select type="date" class="text-field" name="gender" id="gender">
                            <option value="-------" selected disabled>--------</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                            <option value="N">Rather Not Say</option>
                        </select>
                        <h5>*Required</h5>
                    </div>
                    <div id="upload-div" class="file-upload disable">
                        <h4 class="file-field-name">Attach Your CV</h4>
                        <input type="file" name="cv" id="cv" hidden>
                        <button type="button" class="btn fake-btn" name="uploadBtn" id="uploadBtn">Choose File</button>
                        <span class="file-name" id="fileName">
                                No File Chosen, yet.
                            </span>
                        <button class="btn remove-btn disable" id="removeFile">Remove</button>
                    </div>
                    <div class="input-check">
                        <input type="checkbox" name="Remember Me" id="terms-box">
                        I accept the <a href="#">terms and conditions</a> and read the <a href="#">privacy policy</a>.
                    </div>
                </div>
                <button type="submit" class="register-btn">Register</button>
            </form>
        </div>
    </div>
</main>
<script>
    const fileUploader = document.getElementById('cv');
    const uploadBtn = document.getElementById('uploadBtn');
    const fileName = document.getElementById('fileName');
    const fileRemoveBtn = document.getElementById('removeFile');
    const userType = document.getElementById('usertype');
    const uploadDiv = document.getElementById('upload-div');

    uploadBtn.addEventListener('click', (e) => {
        fileUploader.click();
    });

    fileUploader.addEventListener('change', (e) => {
        console.log(fileUploader.files[0]["name"]);
        fileName.innerHTML = fileUploader.files[0]["name"];
        fileRemoveBtn.classList.remove("display-btn");
        console.log(fileRemoveBtn.classList);
    });

    userType.addEventListener('change', () => {

        if (userType.value !== 'Normal'){
            uploadDiv.classList.remove('disable');
        }
        else if (!uploadDiv.classList.contains('disable')){
            uploadDiv.classList.add('disable');
        }
    });
</script>
