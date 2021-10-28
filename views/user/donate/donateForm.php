<?php use util\CommonConstants; ?>
<!--Make Donation---------------------------------------------------------------------------------->
<div id="form" class="col-s-12 col-m-12 col-l-12 normal-card shadow-1 flex-card">
    <form class="col-s-12 col-m-6 col-l-6" action="./timeslots.html">
        <h1 class="heading-text-center color-1 text-shadow">Donation Form</h1>
        <b>
            <p class=" col-s-12 col-m-12 col-l-12 normal-text color-1">Amount(Rs): </p>
            <b><p id="amountError" class="col-s-12 col-m-12 col-l-12 color-6 normal-text text-center hide">Please enter a valid amount.</p></b>
        </b>
        <input class="col-s-12 col-m-11 col-l-11 border-color-1"
               type="number"
               name="<?php echo CommonConstants::DONATION_AMOUNT?>"
               id="amount" required><br>
        <b>
            <p class="col-s-12 col-m-12 col-l-12 normal-text color-1">Email:</p>
        </b>
        <input class="col-s-12 col-m-11 col-l-11 border-color-1" type="email" name="<?php echo CommonConstants::PROFILE_EMAIL?>" id="" required><br>
        <input class="col-s-12 col-m-8 col-l-6 form-button border-color-1 bg-color-1 color-4"
               type="button"
               value="Donate"
               onclick="isPositive('amount', 'amountError')">
    </form>
    <img class="col-s-0 col-m-6 col-l-6 flex-div" src="../../assets/img/Manasa/quests/quests-befriending.png" alt="">
</div>
<!--/Make Donation-------------------------------------------------------------------------------->