<?php
use util\CommonConstants;

if (array_key_exists('info', $params)){

    $params = $params['info'][0];
    ?>
    <form action="/updateProfile" method="post" id="profileFrom">
        <div class="col-s-12 col-m-12 col-l-12 list-card bg-color-3 shadow-2">
            <a class="col-s-12 col-m-12 col-l-12 normal-card" href="/profile">
                <input class="bannerButton bg-color-5 color-4" type="button" value="Back">
            </a>
            <h1 class="col-s-12 col-m-12 col-l-12 heading text-center color-1">
                Update Profile
            </h1>

            <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

            <div class="col-s-12 col-m-10 col-l-8">
                <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
                    First Name*:
                </p>
                <input class="col-s-5 col-m-4 col-l-4 heading margin-l color-1 search-bar"
                       type="text"
                       name="<?php echo CommonConstants::PROFILE_FNAME; ?>"
                       value="<?php echo $params['fname']?>" required>


                <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
                    Last Name*:
                </p>
                <input class="col-s-5 col-m-4 col-l-4 heading margin-l color-1 search-bar"
                       type="text"
                       name="<?php echo CommonConstants::PROFILE_LNAME; ?>"
                       value="<?php echo $params['lname']?>" required>


                <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
                    Username*:
                </p>
                <input id="phone"
                       class="col-s-5 col-m-4 col-l-4 heading margin-l color-1 search-bar"
                       type="text"
                       name="username"
                       value="<?php echo $params['username']?>" required>


                <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
                    Date of Birth*:
                </p>
                <input class="col-s-5 col-m-4 col-l-4 heading margin-l color-1 search-bar"
                       type="date"
                       name="dateOfBirth"
                       value="<?php echo $params['dateOfBirth']?>" required>

                <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
                    Gender*:
                </p>
                <select class="col-s-5 col-m-4 col-l-4 search-bar margin-l color-1 heading"
                        name="<?php echo CommonConstants::PROFILE_GENDER?>" id="type">
                    <?php
                    if ($params['gender'] == "M"){
                        ?>
                        <option class="bg-color-1 color-4 heading" selected value="<?php echo CommonConstants::USER_GENDER_MALE?>">
                            <?php echo CommonConstants::USER_GENDER_MALE?>
                        </option>
                        <?php
                    } else {
                        ?>
                        <option class="bg-color-1 color-4 heading" value="<?php echo CommonConstants::USER_GENDER_MALE?>">
                            <?php echo CommonConstants::USER_GENDER_MALE?>
                        </option>
                        <?php
                    }

                    if ($params['gender'] == "F") {
                        ?>
                        <option class="bg-color-1 color-4 heading" selected value="<?php echo CommonConstants::USER_GENDER_FEMALE?>">
                            <?php echo CommonConstants::USER_GENDER_FEMALE?>
                        </option>
                        <?php
                    } else {
                        ?>'
                        <option class="bg-color-1 color-4 heading" value="<?php echo CommonConstants::USER_GENDER_FEMALE?>">
                            <?php echo CommonConstants::USER_GENDER_FEMALE?>
                        </option>
                        <?php
                    }

                    if ($params['gender'] == "O") {
                        ?>
                        <option class="bg-color-1 color-4 heading" selected value="<?php echo CommonConstants::USER_GENDER_OTHER?>">
                            <?php echo CommonConstants::USER_GENDER_OTHER?>
                        </option>
                        <?php
                    } else {
                        ?>
                        <option class="bg-color-1 color-4 heading" value="<?php echo CommonConstants::USER_GENDER_OTHER?>">
                            <?php echo CommonConstants::USER_GENDER_OTHER?>
                        </option>
                        <?php
                    }
                    ?>

                </select>

                <!--p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
                    Preferred Meeting Type*:
                </p>
                <select class="col-s-5 col-m-4 col-l-4 search-bar margin-l color-1 heading"
                        name="<?php echo CommonConstants::PROFILE_MEETING_TYPE?>" id="type">

                    <option class="bg-color-1 color-4 heading" value="<?php echo CommonConstants::MEETING_TYPE_ZOOM?>">
                        <?php echo CommonConstants::MEETING_TYPE_ZOOM?>
                    </option>

                    <option class="bg-color-1 color-4 heading" value="<?php echo CommonConstants::MEETING_TYPE_WHATSAPP?>">
                        <?php echo CommonConstants::MEETING_TYPE_WHATSAPP?>
                    </option>

                </select-->
            </div>

            <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

            <table class="col-s-12 col-m-12 col-l-12">
                <tr>
                    <td class="col-s-6 col-m-6 col-l-6 margin-l">
                        <input class="bannerButton color-4 bg-color-6 card-align-right"
                               type="button"
                               value="Reset"
                               onclick="clearForm('profileFrom')">
                    </td>
                    <td class="col-s-5 col-m-5 col-l-5 margin-r">
                        <input class="bannerButton color-4 bg-color-1"
                               type="button"
                               value="Update Profile"
                               onclick="popup('popup', <?php echo CommonConstants::POPUP_SHOW; ?>)">
                    </td>
                </tr>
            </table>

            <!--Update profile message popup----------------------------------------------------------------------------------->
            <div id="popup" class="col-s-7 col-m-8 col-l-6 popup-card list-card shadow-2 border-color-1 bg-color-4">
                <h2 class="col-s-12 col-m-12 col-l-12 text-center heading color-1">
                    Click Update to continue.
                </h2>
                <h4 class="col-s-12 col-m-12 col-l-12 text-center heading color-1">
                    Do you really want to continue?<br>
                    All of your account data will be updated once you click "Update" button.<br>
                    You can cancel this process by clicking "Cancel" button.
                </h4>

                <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>
                <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-5"
                       type="button"
                       onclick="popup('popup', <?php echo \util\CommonConstants::POPUP_HIDE; ?>)"
                       value="Cancel">

                <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-1"
                       type="submit"
                       onclick="popup('popup', <?php echo \util\CommonConstants::POPUP_HIDE; ?>)"
                       value="Update">
                <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

            </div>
            <!--/Update profile message popup---------------------------------------------------------------------------------->
        </div>
    </form>
    <?php
}
?>
