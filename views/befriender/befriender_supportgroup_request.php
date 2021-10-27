<link rel="stylesheet" href="http://localhost/assets/css/navbaronly.css">
<link rel="stylesheet" href="http://localhost/assets/css/befriender/sg_requests.css">
<link rel="stylesheet" href="http://localhost/assets/css/befriender/popup_card.css">
<div class="modal-bg">
    <div class="container">
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
        <div class="container-header">
            <p class="title">Request Support Group</p>
            <p class="info">
                Please fill both fields in the form below to request a new support
                Group.
            </p>
        </div>
        <div class="container-body">
            <form action="/befriender/sg_request" method="post">
                <input
                        type="hidden"
                        name="befrienderId"
                        id="befrienderId"
                        value="<?=$_GET['befid'] ?>"
                />
                <div class="input-field">
                    <div
                        class="tooltip-icon"
                        data-tooltip="Provide the name you expect the support group to be called. eg: Cancer Support Group"
                    ></div>
                    <label class="field-label" for="">Support Group Name</label>
                    <input
                        class="input"
                        type="text"
                        name="name"
                        id="name"
                        placeholder="Cancer Support Group"
                    />
                    <span class="required-text">*Required</span>
                </div>
                <div class="input-field">
                    <div class="tooltip-icon" data-tooltip=""></div>
                    <label class="field-label" for="">Support Group Type</label>
                    <input class="input" type="text" name="type" id="type" />
                    <span class="required-text">*Required</span>
                </div>
                <div class="input-field">
                    <div
                        class="tooltip-icon"
                        data-tooltip="Enter number of participants you wish to have for the support group."
                    ></div>
                    <label class="field-label" for="">Number of Participants</label>
                    <input class="input" type="text" name="capacity" id="capacity" />
                    <span class="required-text">*Required</span>
                </div>
                <div class="input-field">
                    <label class="field-label" for="">Reason</label>
                    <textarea class="textarea" rows="5" name="reason" id="reason"></textarea>
                </div>
                <button type="submit" class="send-request-btn">
                    SEND REQUEST
                </button>
            </form>
        </div>
        <!-- <div class="container-footer">
                <span class="footer-text">
                    Remember Your Password?
                    <a href="" class="signin-link">Sign In</a>
                </span>
            </div> -->
    </div>
</div>
