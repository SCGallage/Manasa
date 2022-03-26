<?php

namespace util;

class CommonConstants
{
    //Session keys
    const SESSION_USER_ID = "user_id";
    const SESSION_LOGGED_IN = "loggedIn";
    //States-------------------------------------------
    const STATE_PENDING = 0;
    const STATE_ACCEPTED = 1;
    const STATE_FINISHED = 1;
    const STATE_REJECTED = 2;
    const STATE_AVAILABLE = 1;
    const STATE_NOT_AVAILABLE = 0;

    //Volunteer event types
    const VOLUNTEER_EVENT_TYPE_OPEN = 1;
    const VOLUNTEER_EVENT_TYPE_EXCLUSIVE = 0;
    const VOLUNTEER_EVENT_CANCEL_LIMIT = 2;

    //Support group event types
    const SG_EVENT_TYPE_VIRTUAL = "Virtual";
    const SG_EVENT_TYPE_PHYSICAL = "Physical";

    //limits
    const RESERVATION_LIMIT ="callerReservationLimit";

    //user image paths
    const USER_PROFILE_PIC_PATH = "file_storage/profile_pictures/";
    const USER_DEFAULT_PROFILE_PIC = "defaultUser.png";

    //message types------------------------------------
    const MESSAGE_TYPE_ERROR = 0;
    const MESSAGE_TYPE_SUCCESS = 1;

    //link types---------------------------------------
    const LINK_TYPE_GET = 0;
    const LINK_TYPE_POST = 1;

    //User types---------------------------------------
    const USER_TYPE_BEFRIENDER = "Befriender";
    const USER_TYPE_NORMAL_CALLER = "Normal";
    const USER_TYPE_ANONYMOUS_CALLER = "Anonymous";
    const USER_TYPE_VOLUNTEER = "Volunteer";
    const USER_TYPE_VISITOR = "visitor";
    const USER_TYPE_MODERATOR = "";
    const USER_TYPE_ADMIN = "Administrator";

    //Form names---------------------------------------
    const USER_USERNAME = "username";
    const USER_USERID = "user_id";
    const USER_PASSWORD ="password";
    const USER_STATE = "state";
    const USER_GENDER_MALE = "Male";
    const USER_GENDER_FEMALE = "Female";
    const USER_GENDER_OTHER = "other";
    const DONATION_AMOUNT = "amount";



    const PROFILE_FNAME = "fname";
    const PROFILE_LNAME = "lname";
    const PROFILE_DATE_OF_BIRTH = "dob";
    const PROFILE_GENDER = "gender";
    const PROFILE_MEETING_TYPE = "meeting_type";
    const PROFILE_EMAIL = "email";
    const PROFILE_PHONE = "phone";
    const PROFILE_CONFIRM_PASSWORD = "confirm_password";

    //Meeting types---------------------------------------------
    const MEETING_TYPE_CALL_NOW = "Call_Now";
    const MEETING_TYPE_ZOOM = "Zoom";
    const MEETING_TYPE_WHATSAPP = "WhatsApp";
    const MEETING_TYPE_PHONE_CALL = "Phone call";
    const MEETING_TYPES_ARRAY = array(self::MEETING_TYPE_ZOOM,
                                      self::MEETING_TYPE_WHATSAPP,
                                      self::MEETING_TYPE_PHONE_CALL);

    //view types
    const VIEW_TYPE = "viewType";
    const VIEW_APPOINTMENT_LINK = "link";



    //table columns----------------------------------------------
    /*//common
    const TABLE_COLUMN_ID = "id";
    const TABLE_COLUMN_DATE = "date";
    const TABLE_COLUMN_TIME = "time";
    const TABLE_COLUMN_STATE = "state";
    */
    //meeting table
    const MEETING_TABLE_ID = "id";
    const MEETING_TABLE_DATE = "date";
    const MEETING_TABLE_COLUMN_TIME = "time";
    const MEETING_TABLE_STATE = "state";
    const MEETING_TABLE_TIMESLOT_ID = "timeslotId";
    const MEETING_TABLE_MEETING_TYPE = "meeting_type";

    //timeslot table
    const TIMESLOT_TABLE_ID = "timeslotId";
    const TIMESLOT_TABLE_START_TIME = "startTime";
    const TIMESLOT_TABLE_END_TIME = "endTime";
    const TIMESLOT_TABLE_SHIFT_ID = "shiftId";
    const TIMESLOT_TABLE_NUM_OF_RESERVATIONS = "num_reservations";

    //shift table
    const SHIFT_TABLE_ID = "shiftId";
    const SHIFT_TABLE_START_TIME = "startTime";
    const SHIFT_TABLE_END_TIME = "endTime";
    const SHIFT_TABLE_DATE = "date";
    const SHIFT_TABLE_SCHEDULE_ID = "scheduleId";
    const SHIFT_TABLE_STATE = "state";
    const SHIFT_TABLE_NUM_OF_BEFRIENDERS = "num_of_befrienders";

    //schedule table
    const SCHEDULE_TABLE_ID = "scheduleId";
    const SCHEDULE_TABLE_START_DATE = "startDate";
    const SCHEDULE_TABLE_END_DATE = "endDate";

    //sg_enrollrequest
    const SG_ENROLL_REQUEST_TABLE_SG_ID = "supportGroupId";
    const SG_ENROLL_REQUEST_TABLE_CALLER_ID = "callerId";
    const SG_ENROLL_REQUEST_TABLE_STATE = "state";
    const SG_ENROLL_REQUEST_TABLE_MEETING = "meeting";

    //supportgroup table
    const SG_TABLE_ID = "id";
    const SG_TABLE_NAME = "name";
    const SG_TABLE_TYPE = "type";
    const SG_TABLE_DESCRIPTION = "description";
    const SG_TABLE_FACILITATOR = "facilitator";
    const SG_TABLE_CO_FACILITATOR = "co_facilitator";
    const SG_TABLE_STATE = "state";
    const SG_TABLE_MEMBERS = "participants";




    //popup signals---------------------------------------------
    const POPUP_SHOW = 1;
    const POPUP_HIDE = 0;

}