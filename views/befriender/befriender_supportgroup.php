<link rel="stylesheet" href="<?php echo $_ENV['BASE_URL']?>/assets/css/befriender/support_group.css">
<link rel="stylesheet" href="<?php echo $_ENV['BASE_URL']?>/assets/css/befriender/popup_card.css">
<link rel="stylesheet" href="<?php echo $_ENV['BASE_URL']?>/assets/css/befriender/popup_error.css">

<div class="modal-background">
    <?php require_once(__DIR__."\befriender_eventpopup.php"); ?>
</div>
<div id="event-popup"  class="modal-background">
    <?php require_once(__DIR__."\befriender_event_details.php"); ?>
</div>
<div class="modal-bg">
    <div class="modal-secondary-bg">
        <div class="flash-card">
            <svg
                    class="flash-icon"
                    width="55"
                    height="55"
                    viewBox="0 0 55 55"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
            >
                <path
                        d="M27.5 5.5C15.3505 5.5 5.5 15.3505 5.5 27.5C5.5 39.6495 15.3505 49.5 27.5 49.5C39.6495 49.5 49.5 39.6495 49.5 27.5C49.5 15.3505 39.6495 5.5 27.5 5.5ZM29.722 14.6667L29.3553 31.1667H25.6447L25.278 14.6667H29.722ZM27.5055 40.6798C25.9875 40.6798 25.08 39.8713 25.08 38.5128C25.08 37.1287 25.9857 36.3202 27.5055 36.3202C29.0125 36.3202 29.9182 37.1287 29.9182 38.5128C29.9182 39.8713 29.0125 40.6798 27.5055 40.6798Z"
                        fill="#F0E707"
                />
            </svg>
            <h3 class="flash-title">Do You Wish To Proceed?</h3>
            <h4 class="flash-description">
                Are you sure you want to accept Heather Chapmans support group
                request?
            </h4>
            <div class="button-group">
                <button class="common-button accept-button">ACCEPT</button>
                <button class="common-button cancel-button">CANCEL</button>
            </div>
        </div>
    </div>
    <div class="card-container">
        <svg
                class="close-btn"
                width="27"
                height="28"
                viewBox="0 0 27 28"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
        >
            <path
                    d="M20.25 7L6.75 21"
                    stroke="black"
                    stroke-width="3"
                    stroke-linecap="round"
                    stroke-linejoin="round"
            />
            <path
                    d="M6.75 7L20.25 21"
                    stroke="black"
                    stroke-width="3"
                    stroke-linecap="round"
                    stroke-linejoin="round"
            />
        </svg>
        <div class="card-header">
            <h4 class="card-selection">Requests</h4>
            <h4 class="card-selection">Callers</h4>
        </div>
        <div class="card-tab"></div>
        <div class="card-content">
            <div
                    data-requestid="2343"
                    id="card-container"
                    class="request-card-container"
            >
            </div>
        </div>
    </div>
</div>

<main>
    <div>
        <h2 class="main-heading">Colon Cancer Support Group</h2>
        <div class="main-grid-container">
            <div class="grid-item-events">
                <div class="event-heading">
                    <span class="event-main-heading">Upcoming Events</span>
                    <span id="event-list" class="event-sub-heading">Add Event</span>
                </div>
                <!-- <div class="event-list"> -->
                <div class="event-card-list" id="card-list">
                </div>
            </div>
            <div class="grid-item-callers">
                <div class="event-heading">
                    <span class="event-main-heading">Callers</span>
                    <span class="event-sub-heading" id="request-list"
                    >Add Callers</span
                    >
                </div>
                <div class="caller-list">
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo $_ENV['BASE_URL']?>/assets/js/befriender/script.js"></script>
<script src="<?php echo $_ENV['BASE_URL']?>/assets/js/befriender/fetch_requests.js"></script>
<script src="<?php echo $_ENV['BASE_URL']?>/assets/js/befriender/events/events.js"></script>
<!-- <script src="<?php echo $_ENV['BASE_URL']?>/assets/js/befriender/calendar.js"></script> -->
