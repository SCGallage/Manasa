<?php
?>

@extends('main')
@section('content')

<form action="" class="form1">
    <div class="col-l-12 col-m-12 col-s-12 padding-top">
        <label for="name" class="text-style3">Support Group Name:</label>
    </div>
    <div class="col-l-12 col-m-12 col-s-12">
        <input type="text" id="fname" name="fname" value="">
    </div>

    <div class="col-l-12 col-m-12 col-s-12 padding-top">
        <label for="name" class="text-style3">Facilitator:</label>
    </div>
    <div class="col-l-12 col-m-12 col-s-12">
        <input type="text" id="fname" name="fname" value="">
    </div>

    <div class="col-l-12 col-m-12 col-s-12 padding-top">
        <label for="name" class="text-style3">Co-Facilitator:</label>
    </div>
    <div class="col-l-12 col-m-12 col-s-12 ">
        <input type="text" id="fname" name="fname" value="">
    </div>

    <div class="col-l-12 col-m-12 col-s-12 padding-top">
        <label for="name" class="text-style3">Maximum Participants:</label>
    </div>
    <div class="col-l-12 col-m-12 col-s-12 ">
        <input type="text" id="fname" name="fname" value="">
    </div>

    <div class="col-l-12 col-m-12 col-s-12 flex-container padding-top">
        <div class="col-l-6 col-m-12 col-s-12 padding-right flex-container2">
            <div class="col-l-12 col-m-12 col-s-12">
                <label for="Date" class="text-style3">State:</label>
            </div>
            <div class="col-l-12 col-m-12 col-s-12">
                <select name="reportType" id="reportType" class="select2">
                    <option value="vol">Active</option>
                    <option value="don">Inactive</option>
                </select>
            </div>
        </div>
        <div class="col-l-6 col-m-12 col-s-12 padding-left flex-container2">
            <div class="col-l-12 col-m-12 col-s-12">
                <label for="Date" class="text-style3">Type:</label>
            </div>
            <div class="col-l-12 col-m-12 col-s-12">
                <input type="text" id="date" name="date" value="">
            </div>
        </div>
    </div>

    <div class="col-l-12 col-m-12 col-s-12 padding-top">
        <label for="name" class="text-style3">Information:</label>
    </div>
    <div class="col-l-12 col-m-12 col-s-12 ">
        <textarea id="" name="" rows="4" cols="50"></textarea>
    </div>

    <div class="col-l-12 col-m-12 col-s-12 padding-top">
        <input type="submit" value="Submit">
    </div>

</form>
@stop
