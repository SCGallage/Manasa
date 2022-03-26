<link rel="stylesheet" href="<?php echo $_ENV['BASE_URL']?>/assets/css/befriender/befriender_dashboard.css">
<?php require_once(__DIR__."\befriender_supportgroup_request.php") ?>
<main>

    <div class="content">
        <!-- <h1>Welcome, Ethan</h1>
        <div class="secondary-title">
          <span class="date-title" id="date-title">22 Sep 2021</span>
          <span class="time-title">9:12</span>
          <span class="time-cat">A.M.</span>
        </div> -->
        <!-- <h3>Overview</h3> -->
        <div class="grid-container">
            <div class="grid-item-01">
                <div class="flex-container">
                    <div class="appointments">
                        <div class="appointments-card card-common">
                            <h4 class="card-title">Sessions</h4>
                            <canvas
                                    class="donut-chart"
                                    id="bar-chart"
                                    height="70px"
                                    width="70px"
                            ></canvas>
                        </div>
                    </div>
                    <div class="reports">
                        <div class="reports-card card-common">
                            <div class="main-card-head">
                                <h4 class="card-title">Reports Due</h4>
                                <a href="" class="reports-link">View all</a>
                            </div>
                            <div class="sg-card">
                                <div class="sg-card-head">
                                    <h5 class="sg-name">CoreyTaylor</h5>
                                </div>
                                <div class="sg-card-body">
                                    <h6 class="sg-info">Date: 24.05.2021</h6>
                                    <h6 class="sg-info">Time: 2.00pm - 3.00pm</h6>
                                </div>
                            </div>
                            <div class="sg-card">
                                <div class="sg-card-head">
                                    <h5 class="sg-name">CoreyTaylor</h5>
                                </div>
                                <div class="sg-card-body">
                                    <h6 class="sg-info">Date: 24.05.2021</h6>
                                    <h6 class="sg-info">Time: 2.00pm - 3.00pm</h6>
                                </div>
                            </div>
                            <div class="sg-card">
                                <div class="sg-card-head">
                                    <h5 class="sg-name">CoreyTaylor</h5>
                                </div>
                                <div class="sg-card-body">
                                    <h6 class="sg-info">Date: 24.05.2021</h6>
                                    <h6 class="sg-info">Time: 2.00pm - 3.00pm</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="support-groups">
                        <div class="support-groups-card card-common">
                            <div class="main-card-head">
                                <h4 class="card-title">Support Groups</h4>
                                <button class="request-btn">Request</button>
                            </div>
                            <div class="sg-card">
                                <div class="sg-card-head">
                                    <h5 class="sg-name">Colon Cancer</h5>
                                    <a href="./supportgroup?supId=1" class="sg-link">VISIT</a>
                                </div>
                                <div class="sg-card-body">
                                    <h6 class="sg-info">Type: Cancer</h6>
                                    <h6 class="sg-info">Participants: 70</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="upcoming-appointments">
                    <!-- <h3>Upcoming</h3> -->
                    <div class="upcoming-appointments-card card-common">
                        <div class="upcoming-card-heading">
                            <h4 class="card-title">Upcoming Sessions</h4>
                        </div>
                        <table class="upcoming-sessions">
                            <thead class="table-head">
                            <tr>
                                <th class="b-radius-02">ID</th>
                                <th>Username</th>
                                <th>Date</th>
                                <th class="b-radius-01">Time</th>
                            </tr>
                            </thead>
                            <tbody class="table-body">
                            <tr>
                                <td>#098</td>
                                <td>Mantis21</td>
                                <td>2021.08.21</td>
                                <td>2.00 - 4.00</td>
                            </tr>
                            <tr>
                                <td>#099</td>
                                <td>CoreyTaylor</td>
                                <td>2021.08.24</td>
                                <td>3.00 - 5.00</td>
                            </tr>
                            <tr>
                                <td>#100</td>
                                <td>Traversy21</td>
                                <td>2021.08.26</td>
                                <td>1.00 - 2.00</td>
                            </tr>
                            <tr>
                                <td>#101</td>
                                <td>ColinPo43</td>
                                <td>2021.08.29</td>
                                <td>8.00 - 12.00</td>
                            </tr>
                            <tr>
                                <td>#101</td>
                                <td>ColinPo43</td>
                                <td>2021.08.29</td>
                                <td>8.00 - 12.00</td>
                            </tr>
                            <tr>
                                <td>#101</td>
                                <td>ColinPo43</td>
                                <td>2021.08.29</td>
                                <td>8.00 - 12.00</td>
                            </tr>
                            <tr>
                                <td>#101</td>
                                <td>ColinPo43</td>
                                <td>2021.08.29</td>
                                <td>8.00 - 12.00</td>
                            </tr>
                            <tr>
                                <td>#101</td>
                                <td>ColinPo43</td>
                                <td>2021.08.29</td>
                                <td>8.00 - 12.00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="grid-item-02">
                <div class="calendar-card">
                    <h4 class="card-title">Calendar</h4>
                    <div class="calendar">
                        <div class="calendar-header">
                            <select name="month-picker" id="month-picker">
                                <option value="0">January</option>
                                <option value="1">February</option>
                                <option value="2">March</option>
                                <option value="3">April</option>
                                <option value="4">May</option>
                                <option value="5">June</option>
                                <option value="6">July</option>
                                <option value="7">August</option>
                                <option value="8">September</option>
                                <option value="9">October</option>
                                <option value="10">November</option>
                                <option value="11">December</option>
                            </select>
                            <span class="year-change" id="prev-year"> < </span>
                            <span id="year">2021</span>
                            <span class="year-change" id="next-year"> > </span>
                            <div class="calendar-body">
                                <div class="calendar-week-day">
                                    <div>SUN</div>
                                    <div>MON</div>
                                    <div>TUE</div>
                                    <div>WED</div>
                                    <div>THU</div>
                                    <div>FRI</div>
                                    <div>SAT</div>
                                </div>
                                <div class="calendar-days"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sg-requests-card">
                    <h4 class="card-title">Support Group Requests</h4>
                    <div class="sg-request-list">

                    </div>
                    <?php
                        if (count($requests) === 0) {
                            echo '<h5 class="no-request">No Support Group Requests</h5>';
                        } else {
                            foreach ($requests as $request) {
                                echo "<div class=\"sg-card\">
                                <div class=\"sg-card-head\">
                                    <h5 class=\"sg-name\">{$request['name']}</h5>
                                    <a class=\"sg-request-pending\">PENDING</a>
                                </div>
                                <div class=\"sg-card-body\">
                                    <h6 class=\"sg-info\">Type: {$request['type']}</h6>
                                    <h6 class=\"sg-info\">Participants: {$request['capacity']}</h6>
                                </div>
                            </div>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    let data = {
        labels: ["Completed", "Remaining"],
        datasets: [
            {
                label: "My First Dataset",
                data: [300, 50],
                backgroundColor: ["#003249", "#607F8D"],
                hoverOffset: 4,
            },
        ],
    };

    new Chart(document.getElementById("bar-chart"), {
        type: "doughnut",
        data: data,
        options: {
            legend: { display: false },
            title: {
                display: true,
            },
        },
    });

    document.querySelector(".request-btn").addEventListener('click', () => {
        document.querySelector(".modal-bg").classList.add("display");
    });

    document.querySelector(".close-btn").addEventListener('click', () => {
        document.querySelector(".modal-bg").classList.remove("display");
    });
</script>
<script src="<?php echo $_ENV['BASE_URL']?>/assets/js/befriender/calendar.js"></script>
