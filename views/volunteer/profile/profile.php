<div class="col-s-12 col-m-12 col-l-12 list-card bg-color-3 shadow-2">
    <h1 class="col-s-12 col-m-12 col-l-12 heading text-center color-1">
        Profile
    </h1>

    <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

    <div class="col-s-12 col-m-10 col-l-8">
        <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
            Name:
        </p>
        <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
            K.G. Srirmal
        </p>

        <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
            Age:
        </p>
        <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
            26
        </p>

        <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
            Meetings:
        </p>
        <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
            6
        </p>

        <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
            Preferred Meeting type:
        </p>
        <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
            Zoom Meetings
        </p>

        <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
            Phone:
        </p>
        <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
            0712649964
        </p>

        <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
            e-mail:
        </p>
        <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
            srimal78@gmail.com
        </p>
    </div>

    <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

    <table class="col-s-12 col-m-12 col-l-12 card-align-center">
        <tr>
            <td class="col-s-6 col-m-6 col-l-6 margin-l">
                <a href="/updateVolunteerProfile">
                    <input class="bannerButton color-4 bg-color-1 card-align-right" type="button" value="Update Profile">
                </a>

            </td>

            <td class="col-s-5 col-m-5 col-l-5 margin-r">
                <input class="bannerButton color-4 bg-color-6"
                       type="button"
                       value="Delete Profile"
                       onclick="popup('popup', <?php echo \util\CommonConstants::POPUP_SHOW; ?>)">
            </td>
        </tr>
    </table>

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
