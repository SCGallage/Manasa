<?php

namespace util;

class CommonConstants
{
    //Session keys
    const SESSION_USER_ID = "user_id";
    const SESSION_LOGGED_IN = "loggedIn";
    //States-------------------------------------------
    const STATE_PENDING = "P";
    const STATE_ACCEPTED = "A";
    const STATE_REJECTED = "R";

    //User types---------------------------------------
    const USER_TYPE_BEFRIENDER = "Befriender";
    const USER_TYPE_NORMAL_CALLER = "Normal";
    const USER_TYPE_ANONYMOUS_CALLER = "Anonymous";
    const USER_TYPE_VOLUNTEER = "Volunteer";
    const USER_TYPE_VISITOR = "";
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
    const MEETING_TYPE_ZOOM = "Zoom";
    const MEETING_TYPE_WHATSAPP = "WhatsApp";
    const MEETING_TYPE_GOOGLE_MEET = "GoogleMeets";


    //popup signals---------------------------------------------
    const POPUP_SHOW = 1;
    const POPUP_HIDE = 0;

}