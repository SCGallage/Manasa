<div class="col-s-12 col-m-12 col-l-12 list-card shadow-2 bg-color-3">

    <h1 class="col-s-12 col-m-12 col-l-12 heading color-1 text-center">Call Now</h1>
    <h3 class="col-s-12 col-m-12 col-l-12 heading color-1 text-center">Please use one of these contacts to call.</h3>
    <div class="col-s-1 col-m-3 col-l-4 text-hidden">.</div>
    <div class="col-s-10 col-m-6 col-l-4">
        <?php

        if (array_key_exists('contacts', $params)) {

            $i = 1;
            foreach ($params['contacts'] as $contact) {
                ?>
                <p class="col-s-5 col-m-5 col-l-5 text-right heading color-1">
                    <?php echo "Contact - 0".$i ?>
                </p>
                <p class="col-s-1 col-m-1 col-l-1 heading color-1">
                    :
                </p>
                <p class="col-s-6 col-m-6 col-l-6 heading color-1">
                    <?php echo $contact['contact_number']?>
                </p>
                <?php
                $i += 1;
            }
        }
        ?>


        <a href="/cancelCallNow?id=<?php echo $params['befriender']['id'] ?>">
            <input class="col-s-12 col-m-12 col-l-12 bannerButton color-4 heading bg-color-1 normal-card"
                   type="button"
                   value="Cancel Meeting">
        </a>

    </div>
    <div class="col-s-1 col-m-3 col-l-4 text-hidden">.</div>
</div>

