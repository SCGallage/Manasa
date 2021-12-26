<!--Warning message popup GET--------------------------------------------------------------------->
<div id="popup" class="col-s-7 col-m-8 col-l-6 popup-card list-card shadow-2 border-color-1 bg-color-4">
    <h2 id="title" class="col-s-12 col-m-12 col-l-12 text-center heading color-6">

    </h2>
    <h4 id="subTitle" class="col-s-12 col-m-12 col-l-12 text-center heading color-1"></h4>
    <h4 id="message" class="col-s-12 col-m-12 col-l-12 text-center heading color-1"></h4>

    <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>
    <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-5"
           type="button"
           onclick="popup('popup', <?php echo \util\CommonConstants::POPUP_HIDE; ?>)"
           value="Cancel">

    <a id="link" href="">
        <input class="col-s-12 col-m-5 col-l-4 bannerButton color-4 normal-text bg-color-1"
               type="submit"
               onclick="popup('popup', <?php echo \util\CommonConstants::POPUP_HIDE; ?>)"
               value="Continue">
    </a>
    <div class="col-s-0 col-m-1 col-l-2 color-0">.</div>

</div>
<!--/Warning message popup GET-------------------------------------------------------------------->
