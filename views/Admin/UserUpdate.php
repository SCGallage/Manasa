<?php $params ?>

    <link rel="stylesheet" href="http://localhost/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

<main>
    <div class="col-l-12">
        <div class="flex-container">
            <div class="col-l-7">
                <div class="head-text3 col-l-12 col-m-12 col-s-12 flex-gap">
                    <span>Update Staff Account</span>
                </div>

                <div class="col-l-12 col-m-12 col-s-12 flex-gap1">
                    <div class="primary-card card-content">

<!--                        user table variables-->
                        <?php
                        foreach ($viewUpdateUser as $data){?>

<!--                        Staff table variables-->
                            <?php
                                foreach ($viewUpdateStaff as $staffData){?>

                        <form name="createUserForm" action="/admin/updateUser" class="form1" method="post">
                            <div class="col-l-12 col-m-12 col-s-12 flex-container3 ">
                                <div class="col-l-4 col-m-4 col-s-4">
                                    <label for="userType" class="text-style3">User Type</label>
                                </div>
                                <div class="col-l-8 col-m-8 col-s-8">
                                    <input type="hidden" name="StaffId" id="StaffId" value="<?php echo $data['id'] ?>">
                                    <select name="type" id="Type" class="select1">
                                        <option value="<?php echo $staffData['type']?>" class="custom-font"><?php echo $staffData['type']?></option>
                                        <option value="Moderator" class="custom-font">Moderator</option>
                                        <option value="Administrator" class="custom-font">Administrator</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                                <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                                    <div class="col-l-12 col-m-12 col-s-12">
                                        <label for="email" class="text-style3">Username:</label>
                                    </div>
                                    <div class="col-l-12 col-m-12 col-s-12">
                                        <input type="text" id="username" name="username" value="<?php echo $data['username']?>" required>
                                        <span class="required-text">*Required</span>
                                    </div>
                                </div>
                                <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                                    <div class="col-l-12 col-m-12 col-s-12">
                                        <label for="Date" class="text-style3">Email:</label>
                                    </div>
                                    <div class="col-l-12 col-m-12 col-s-12">
                                        <input type="email" id="email" name="email" value="<?php echo $data['email']?>" required>
                                        <span class="required-text">*Required</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">

                                <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                                    <div class="col-l-12 col-m-12 col-s-12">
                                        <label for="email" class="text-style3">First Name:</label>
                                    </div>
                                    <div class="col-l-12 col-m-12 col-s-12">
                                        <input type="text" id="fname" name="fname" value="<?php echo $staffData['fname']?>" required>
                                        <span class="required-text">*Required</span>
                                    </div>
                                </div>
                                <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                                    <div class="col-l-12 col-m-12 col-s-12">
                                        <label for="Date" class="text-style3">Last Name:</label>
                                    </div>
                                    <div class="col-l-12 col-m-12 col-s-12">
                                        <input type="text" id="lname" name="lname" value="<?php echo $staffData['lname']?>" required>
                                        <span class="required-text">*Required</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
                                <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
                                    <div class="col-l-12 col-m-12 col-s-12">
                                        <label for="Date" class="text-style3">State:</label>
                                    </div>
                                    <div class="col-l-12 col-m-12 col-s-12">
                                        <select name="state" id="reportType" class="select2 custom-font">
                                            <option value="1" class="custom-font">Active</option>
                                            <option value="0" class="custom-font">Inactive</option>
                                            <option value="<?php echo $staffData['state'] ?>" selected>
                                                <?php
                                                if ($staffData['state'] == 1) {
                                                    echo 'Active';
                                                }
                                                elseif ($staffData['state'] == 0){
                                                    echo 'Inactive';
                                                }
                                                ?>
                                            </option>
                                        </select>
                                        <span class="required-text">*Required</span>
                                    </div>
                                </div>
                                <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
                                    <div class="col-l-12 col-m-12 col-s-12">
                                        <label for="Date" class="text-style3">Gender:</label>
                                    </div>
                                    <div class="col-l-12 col-m-12 col-s-12">
                                        <select name="gender" id="gender" class="select2 custom-font" required>
                                            <option value="M" class="custom-font">Male</option>
                                            <option value="F" class="custom-font">Female</option>
                                            <option value="R" class="custom-font">Rather Not Say</option>
                                            <option value="<?php echo $data['gender'] ?>" selected>
                                                <?php
                                                if ($data['gender'] == 'M') {
                                                    echo 'Male';
                                                }
                                                elseif ($data['state'] == 'F'){
                                                    echo 'Female';
                                                }
                                                elseif ($data['state'] == 'R'){
                                                    echo 'Rather Not Say';
                                                }
                                                ?>
                                            </option>
                                        </select>
                                        <span class="required-text">*Required</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-l-12 col-m-12 col-s-12 padding-top">
                                <div class="col-l-8"></div>
                                <div class="col-l-4 col-m-12 col-s-12 positionR">
                                    <input type="submit" value="Submit">
                                </div>
                            </div>

                        </form>
                        <?php } }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script src="http://localhost/assets/js/admin/AdminBackEnd.js" ></script>
<script src="http://localhost/assets/js/admin/formValidation.js" ></script>
