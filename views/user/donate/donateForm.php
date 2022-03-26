<?php use util\CommonConstants; ?>
<?php //print_r($params['data']);?>
<!--Make Donation---------------------------------------------------------------------------------->
<div id="form" class="col-s-12 col-m-12 col-l-12 normal-card shadow-1 flex-card">
    <form class="col-s-12 col-m-6 col-l-6" action="https://sandbox.payhere.lk/pay/checkout" method="post" onsubmit="setOrderId('email', 'order_id')">
        <h1 class="heading-text-center color-1 text-shadow">Donation Form</h1>

        <input type="hidden" name="merchant_id" value="1219981">    <!-- Replace your Merchant ID -->
        <input type="hidden" name="return_url" value="http://1826-2402-4000-1380-bc73-c133-7ceb-27b3-9114.ngrok.io/loadDonateForm">
        <input type="hidden" name="cancel_url" value="http://1826-2402-4000-1380-bc73-c133-7ceb-27b3-9114.ngrok.io">
        <input type="hidden" name="notify_url" value="http://1826-2402-4000-1380-bc73-c133-7ceb-27b3-9114.ngrok.io/saveDonation">

        <b>
            <p class=" col-s-12 col-m-12 col-l-12 normal-text color-1">Amount(Rs): </p>
            <b><p id="amountError" class="col-s-12 col-m-12 col-l-12 color-6 normal-text text-center hide">Please enter a valid amount.</p></b>
        </b>
        <input class="col-s-12 col-m-11 col-l-11 border-color-1"
               type="number"
               name="amount"
               id="amount" value="" required><br>

        <input type="hidden" name="order_id" id="order_id" value="">
        <input type="hidden" name="items" value="Donation"><br>
        <input type="hidden" name="currency" value="LKR">
        <h3 class="col-s-12 col-m-12 col-l-12 heading color-1 ">Customer Details</h3>
        <b>
            <p class="col-s-12 col-m-12 col-l-12 normal-text color-1">First name:</p>
        </b>
        <input class="col-s-12 col-m-11 col-l-11 border-color-1" type="text" name="first_name" value="" required>
        <b>
            <p class="col-s-12 col-m-12 col-l-12 normal-text color-1">Last name:</p>
        </b>
        <input class="col-s-12 col-m-11 col-l-11 border-color-1" type="text" name="last_name" value="" required>
        <b>
            <p class="col-s-12 col-m-12 col-l-12 normal-text color-1">Email:</p>
        </b>
        <input class="col-s-12 col-m-11 col-l-11 border-color-1"
               type="email" name="email" id="email" value="" required>
        <b>
            <p class="col-s-12 col-m-12 col-l-12 normal-text color-1">Phone:</p>
        </b>
        <input class="col-s-12 col-m-11 col-l-11 border-color-1" type="text" name="phone" value="" required>
        <b>
            <p class="col-s-12 col-m-12 col-l-12 normal-text color-1">Address:</p>
        </b>
        <input class="col-s-12 col-m-11 col-l-11 border-color-1" type="text" name="address" value="" required>
        <b>
            <p class="col-s-12 col-m-12 col-l-12 normal-text color-1">City:</p>
        </b>
        <input class="col-s-12 col-m-11 col-l-11 border-color-1" type="text" name="city" value="" required>
        <input type="hidden" name="country" value="Sri Lanka"><br><br>

        <input class="col-s-12 col-m-8 col-l-6 form-button border-color-1 bg-color-1 color-4"
               id="submitBtn"
               type="button"
               value="Donate"
               onclick="isPositive('submitBtn','amount', 'amountError')">
    </form>
    <img class="col-s-0 col-m-6 col-l-6 flex-div" src="../../assets/img/Manasa/quests/donation-form.png" alt="">
</div>
<!--/Make Donation-------------------------------------------------------------------------------->