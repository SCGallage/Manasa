<?php use util\CommonConstants; ?>
<!--Search Support Groups-------------------------------------------------------------------------------->
<div class="col-s-12 col-m-12 col-l-12 shadow-1 normal-card sg-card-img-1">

    <form class="col-s-12 col-m-5 col-l-4 card-align-right" action="">
        <input type="search" class="col-s-12 col-m-9 col-l-9 border-bottem-color-1 search-bar color-1">
        <input class="col-s-12 col-m-3 col-l-3 searchButton bg-color-1 color-4 card-align-right " type="submit"
               value="Search">
    </form>

    <div class="col-s-12 col-m-12 col-l-12">
        <a href="#requested" class="col-s-12 col-m-3 col-l-2 link-text">
            <input type="button" class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-1 color-4" value="My Requests">
        </a>

        <a href="#mySupportGroups" class="col-s-12 col-m-3 col-l-3 link-text">
            <input type="button" class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-1 color-4" value="My Support Groups">
        </a>
    </div>
</div>
<!--/Search Support Groups------------------------------------------------------------------------------->

<!--Available Support Groups----------------------------------------------------------------------------->
<div id="available" class="col-l-12 col-m-12 col-s-12 bg-color-4">
    <h1 class="col-s-12 col-m-12 col-l-12 heading-text-center color-1 text-shadow">Select Support Group</h1>

    <div class="col-s-12 col-m-12 col-l-12">

        <div class="col-s-12 col-m-12 col-l-12 list-card bg-color-3 shadow-2">

            <div class="col-s-12 col-m-8 col-l-8 listInfoCard">
                <p class="heading color-1 text-left">Support Group 01</p>
                <p class="normal-text color-1 text-left">Cancer Support</p>
            </div>

            <div class="col-s-12 col-m-4 col-l-4">
                <form class="col-s-12 col-m-6 col-l-6" action="/callerSupportGroupHomeVisitor" method="get">
                    <input type="hidden" value="1">
                    <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-2 color-1 heading"
                           type="submit" value="View">
                </form>
                <form class="col-s-12 col-m-5 col-l-5" action="">
                    <input type="hidden" value="1">
                    <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-1 color-4 heading"
                           type="submit" value="Join">
                </form>
            </div>
        </div>

        <div class="col-s-12 col-m-12 col-l-12 list-card bg-color-3 shadow-2">

            <div class="col-s-12 col-m-8 col-l-8 listInfoCard">
                <p class="heading color-1 text-left">Support Group 01</p>
                <p class="normal-text color-1 text-left">Cancer Support</p>
            </div>

            <div class="col-s-12 col-m-4 col-l-4">
                <form class="col-s-12 col-m-6 col-l-6" action="callerSupportGroupHomeVisitor" method="get">
                    <input type="hidden" value="1">
                    <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-2 color-1 heading"
                           type="submit" value="View">
                </form>
                <form class="col-s-12 col-m-5 col-l-5" action="">
                    <input type="hidden" value="1">
                    <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-1 color-4 heading"
                           type="submit" value="Join">
                </form>
            </div>
        </div>

        <div class="col-s-12 col-m-12 col-l-12 list-card bg-color-3 shadow-2">

            <div class="col-s-12 col-m-8 col-l-8 listInfoCard">
                <p class="heading color-1 text-left">Support Group 01</p>
                <p class="normal-text color-1 text-left">Cancer Support</p>
            </div>

            <div class="col-s-12 col-m-4 col-l-4">
                <form class="col-s-12 col-m-6 col-l-6" action="callerSupportGroupHomeVisitor" method="get">
                    <input type="hidden" value="1">
                    <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-2 color-1 heading"
                           type="submit" value="View">
                </form>
                <form class="col-s-12 col-m-5 col-l-5" action="">
                    <input type="hidden" value="1">
                    <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-1 color-4 heading"
                           type="submit" value="Join">
                </form>
            </div>
        </div>

    </div>
</div>
<!--/Available Support Groups---------------------------------------------------------------------------->

