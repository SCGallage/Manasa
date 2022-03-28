<?php use util\CommonConstants;

if (array_key_exists('info', $params)){

    ?>
    <div class="col-s-12 col-m-12 col-l-12 list-card bg-color-3 shadow-2">
        <h1 class="col-s-12 col-m-12 col-l-12 heading text-center color-1">
            Profile
        </h1>

        <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

        <div class="col-s-12 col-m-10 col-l-8">
            <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
                Username:
            </p>
            <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
                <?php echo $params['info'][0]['username']?>
            </p>

            <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
                Date of birth:
            </p>
            <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
                <?php echo $params['info'][0]['dateOfBirth']?>
            </p>

            <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
                Date registered:
            </p>
            <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
                <?php echo $params['info'][0]['registration_date']?>
            </p>

            <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
                Meetings:
            </p>
            <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
                <?php
                if (array_key_exists('appointments', $params)) {
                    echo $params['appointments'][0]['count'];
                }
                ?>
            </p>

            <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
                e-mail:
            </p>
            <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
                <?php echo $params['info'][0]['email']?>
            </p>

            <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
                e-mail verification status:
            </p>
            <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
                <?php
                if ($params['info'][0]['email_verified'] == CommonConstants::STATE_ACCEPTED) {
                    echo "Verified";
                } else {
                    echo "Not verified";
                }
                ?>
            </p>
        </div>

        <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

        <div class="col-s-12 col-m-12 col-l-12">
            <div class="col-s-1 col-m-1 col-l-1 color-0">.</div>
            <a href="/updateProfile">
                <input class="col-s-10 col-m-10 col-l-10 bannerButton color-4 bg-color-1" type="button" value="Update Profile">
            </a>
        </div>
        <div class="col-s-12 col-m-12 col-l-12 color-0">.</div>

        <!--table class="col-s-12 col-m-12 col-l-12 card-align-center">
            <tr>
                <td class="col-s-6 col-m-6 col-l-6 margin-l">


                </td>

                <td class="col-s-5 col-m-5 col-l-5 margin-r">
                    <input class="bannerButton color-4 bg-color-6"
                           type="button"
                           value="Delete Profile"
                           onclick="popup('popup', <?php echo \util\CommonConstants::POPUP_SHOW; ?>)">
                </td>
            </tr>
        </table-->

        <!--Delete profile message popup----------------------------------------------------------------------------------->
        <div id="popup" class="col-s-7 col-m-8 col-l-6 popup-card list-card shadow-2 border-color-1 bg-color-4">
            <h2 class="col-s-12 col-m-12 col-l-12 text-center heading color-6">
                Your prifile will be deleted!!
            </h2>
            <h4 class="col-s-12 col-m-12 col-l-12 text-center heading color-1">
                Do you really want to continue?<br>
                All of your account data will be deleted once you click "Delete Account" button.<br>
                You can cancel this process by clicking "Cancel" button.
            </h4>

            <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>
            <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-5"
                   type="button"
                   onclick="popup('popup', <?php echo \util\CommonConstants::POPUP_HIDE; ?>)"
                   value="Cancel">

            <a href="">
                <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-6"
                       type="button"
                       onclick="popup('popup', <?php echo \util\CommonConstants::POPUP_HIDE; ?>)"
                       value="Delete Account">
            </a>
            <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

        </div>
        <!--/Delete profile message popup---------------------------------------------------------------------------------->

    </div>
    <?php
}
?>

