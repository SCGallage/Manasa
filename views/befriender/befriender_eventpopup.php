<link rel="stylesheet" href="<?php echo $_ENV['BASE_URL']?>/assets/css/befriender/event_popup.css">
<script src="<?php echo $_ENV['BASE_URL']?>/assets/js/befriender/maps_script.js"></script>
<div class="modal-secondary-bg">
        <div class="main-container">
            <h4 class="main-heading">Pick a Location</h4>
            <div class="secondary-container">
              <div class="location-info">
                <input
                  id="pac-input"
                  class="controls"
                  type="text"
                  placeholder="Search Location"
                />
                <h5 class="secondary-heading">Location Details</h5>
                <div class="data-field">
                  <span class="loc-details-label">Name:</span>
                  <span class="location-details" id="location-name">Not Chosen</span>
                </div>
                <div class="data-field">
                  <span class="loc-details-label">Address:</span>
                  <span class="location-details" id="location-address">Not Chosen</span>
                </div>
                <button class="confirm-loc-btn" onclick="closeLocationModal()" >Confirm Location</button>
              </div>
              <div id="map"></div>
            </div>
          </div>
    </div>
    <div class="main-grid">
        <h1 class="main-title">Schedule Event</h1>
        <div class="flex-container">
            <div class="grid-item-01">
                <h2 class="date-title">Friday, December 24, 2021</h2>
                <div class="event-calendar">
                    <div class="time-slots">
                        <span class="time">9:00</span>
                        <span class="time">10.00</span>
                        <span class="time">11:00</span>
                        <span class="time">12:00</span>
                        <span class="time">13:00</span>
                        <span class="time">14:00</span>
                        <span class="time">15:00</span>
                        <span class="time">16:00</span>
                        <span class="time">17:00</span>
                    </div>
                    <div class="cards-list">
                    </div>
                </div>        
            </div>
            <div class="grid-item-02">
                <div class="secondary-item">
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
            <div class="event-form">
                <!-- <form action="post" class="form"> -->
                    <div class="form-field flex-field">
                        <label for="" class="field-name">Event Name</label>
                        <input type="text" placeholder="ex: Annual Meeting" class="form-input" name="eventName" id="eventName" onchange="eventNameValidation()">
                    </div>
                    <div class="form-field grid-field">
                        <label for="" class="field-name">Start Time: </label>
                        <input type="time" name="eventName" class="form-input form-input-time" id="event-start" onchange="validateStartTime()">
                        <label for="" class="field-name time-label">End Time: </label>
                        <input type="time" name="eventName" class="form-input form-input-time time-label" id="event-end" onchange="validateEndTime()" disabled>
                    </div>
                    <span id="error" class="error-msg"></span>
                    <div class="form-field-new">
                        <label for="" class="field-name">Agenda</label>
                        <textarea rows="4" placeholder="ex: Annual Meeting" class="form-input" name="eventName" id="event-agenda"></textarea>
                    </div>
                    <div class="form-field-new flex-field" id="location-div">
                        <div>
                            <label for="" class="field-name">Location</label>
                            <button class="choose-loc" onclick="openLocationModal()">ADD</button>
                        </div>
                        <h5 class="location-name">Not Chosen</h5>
                    </div>
                    <div class=".form-field-checkbox">
                        <input type="checkbox" name="notify" id="notify">
                        <span class="checkbox-text">Notify Members</span>
                    </div>
                    <div class=".form-field-checkbox">
                        <input type="checkbox" name="virtual" id="virtual" onclick="locationInputDiv()">
                        <span class="checkbox-text">Virtual Meeting</span>
                    </div>
                    <div class="btn-set">
                        <button class="form-btn submit-btn" id="submit-btn">ADD EVENT</button>
                    </div>
                <!-- </form> -->
            </div>
        </div>
        </div>
        </div>
    </div>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAndZ3I2dt-M78wuBG25yolIeBaDvrt4BU&callback=initAutocomplete&libraries=places&v=weekly"
      async
    ></script>
    <script src="<?php echo $_ENV['BASE_URL']?>/assets/js/befriender/event_calendar.js"></script>
    <script src="<?php echo $_ENV['BASE_URL']?>/assets/js/befriender/event_script.js"></script>
<script src="<?php echo $_ENV['BASE_URL']?>/assets/js/befriender/eventpage_validation.js"></script>