<link rel="stylesheet" href="<?php echo $_ENV['BASE_URL']?>/assets/css/befriender/report_popup.css">
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
            <p class="title">Fill Report Details</p>
        </div>
        <div class="container-body">
            <h4 id="report-id" class="report-item">Caller Name: Robert Pattinson</h4>

            <h4 id="report-date" class="report-item">Session Date: 22 - 12 - 2021</h4>

            <h4 id="report-time" class="report-item">Session Time: 6.00p.m.</h4>

            <h4 id="report-meeting-type" class="report-item">Session Type: Virtual Meeting</h4>

            <h4 id="report-problem-type" class="report-item">Problem Type:</h4>
            <select id="problemType" name="problemType">
                <?php
                foreach ($problems as $problem)
                    echo "<option value='{$problem["id"]}' >{$problem['name']}</option>";
                ?>
            </select>

            <div class="input-field">
                <label class="field-label" for="remark">Remark</label>
                <textarea class="textarea" rows="8" name="" id="remark"></textarea>
            </div>
            <button onclick="submitReport()" class="send-request-btn">
                SUBMIT REPORT
            </button>
        </div>
    </div>
</div>