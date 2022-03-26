<link rel="stylesheet" href="<?php echo $_ENV['BASE_URL']?>/assets/css/befriender/schedule_page.css">
<link rel="stylesheet" href="<?php echo $_ENV['BASE_URL']?>/assets/css/befriender/schedule_popup.css">
<div class="modal-bg">
    <?php require_once(__DIR__."\befriender_popup_schedule_reserve.php") ?>
</div>
<main>
    <div class="layout-container">
        <div class="layout-container">
            <h4 class="grid-item-heading">Schedule Selection</h4>
            <div class="main-grid-container-01">
                <div class="grid-container-01" id="date-week-one">
                    <div></div>
                </div>
                <div class="grid-container-02" id="slot-row-one"></div>
            </div>
            <div class="main-grid-container-01">
                <div class="grid-container-01" id="date-week-two">
                    <div></div>
                </div>
                <div class="grid-container-02" id="slot-row-two"></div>
            </div>
        </div>
</main>
<script src="<?php echo $_ENV['BASE_URL']?>/assets/js/befriender/schedule_popups.js"></script>