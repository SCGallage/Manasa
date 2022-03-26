<link rel="stylesheet" href="<?php echo $_ENV['BASE_URL']?>/assets/css/befriender/sessionReport.css">
<?php require_once(__DIR__."\befriender_report_popup.php") ?>
<main>
    <div>
    <h4 class="main-item-heading">Session Reports</h4>
    <div class="main-grid-container">
        <div class="grid-item">
            <h4 class="grid-item-heading">
                Reports To Be Added
            </h4>
            <div id="pendingReports" class="grid-item-container">
                <?php
                    foreach ($reports as $report) {
                        echo "
                        <div class=\"report-add-card\">
                            <div class=\"report-card-header\">
                                <div class=\"report-date-container\">
                                    <span class=\"date-text\">{$report['day']}</span>
                                    <span class=\"month-text\">{$report['month']}</span>
                                </div>
                            </div>
                            <div class=\"report-card-body\">
                                <h4 class=\"report-name\">Meeting ID: {$report['id']}</h4>
                                <h5 class=\"report-name\">{$report['date']}</h5>
                                <h5 class=\"report-name\">{$report['startTime']} - {$report['endTime']}</h5>
                            </div>
                            <div class=\"report-card-footer\">
                                <button value='{$report['id']}' class=\"report-add-btn add-btn-clr\">Add</button>
                            </div>
                        </div>";
                    }
                ?>
                <!--<div class="report-add-card">
                    <div class="report-card-header">
                        <div class="report-date-container">
                            <span class="date-text">24</span>
                            <span class="month-text">JUN</span>
                        </div>
                    </div>
                    <div class="report-card-body">
                        <h4 class="report-name">Sanka Gallage</h4>
                        <h5 class="report-name">6.00 p.m. - 7.00 p.m.</h5>
                    </div>
                    <div class="report-card-footer">
                        <button class="report-add-btn add-btn-clr">Add</button>
                    </div>
                </div>
                <div class="report-add-card">
                    <div class="report-card-header">
                        <div class="report-date-container">
                            <span class="date-text">24</span>
                            <span class="month-text">JUN</span>
                        </div>
                    </div>
                    <div class="report-card-body">
                        <h4 class="report-name">Sanka Gallage</h4>
                        <h5 class="report-name">6.00 p.m. - 7.00 p.m.</h5>
                    </div>
                    <div class="report-card-footer">
                        <button class="report-add-btn add-btn-clr">Add</button>
                    </div>
                </div>
                <div class="report-add-card">
                    <div class="report-card-header">
                        <div class="report-date-container">
                            <span class="date-text">24</span>
                            <span class="month-text">JUN</span>
                        </div>
                    </div>
                    <div class="report-card-body">
                        <h4 class="report-name">Sanka Gallage</h4>
                        <h5 class="report-name">6.00 p.m. - 7.00 p.m.</h5>
                    </div>
                    <div class="report-card-footer">
                        <button class="report-add-btn add-btn-clr">Add</button>
                    </div>
                </div>
                <div class="report-add-card">
                    <div class="report-card-header">
                        <div class="report-date-container">
                            <span class="date-text">24</span>
                            <span class="month-text">JUN</span>
                        </div>
                    </div>
                    <div class="report-card-body">
                        <h4 class="report-name">Sanka Gallage</h4>
                        <h5 class="report-name">6.00 p.m. - 7.00 p.m.</h5>
                    </div>
                    <div class="report-card-footer">
                        <button class="report-add-btn add-btn-clr">Add</button>
                    </div>
                </div>-->
            </div>
        </div>
        <div class="grid-item">
            <h4 class="grid-item-heading">
                Already Added Report
            </h4>
            <div id="submittedReports" class="grid-item-container">
                <?php
                foreach ($submittedReports as $submittedReport) {
                    echo "
                        <div class=\"report-add-card\">
                            <div class=\"report-card-header\">
                                <div class=\"report-date-container\">
                                    <span class=\"date-text\">{$submittedReport['day']}</span>
                                    <span class=\"month-text\">{$submittedReport['month']}</span>
                                </div>
                            </div>
                            <div class=\"report-card-body\">
                                <h4 class=\"report-name\">Meeting ID: {$submittedReport['id']}</h4>
                                <h5 class=\"report-name\">{$submittedReport['date']}</h5>
                                <h5 class=\"report-name\">{$submittedReport['startTime']} - {$submittedReport['endTime']}</h5>
                            </div>
                            <div class=\"report-card-footer\">
                                <button value='{$submittedReport['id']}' class=\"report-add-btn view-btn-clr\">View</button>
                            </div>
                        </div>";
                }
                ?>
                <!--<div class="report-add-card">
                    <div class="report-card-header">
                        <div class="report-date-container">
                            <span class="date-text">24</span>
                            <span class="month-text">JUN</span>
                        </div>
                    </div>
                    <div class="report-card-body">
                        <h4 class="report-name">Sanka Gallage</h4>
                        <h5 class="report-name">6.00 p.m. - 7.00 p.m.</h5>
                    </div>
                    <div class="report-card-footer">
                        <button class="report-add-btn view-btn-clr">View</button>
                    </div>
                </div>
                <div class="report-add-card">
                    <div class="report-card-header">
                        <div class="report-date-container">
                            <span class="date-text">24</span>
                            <span class="month-text">JUN</span>
                        </div>
                    </div>
                    <div class="report-card-body">
                        <h4 class="report-name">Sanka Gallage</h4>
                        <h5 class="report-name">6.00 p.m. - 7.00 p.m.</h5>
                    </div>
                    <div class="report-card-footer">
                        <button class="report-add-btn view-btn-clr">View</button>
                    </div>
                </div>
                <div class="report-add-card">
                    <div class="report-card-header">
                        <div class="report-date-container">
                            <span class="date-text">24</span>
                            <span class="month-text">JUN</span>
                        </div>
                    </div>
                    <div class="report-card-body">
                        <h4 class="report-name">Sanka Gallage</h4>
                        <h5 class="report-name">6.00 p.m. - 7.00 p.m.</h5>
                    </div>
                    <div class="report-card-footer">
                        <button class="report-add-btn view-btn-clr">View</button>
                    </div>
                </div>
                <div class="report-add-card">
                    <div class="report-card-header">
                        <div class="report-date-container">
                            <span class="date-text">24</span>
                            <span class="month-text">JUN</span>
                        </div>
                    </div>
                    <div class="report-card-body">
                        <h4 class="report-name">Sanka Gallage</h4>
                        <h5 class="report-name">6.00 p.m. - 7.00 p.m.</h5>
                    </div>
                    <div class="report-card-footer">
                        <button class="report-add-btn view-btn-clr">View</button>
                    </div>
                </div>
                <div class="report-add-card">
                    <div class="report-card-header">
                        <div class="report-date-container">
                            <span class="date-text">24</span>
                            <span class="month-text">JUN</span>
                        </div>
                    </div>
                    <div class="report-card-body">
                        <h4 class="report-name">Sanka Gallage</h4>
                        <h5 class="report-name">6.00 p.m. - 7.00 p.m.</h5>
                    </div>
                    <div class="report-card-footer">
                        <button class="report-add-btn view-btn-clr">View</button>
                    </div>
                </div>
                <div class="report-add-card">
                    <div class="report-card-header">
                        <div class="report-date-container">
                            <span class="date-text">24</span>
                            <span class="month-text">JUN</span>
                        </div>
                    </div>
                    <div class="report-card-body">
                        <h4 class="report-name">Sanka Gallage</h4>
                        <h5 class="report-name">6.00 p.m. - 7.00 p.m.</h5>
                    </div>
                    <div class="report-card-footer">
                        <button class="report-add-btn view-btn-clr">View</button>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    </div>
</main>
<script src="<?php echo $_ENV['BASE_URL']?>/assets/js/befriender/report_modal.js"></script>
<script src="<?php echo $_ENV['BASE_URL']?>/assets/js/befriender/befriender_reports.js"></script>
