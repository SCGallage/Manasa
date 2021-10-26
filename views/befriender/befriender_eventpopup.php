<link rel="stylesheet" href="http://localhost/assets/css/befriender/event_popup.css">
<div class="container">
        <div class="calendar">
            <h3 class="calendar-title">Add Event</h3>
            <div class="calendar-header">
                <select name="month-picker" id="month-picker" hidden>
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
                <div class="calendar-controls">
                    <span class="year-change prev" id="prev-year">PREV</span>
                    <span id="year">2021</span>
                    <span class="year-change next" id="next-year">NEXT</span>
                </div>
                <div class="calendar-body">
                    <div class="calendar-week-day">
                        <div class="day">SUN</div>
                        <div class="day">MON</div>
                        <div class="day">TUE</div>
                        <div class="day">WED</div>
                        <div class="day">THU</div>
                        <div class="day">FRI</div>
                        <div class="day">SAT</div>
                    </div>
                    <div class="calendar-days"></div>
                </div>
            </div>
        </div>
        <div class="event-container">
            <h4 class="event-list-heading">Events</h4>
            <div class="event-list">
                <div class="event-add-card">
                    <h5 class="event-card-title">Annual Meet Up</h5>
                    <div class="event-info">
                        <h5 class="event-detail">Date: 02.12.2021</h5>
                        <h5 class="event-detail">Time: 2.00p.m. - 4.00p.m.</h5>
                        <h5 class="event-detail">Type: Virtual Meeting</h5>
                    </div>
                </div>
            </div>
            <h4 class="event-heading">Event Details</h4>
            <div class="event-form">
                <div class="form-field">
                    <label for="" class="field-name">Event Name</label>
                    <input type="text" class="input-field" />
                </div>
                <div class="form-field">
                    <label for="" class="field-name">Date</label>
                    <input type="date" class="input-field" />
                </div>
                <div class="time-fields">
                    <div class="form-field">
                        <label for="" class="field-name">From</label>
                        <input type="text" class="time-input-field" />
                    </div>
                    <div class="form-field addtional">
                        <label for="" class="field-name">To</label>
                        <input type="text" class="time-input-field" />
                    </div>
                </div>
                <div class="event-options">
                    <input type="checkbox" name="" id="" /><span class="checkbox-text"
                    >Virtual Meeting</span
                    >
                </div>
                <div class="event-options">
                    <input type="checkbox" name="" id="" /><span class="checkbox-text"
                    >Inform Members</span
                    >
                </div>
                <div class="form-field">
                    <label for="" class="field-name">Agenda</label>
                    <textarea
                        type="text"
                        class="input-field-textarea"
                        rows="6"
                    ></textarea>
                </div>
                <button class="add-event-btn">ADD EVENT</button>
            </div>
        </div>
</div>
