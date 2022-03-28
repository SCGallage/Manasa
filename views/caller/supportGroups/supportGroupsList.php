<?php
    use core\sessions\SessionManagement;
    use util\CommonConstants;

    ?>
<!--Search Support Groups-------------------------------------------------------------------------------->
<div class="col-s-12 col-m-12 col-l-12 shadow-1 normal-card sg-card-img-1">

    <form class="col-s-12 col-m-5 col-l-4 card-align-right" action="/searchSg" method="post">
        <input type="search"
               name="searchKey"
               class="col-s-12 col-m-9 col-l-9 border-bottem-color-1 search-bar color-1" required>
        <input class="col-s-12 col-m-3 col-l-3 searchButton bg-color-1 color-4 card-align-right " type="submit"
               value="Search">
    </form>

    <div class="col-s-12 col-m-12 col-l-12">
        <?php
        if (!empty($requests)){
            ?>
            <a href="#requested" >
                <input type="button" class="col-s-12 col-m-3 col-l-2 bannerButton bg-color-1 color-4" value="My Requests">
            </a>
            <?php
        }

        if (!empty($mySupportGroups)){
            ?>
            <a href="#mySupportGroups">
                <input type="button" class="col-s-12 col-m-3 col-l-3 bannerButton bg-color-1 color-4 " value="My Support Groups">
            </a>
            <?php
        }

        if (array_key_exists("viewType", $params) && $viewType == "searchSg"){
            ?>
            <a href="/callerSupportGroupsList" >
                <input type="button" class="col-s-12 col-m-3 col-l-2 bannerButton bg-color-1 color-4" value="Back">
            </a>
            <?php
        }
        ?>

    </div>
</div>
<!--/Search Support Groups------------------------------------------------------------------------------->

<!--Search results----------------------------------------------------------------------------->
<?php
if(array_key_exists('results', $params) && !empty($results)){
?>
<div id="available" class="col-l-12 col-m-12 col-s-12 bg-color-4">
    <h1 class="col-s-12 col-m-12 col-l-12 heading-text-center color-1 text-shadow">Search results</h1>

    <div class="col-s-12 col-m-12 col-l-12">
<?php
    foreach ($results as $row) {
        ?>
        <div class="col-s-12 col-m-12 col-l-12 list-card bg-color-3 shadow-2">

            <div class="col-s-12 col-m-8 col-l-8 listInfoCard">
                <p class="heading color-1 text-left"><?php echo $row["name"]?></p>
                <p class="normal-text color-1 text-left"><?php echo $row["type"]?></p>
            </div>

            <div class="col-s-12 col-m-4 col-l-4 normal-card">
                <a href="/callerSupportGroupHome?sgId=<?php echo $row['id']?>"
                   class="col-s-12 col-m-6 col-l-6 normal-card">
                    <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-2 color-1 heading"
                           type="submit" value="View">
                </a>
                <form class="col-s-12 col-m-5 col-l-5 normal-card"
                      action="/loadJoinRequestTimeSlots?sgId=<?php echo $row['id']?>"
                      method="get">
                    <input type="hidden" value="<?php echo $_SESSION[CommonConstants::SESSION_USER_ID];?>" name="callerId">
                    <input type="hidden" value="<?php echo $row['id']?>" name="supportGroupId">
                    <input type="hidden" value="<?php echo CommonConstants::STATE_PENDING?>" name="state">
                    <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-1 color-4 heading"
                           type="submit" value="Join">
                </form>
            </div>
        </div>
        <?php
    }
} else if(array_key_exists('results', $params) && empty($params['results']) &&
          array_key_exists('mySupportGroups', $params) && empty($params['mySupportGroups']) &&
          array_key_exists('requests', $params) && empty($params['requests'])) {
    ?>
    <div class="col-s-12 col-m-12 col-l-12 list-card bg-color-3 shadow-2">
        <h3 class="color-1 heading text-center">No Support Groups found.</h3>
    </div>
    <?php
}
?>
    </div>
</div>
<!--/Search results---------------------------------------------------------------------------->

<!--Available Support Groups----------------------------------------------------------------------------->
<?php
if(!empty($availableSupportGroups)){
    ?>
<div id="available" class="col-l-12 col-m-12 col-s-12 bg-color-4">
    <h1 class="col-s-12 col-m-12 col-l-12 heading-text-center color-1 text-shadow">Select Support Group</h1>

    <div class="col-s-12 col-m-12 col-l-12">

    <?php
    foreach ($availableSupportGroups as $row) {
        ?>
        <div class="col-s-12 col-m-12 col-l-12 list-card bg-color-3 shadow-2">

            <div class="col-s-12 col-m-8 col-l-8 listInfoCard">
                <p class="heading color-1 text-left"><?php echo $row["name"]?></p>
                <p class="normal-text color-1 text-left"><?php echo $row["type"]?></p>
            </div>

            <div class="col-s-12 col-m-4 col-l-4 normal-card">
                <a href="/callerSupportGroupHome?sgId=<?php echo $row['id']?>"
                   class="col-s-12 col-m-6 col-l-6 normal-card">
                    <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-2 color-1 heading"
                           type="submit" value="View">
                </a>
                <form class="col-s-12 col-m-5 col-l-5 normal-card"
                      action="/loadJoinRequestTimeSlots?sgId=<?php echo $row['id']?>"
                      method="get">
                    <input type="hidden" value="<?php echo $_SESSION[CommonConstants::SESSION_USER_ID];?>" name="callerId">
                    <input type="hidden" value="<?php echo $row['id']?>" name="supportGroupId">
                    <input type="hidden" value="<?php echo CommonConstants::STATE_PENDING?>" name="state">
                    <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-1 color-4 heading"
                           type="submit" value="Join">
                </form>
            </div>
        </div>
        <?php
    }
    ?>
    </div>
</div>
    <?php
}
?>
<!--/Available Support Groups---------------------------------------------------------------------------->

