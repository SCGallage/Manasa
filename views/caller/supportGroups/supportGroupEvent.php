<div class="col-s-12 col-m-12 col-l-12 list-card bg-color-3 shadow-2">\
    <a class="col-s-12 col-m-12 col-l-12 link-text" href="/callerSupportGroupHomeMember">
        <input class="bannerButton normal-card bg-color-5 color-4 card-align-right" type="button" value="Support Group Home">
    </a>
    <h1 class="col-s-12 col-m-12 col-l-12 heading text-center color-1">
        Cancer Support
    </h1>

    <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

    <div class="col-s-12 col-m-10 col-l-8">

        <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
            Participants:
        </p>
        <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
            10
        </p>

        <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
            Event type:
        </p>
        <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
            Zoom Meetings
        </p>

        <p class="col-s-6 col-m-6 col-l-6 heading margin-r text-right color-1">
            Date:
        </p>
        <p class="col-s-5 col-m-5 col-l-5 heading margin-l text color-1">
            10/29/202
        </p>

        <div class="col-s-12 col-m-12 col-l-12">
            <input class="col-s-12 col-m-12 col-l-12 normal-card bannerButton color-4 bg-color-6"
                   type="button"
                   value="Cancel Participation"
                   onclick="popup('popup', <?php echo \util\CommonConstants::POPUP_SHOW; ?>)">
        </div>
    </div>

    <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

    <!--Cancel participation message popup----------------------------------------------------------------------------------->
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
    <!--/Cancel participation message popup--------------------------------------------------------------------------------->

</div>