<!--Requested Support Groups----------------------------------------------------------------------------->
<div id="requested" class="col-l-12 col-m-12 col-s-12 bg-color-4">
    <h1 class="col-s-12 col-m-12 col-l-12 heading-text-center color-1 text-shadow">Requested Support Groups</h1>

    <div class="col-s-12 col-m-12 col-l-12">

        <div class="col-s-12 col-m-12 col-l-12 list-card bg-color-3 shadow-2">

            <div class="col-s-12 col-m-8 col-l-8 listInfoCard">
                <p class="heading color-1 text-left">Support Group 01</p>
                <p class="normal-text color-1 text-left">Cancer Support</p>
            </div>

            <div class="col-s-12 col-m-4 col-l-4">
                <form class="col-s-12 col-m-6 col-l-6" action="/callerSupportGroupHomeVisitor" method="get">
                    <input type="hidden" value="1">
                    <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-2 color-1 heading"
                           type="submit" value="View">
                </form>
                <form class="col-s-12 col-m-5 col-l-5" action="#" method="get">
                    <input type="hidden" value="1">
                    <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-6 color-4 heading"
                           type="button" value="Cancel"
                           onclick="popup('requestPopup', <?php echo CommonConstants::POPUP_SHOW; ?>)">
                </form>
            </div>
        </div>

    </div>
</div>
<!--/Requested Support Groups---------------------------------------------------------------------------->

<!--My Support Groups------------------------------------------------------------------------------------>
<div id="mySupportGroups" class="col-l-12 col-m-12 col-s-12 bg-color-4">
    <h1 class="col-s-12 col-m-12 col-l-12 heading-text-center color-1 text-shadow">My Support Groups</h1>

    <div class="col-s-12 col-m-12 col-l-12">

        <div class="col-s-12 col-m-12 col-l-12 list-card bg-color-3 shadow-2">

            <div class="col-s-12 col-m-8 col-l-8 listInfoCard">
                <p class="heading color-1 text-left">Support Group 01</p>
                <p class="normal-text color-1 text-left">Cancer Support</p>
            </div>

            <div class="col-s-12 col-m-4 col-l-4">
                <form class="col-s-12 col-m-6 col-l-6 card-align-right normal-card" action="/callerSupportGroupHomeMember" method="get">
                    <input type="hidden" value="1">
                    <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-2 color-1 heading"
                           type="submit" value="View">
                </form>
            </div>
        </div>

        <div class="col-s-12 col-m-12 col-l-12 list-card bg-color-3 shadow-2">

            <div class="col-s-12 col-m-8 col-l-8 listInfoCard">
                <p class="heading color-1 text-left">Support Group 01</p>
                <p class="normal-text color-1 text-left">Cancer Support</p>
            </div>

            <div class="col-s-12 col-m-4 col-l-4">
                <form class="col-s-12 col-m-6 col-l-6 card-align-right normal-card" action="/callerSupportGroupHomeMember" method="get">
                    <input type="hidden" value="1">
                    <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-2 color-1 heading"
                           type="submit" value="View">
                </form>
            </div>
        </div>

    </div>
</div>
<!--/My Support Groups----------------------------------------------------------------------------------->

<!--/Upcoming Appointments------------------------------------------------------------------------------->

<!--Cancel Request message popup--------------------------------------------------------------------->
<div id="requestPopup" class="col-s-7 col-m-8 col-l-6 popup-card list-card shadow-2 border-color-1 bg-color-4">
    <h2 class="col-s-12 col-m-12 col-l-12 text-center heading color-6">
        Your Appointment will be canceled!!
    </h2>
    <h4 class="col-s-12 col-m-12 col-l-12 text-center heading color-1">
        Do you really want to continue?<br>
        Your appointment will be deleted once you click "Confirm" button.<br>
        You can cancel this process by clicking "Cancel" button.
    </h4>

    <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>
    <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-5"
           type="button"
           onclick="popup('requestPopup', <?php echo CommonConstants::POPUP_HIDE; ?>)"
           value="Cancel">

    <a href="">
        <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-6"
               type="button"
               onclick="popup('requestPopup', <?php echo CommonConstants::POPUP_HIDE; ?>)"
               value="Confirm">
    </a>
    <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

</div>
<!--/Cancel Request message popup-------------------------------------------------------------------->