<!--Requested Support Groups----------------------------------------------------------------------------->
<div id="requested" class="col-l-12 col-m-12 col-s-12 bg-color-4">

    <div class="col-s-12 col-m-12 col-l-12">
        <?php
        if(!empty($requests)){
            ?>
            <h1 class="col-s-12 col-m-12 col-l-12 heading-text-center color-1 text-shadow">Requested Support Groups</h1>
            <?php
            foreach ($requests as $row) {
            ?>
            <div class="col-s-12 col-m-12 col-l-12 list-card bg-color-3 shadow-2">

                <div class="col-s-12 col-m-8 col-l-8 listInfoCard">
                    <p class="heading color-1 text-left"><?php echo $row["name"]?></p>
                    <p class="normal-text color-1 text-left"><?php echo $row["type"]?></p>
                </div>

                <div class="col-s-12 col-m-4 col-l-4 normal-card">
                    <a href="/callerSupportGroupHome?sgId=<?php echo $row['id']?>"
                       class="col-s-12 col-m-6 col-l-6 normal-card">
                        <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-2 color-1 heading"
                               type="submit" value="View">
                    </a>

                    <form class="col-s-12 col-m-5 col-l-5 normal-card" action="/cancelSupportGroupJoinRequest" method="post">
                        <input type="hidden"
                               name="supportGroupId"
                               value="<?php echo $row['id']?>">

                        <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-6 color-4 heading"
                               type="button"  value="Cancel"
                               onclick="popup('requestPopup<?php echo $row['id']?>',
                               <?php echo CommonConstants::POPUP_SHOW; ?>)">

                        <!--Cancel Request message popup--------------------------------------------------------------------->
                        <div id="requestPopup<?php echo $row['id']?>" class="col-s-7 col-m-8 col-l-6 popup-card list-card shadow-2 border-color-1 bg-color-4">
                            <h2 class="col-s-12 col-m-12 col-l-12 text-center heading color-6">
                                Your Support Group Join Request will be canceled!!
                            </h2>
                            <h4 class="col-s-12 col-m-12 col-l-12 text-center heading color-1">
                                Do you really want to continue?<br>
                                Your request will be deleted once you click "Confirm" button.<br>
                                You can cancel this process by clicking "Cancel" button.
                            </h4>

                            <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>
                            <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-5"
                                   type="button"
                                   onclick="popup('requestPopup<?php echo $row['id']?>',
                                   <?php echo CommonConstants::POPUP_HIDE; ?>)"
                                   value="Cancel">

                            <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-6"
                                   type="submit"
                                   onclick="popup('requestPopup', <?php echo CommonConstants::POPUP_HIDE; ?>)"
                                   value="Confirm">

                            <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

                        </div>
                        <!--/Cancel Request message popup-------------------------------------------------------------------->

                    </form>
                </div>
            </div>

            <?php
            }
        }?>
    </div>
</div>
<!--/Requested Support Groups---------------------------------------------------------------------------->

<!--My Support Groups------------------------------------------------------------------------------------>
<div id="mySupportGroups" class="col-l-12 col-m-12 col-s-12 bg-color-4">

    <div class="col-s-12 col-m-12 col-l-12">
        <?php
        if(!empty($mySupportGroups)){
            ?>
            <h1 class="col-s-12 col-m-12 col-l-12 heading-text-center color-1 text-shadow">My Support Groups</h1>
            <?php
            foreach ($mySupportGroups as $row) {
                ?>
        <div class="col-s-12 col-m-12 col-l-12 list-card bg-color-3 shadow-2">

            <div class="col-s-12 col-m-8 col-l-8 listInfoCard">
                <p class="heading color-1 text-left"><?php echo $row["name"]?></p>
                <p class="normal-text color-1 text-left"><?php echo $row["type"]?></p>
            </div>

            <div class="col-s-12 col-m-4 col-l-4 normal-card">
                <a href="/callerSupportGroupHome?sgId=<?php echo $row['id']?>"
                   class="col-s-12 col-m-6 col-l-6 normal-card card-align-right">
                    <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-2 color-1 heading"
                           type="submit" value="View">
                </a>
            </div>
        </div>
        <?php
            }
        }
        ?>

    </div>
</div>

<!--/My Support Groups----------------------------------------------------------------------------------->



