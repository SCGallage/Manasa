<link rel="stylesheet" href="http://localhost/assets/css/befriender/schedule_page.css">
<link rel="stylesheet" href="http://localhost/assets/css/befriender/schedule_popup.css">
<div class="modal-bg">
    <?php require_once(__DIR__."\befriender_popup_schedule_reserve.php") ?>
</div>
<main>
    <div class="layout-container">
        <h4 class="grid-item-heading">Schedule Selection</h4>
        <div class="main-grid-container-01">
            <div class="grid-container-01">
                <div></div>
                <div class="grid-item-day">
                    <span class="day">MONDAY</span>
                    <span class="date">18.05.2021</span>
                </div>
                <div class="grid-item-day">
                    <span class="day">TUESDAY</span>
                    <span class="date">19.05.2021</span>
                </div>
                <div class="grid-item-day">
                    <span class="day">WEDNESDAY</span>
                    <span class="date">20.05.2021</span>
                </div>
                <div class="grid-item-day">
                    <span class="day">THURSDAY</span>
                    <span class="date">21.05.2021</span>
                </div>
                <div class="grid-item-day">
                    <span class="day">FRIDAY</span>
                    <span class="date">22.05.2021</span>
                </div>
                <div class="grid-item-day">
                    <span class="day">SATURDAY</span>
                    <span class="date">23.05.2021</span>
                </div>
                <div class="grid-item-day">
                    <span class="day">SUNDAY</span>
                    <span class="date">24.05.2021</span>
                </div>
            </div>
            <div class="grid-container-02">
                <div class="grid-item-time">
                    <span class="time-start">9.00</span>
                    <span class="time-end">12.00</span>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0089</span>
                    <span class="slot-remain">Remaining: 3</span>
                    <div class="labels">
                        <span class="label-available">AVAILABLE</span>
                        <span class="label-reserved">RESERVED</span>
                    </div>
                    <button class="view-btn" id="remove-reserve-btn">VIEW</button>
                </div>
                <div class="grid-item-slot success">
                    <span class="slot-id">Slot #0090</span>
                    <span class="slot-remain">Remaining: 0</span>
                    <div class="lables">
                        <span class="label-closed">CLOSED</span>
                    </div>
                    <button class="view-btn" id="transfer-btn">VIEW</button>
                </div>
                <div class="grid-item-slot danger">
                    <span class="slot-id">Slot #0091</span>
                    <span class="slot-remain">Remaining: 0</span>
                    <div class="lables">
                        <span class="label-closed">CLOSED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot pending">
                    <span class="slot-id">Slot #0092</span>
                    <span class="slot-remain">Remaining: 2</span>
                    <div class="labels">
                        <span class="label-available">AVAILABLE</span>
                        <span class="label-reserved">RESERVED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot disabled">
                    <span class="slot-id">Slot #0093</span>
                    <span class="slot-remain">Remaining: 5</span>
                    <div class="labels">
                        <span class="label-available">AVAILABLE</span>
                        <span class="label-reserved">RESERVED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0094</span>
                    <span class="slot-remain">Remaining: 0</span>
                    <div class="lables">
                        <span class="label-closed">CLOSED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0095</span>
                    <span class="slot-remain">Remaining: 0</span>
                    <div class="lables">
                        <span class="label-closed">CLOSED</span>
                        <span class="label-reserved">RESERVED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-time">
                    <span class="time-start">13.00</span>
                    <span class="time-end">15.00</span>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0096</span>
                    <span class="slot-remain">Remaining: 5</span>
                    <div class="labels">
                        <span class="label-available">AVAILABLE</span>
                    </div>
                    <button class="view-btn" id="reserve-btn">VIEW</button>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0097</span>
                    <span class="slot-remain">Remaining: 0</span>
                    <div class="lables">
                        <span class="label-closed">CLOSED</span>
                        <span class="label-reserved">RESERVED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0098</span>
                    <span class="slot-remain">Remaining: 0</span>
                    <div class="lables">
                        <span class="label-closed">CLOSED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0099</span>
                    <span class="slot-remain">Remaining: 4</span>
                    <div class="labels">
                        <span class="label-available">AVAILABLE</span>
                        <span class="label-reserved">RESERVED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0100</span>
                    <span class="slot-remain">Remaining: 0</span>
                    <div class="lables">
                        <span class="label-closed">CLOSED</span>
                        <span class="label-reserved">RESERVED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0101</span>
                    <span class="slot-remain">Remaining: 0</span>
                    <div class="lables">
                        <span class="label-closed">CLOSED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0102</span>
                    <span class="slot-remain">Remaining: 5</span>
                    <div class="labels">
                        <span class="label-available">AVAILABLE</span>
                        <span class="label-reserved">RESERVED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
            </div>
        </div>
        <div class="main-grid-container-01">
            <div class="grid-container-01">
                <div></div>
                <div class="grid-item-day">
                    <span class="day">MONDAY</span>
                    <span class="date">25.05.2021</span>
                </div>
                <div class="grid-item-day">
                    <span class="day">TUESDAY</span>
                    <span class="date">26.05.2021</span>
                </div>
                <div class="grid-item-day">
                    <span class="day">WEDNESDAY</span>
                    <span class="date">27.05.2021</span>
                </div>
                <div class="grid-item-day">
                    <span class="day">THURSDAY</span>
                    <span class="date">28.05.2021</span>
                </div>
                <div class="grid-item-day">
                    <span class="day">FRIDAY</span>
                    <span class="date">29.05.2021</span>
                </div>
                <div class="grid-item-day">
                    <span class="day">SATURDAY</span>
                    <span class="date">30.05.2021</span>
                </div>
                <div class="grid-item-day">
                    <span class="day">SUNDAY</span>
                    <span class="date">31.05.2021</span>
                </div>
            </div>
            <div class="grid-container-02">
                <div class="grid-item-time">
                    <span class="time-start">9.00</span>
                    <span class="time-end">12.00</span>
                </div>

                <div class="grid-item-slot success">
                    <span class="slot-id">Slot #0103</span>
                    <span class="slot-remain">Remaining: 0</span>
                    <div class="lables">
                        <span class="label-closed">CLOSED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0104</span>
                    <span class="slot-remain">Remaining: 3</span>
                    <div class="labels">
                        <span class="label-available">AVAILABLE</span>
                        <span class="label-reserved">RESERVED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot danger">
                    <span class="slot-id">Slot #0105</span>
                    <span class="slot-remain">Remaining: 0</span>
                    <div class="lables">
                        <span class="label-closed">CLOSED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot disabled">
                    <span class="slot-id">Slot #0106</span>
                    <span class="slot-remain">Remaining: 5</span>
                    <div class="labels">
                        <span class="label-available">AVAILABLE</span>
                        <span class="label-reserved">RESERVED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0107</span>
                    <span class="slot-remain">Remaining: 0</span>
                    <div class="lables">
                        <span class="label-closed">CLOSED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot pending">
                    <span class="slot-id">Slot #0108</span>
                    <span class="slot-remain">Remaining: 2</span>
                    <div class="labels">
                        <span class="label-available">AVAILABLE</span>
                        <span class="label-reserved">RESERVED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0109</span>
                    <span class="slot-remain">Remaining: 0</span>
                    <div class="lables">
                        <span class="label-closed">CLOSED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-time">
                    <span class="time-start">13.00</span>
                    <span class="time-end">15.00</span>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0110</span>
                    <span class="slot-remain">Remaining: 0</span>
                    <div class="lables">
                        <span class="label-closed">CLOSED</span>
                        <span class="label-reserved">RESERVED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0111</span>
                    <span class="slot-remain">Remaining: 5</span>
                    <div class="labels">
                        <span class="label-available">AVAILABLE</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0112</span>
                    <span class="slot-remain">Remaining: 5</span>
                    <div class="labels">
                        <span class="label-available">AVAILABLE</span>
                        <span class="label-reserved">RESERVED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0113</span>
                    <span class="slot-remain">Remaining: 0</span>
                    <div class="lables">
                        <span class="label-closed">CLOSED</span>
                        <span class="label-reserved">RESERVED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0114</span>
                    <span class="slot-remain">Remaining: 4</span>
                    <div class="labels">
                        <span class="label-available">AVAILABLE</span>
                        <span class="label-reserved">RESERVED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0115</span>
                    <span class="slot-remain">Remaining: 0</span>
                    <div class="lables">
                        <span class="label-closed">CLOSED</span>
                        <span class="label-reserved">RESERVED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
                <div class="grid-item-slot">
                    <span class="slot-id">Slot #0116</span>
                    <span class="slot-remain">Remaining: 0</span>
                    <div class="lables">
                        <span class="label-closed">CLOSED</span>
                    </div>
                    <button class="view-btn">VIEW</button>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="http://localhost/assets/js/befriender/schedule_popups.js"></script>