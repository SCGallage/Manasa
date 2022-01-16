<?php

use util\CommonConstants;
//echo getcwd()."<br>";
//print_r($params['sg']);

?>

<!--Banner----------------------------------------------------------------------------------------------->
<div class="col-l-12 col-m-12 col-s-12 shadow-1 banner-card">
    <div class="col-s-12 col-m-12 col-l-12">
        <h1 class="heading color-4"><?php echo $params['sg'][0]['name']?></h1>
        <h2 class="normal-text color-4">We are here to help you</h2>
    </div>
    <div class="col-s-12 col-m-12 col-l-12">

        <a class="link-text" href="/callerSupportGroupsList">
            <input class="col-s-12 col-m-2 col-l-2 bannerButton bg-color-1 color-4 border-color-4 heading  card-align-right"
                   type="button" value="Back">
        </a>

        <a class="link-text" href="#about">
            <input class="col-s-12 col-m-2 col-l-2 bannerButton bg-color-1 color-4 border-color-4 heading  card-align-right"
                   type="button" value="About">
        </a>

        <?php
        if ($params['viewType'] == CommonConstants::USER_TYPE_NORMAL_CALLER) {
            ?>

                <input class="col-s-12 col-m-2 col-l-2 bannerButton bg-color-6 color-4 border-color-4 heading  card-align-right"
                       type="button" value="Leave Group"
                       onclick="popup('leaveWarning',
                                        <?php echo CommonConstants::POPUP_SHOW; ?>)">

            <!--Leave Support Group message popup--------------------------------------------------------------------->
            <div id="leaveWarning" class="col-s-7 col-m-8 col-l-6 popup-card list-card shadow-2 border-color-1 bg-color-4">
                <h2 class="col-s-12 col-m-12 col-l-12 text-center heading color-6">
                    Your Support Group membership will be canceled!!
                </h2>
                <h4 class="col-s-12 col-m-12 col-l-12 text-center heading color-1">
                    Do you really want to continue?<br>
                    Your request will be removed from <?php echo $params['sg'][0]['name']?> once you click "Confirm" button.<br>
                    You can cancel this process by clicking "Cancel" button.
                </h4>

                <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>
                <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-5"
                       type="button"
                       onclick="popup('leaveWarning',
                       <?php echo CommonConstants::POPUP_HIDE; ?>)"
                       value="Cancel">

                <a class="link-text" href="/leaveSupportGroup?sgId=<?php echo $params['sg'][0]['id']?>">
                    <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-6"
                           type="submit"
                           onclick="popup('requestPopup', <?php echo CommonConstants::POPUP_HIDE; ?>)"
                           value="Confirm">
                </a>
                <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

            </div>
            <!--/Leave Support Group message popup-------------------------------------------------------------------->

            <a class="link-text" href="#members">
                <input class="col-s-12 col-m-2 col-l-2 bannerButton bg-color-1 color-4 border-color-4 heading  card-align-right"
                       type="button" value="Members">
            </a>

            <?php
            if (array_key_exists('events', $params) && !empty($params['events'])){
                ?>
                <a class="link-text" href="#events">
                    <input class="col-s-12 col-m-2 col-l-2 bannerButton bg-color-1 color-4 border-color-4 heading  card-align-right"
                           type="button" value="Events">
                </a>
                <?php
            }

        }
        ?>

    </div>
</div>
<!--/Banner---------------------------------------------------------------------------------------------->

<!--About------------------------------------------------------------------------------------------------>
<div id="about" class="col-l-12 col-m-12 col-s-12 normal-card shadow-1 bg-color-3">
    <h1 class="heading-text-center color-1">About Support <?php echo $params['sg'][0]['name']?></h1>
    <p class="normal-text-center color-1">
        <?php echo $params['sg'][0]['description']?>
    </p>
</div>
<!--/About----------------------------------------------------------------------------------------------->



<?php
if ($params['viewType'] == CommonConstants::USER_TYPE_NORMAL_CALLER && array_key_exists('events', $params)){

    if (!empty($params['events'])){

        ?>
        <!--Upcoming Support Group events----------------------------------------------------------------------------->
        <div id="events" class="col-l-12 col-m-12 col-s-12 bg-color-4">
        <h1 class="col-s-12 col-m-12 col-l-12 heading-text-center color-1 text-shadow">Our Events</h1>
        <div class="col-s-12 col-m-12 col-l-12">
        <?php

        foreach ($params['events'] as $event){
            ?>

            <div class="col-s-12 col-m-12 col-l-12 list-card bg-color-4 shadow-2">

                <div class="col-s-12 col-m-8 col-l-8 listInfoCard">
                    <p class="heading color-1 text-left">
                        <?php echo $event['name']?>
                    </p>
                    <p class="normal-text color-1 text-left">
                        <?php echo $event['eventDate'] ?>
                    </p>
                </div>

                <div class="col-s-12 col-m-4 col-l-4">
                    <a href="/viewSupportGroupEvent?sgId=<?php echo $params['sg'][0]['id']?>&eventId=<?php echo $event['id']?>"
                       class="col-s-12 col-m-6 col-l-6 normal-card">
                        <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-2 color-1 heading"
                               type="button" value="View">
                    </a>

                    <form class="col-s-12 col-m-5 col-l-5 normal-card" action="/participateSgEvent" method="post">
                        <input type="hidden" name="eventId" value="<?php echo $event['id']?>">
                        <input type="hidden" name="sgId" value="<?php echo $params['sg'][0]['id']?>">
                        <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-1 color-4 heading"
                               type="submit" value="Participate">
                    </form>
                </div>
            </div>

            <!--/Upcoming Support Group events---------------------------------------------------------------------------->

            <?php
        }
    }

    ?>

        </div>
    </div>

    <?php

    if (array_key_exists('participated', $params)){

        ?>
        <div class="col-l-12 col-m-12 col-s-12 bg-color-4">
            <h1 class="col-s-12 col-m-12 col-l-12 heading-text-center color-1 text-shadow">Participating Events</h1>
            <div class="col-s-12 col-m-12 col-l-12">
        <?php

        foreach ($params['participated'] as $item) {

            ?>

            <div class="col-s-12 col-m-12 col-l-12 list-card bg-color-4 shadow-2">

                <div class="col-s-12 col-m-8 col-l-8 listInfoCard">
                    <p class="heading color-1 text-left">
                        <?php echo $item['name']?>
                    </p>
                    <p class="normal-text color-1 text-left">
                        <?php echo $item['eventDate'] ?>
                    </p>
                </div>

                <?php
                //if (){}
                ?>

                <div class="col-s-12 col-m-4 col-l-4">
                    <a href="/viewSupportGroupEvent?sgId=<?php echo $params['sg'][0]['id']?>&eventId=<?php echo $item['id']?>"
                       class="col-s-12 col-m-6 col-l-6 normal-card card-align-right">
                        <input class="col-s-12 col-m-12 col-l-12 bannerButton bg-color-2 color-1 heading"
                               type="button" value="View">
                    </a>

                </div>
            </div>

            <?php
        }

        ?>
            </div>
        </div>
        <?php
    }
}

if ($params['viewType'] == CommonConstants::USER_TYPE_NORMAL_CALLER && array_key_exists('members', $params)){
?>
    <!--Members--------------------------------------------------------------------------------------------------->
    <div id="members" class="col-l-12 col-m-12 col-s-12 bg-color-4">
        <h1 class="col-s-12 col-m-12 col-l-12 heading-text-center color-1 text-shadow">Our Members</h1>


<?php

    foreach ($params['members'] as $member) {
?>
        <div class="col-s-12 col-m-12 col-l-12">

            <div class="col-s-12 col-m-12 col-l-12 list-card bg-color-5 shadow-2">

                <div class="col-s-12 col-m-8 col-l-8 listInfoCard">
                    <p class="heading color-4 text-left">
                        <?php if (!empty($member['fname']) && !empty($member['lname']))
                            echo $member['fname']." ".$member['lname']
                        ?>
                    </p>
                </div>

            </div>

        </div>
        </div>
        <!--/Members-------------------------------------------------------------------------------------------------->
<?php
    }

}
?>


<!--Team------------------------------------------------------------------------------------------------->
<div id="team" class="col-l-12 col-m-12 col-s-12 color-4 normal-card">
    <h1 class="col-s-12 col-m-12 col-l-12 heading-text-center color-1">Our Befrienders</h1>

    <div class="col-s-12 col-m-12 col-l-12 flex-card">
        <div class="col-s-12 col-m- col-l-3 flex-div text-hidden">.</div>
        <?php
        foreach ($params['befrinders'] as $befriender){

            if (empty($befriender['profile_pic'])){
                $befriender['profile_pic'] = CommonConstants::USER_DEFAULT_PROFILE_PIC;
            }
        ?>
            <div class="col-s-12 col-m-3 col-l-3 shadow-1 flex-div">
                <h2 class="heading-text-center color-1 text-shadow">
                    <?php echo $befriender['fname']." ".$befriender['lname']?>
                </h2>

                <img class="col-s-6 col-m-12 col-l-12 normal-card"
                     src="<?php echo CommonConstants::USER_PROFILE_PIC_PATH.$befriender['profile_pic']?>"
                     alt="profile picture">
            </div>
        <?php
        }
        ?>
        <div class="col-s-12 col-m-3 col-l-3 flex-div text-hidden">.</div>
    </div>

</div>
<!--/Team------------------------------------------------------------------------------------------------>

