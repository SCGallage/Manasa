<?php
    use \util\CommonConstants;
    $titleColor = "color-6";
    //print_r($params);
    if ($params['messageType'] == CommonConstants::MESSAGE_TYPE_SUCCESS) $titleColor = "color-1";
?>

<div class="col-s-12 col-m-12 col-l-12 list-card bg-color-3 text-center">
    <h1 class="col-s-12 col-m-12 col-l-12 text-center heading <?php echo $titleColor?>">
        <?php echo $params['title']?>
    </h1>
    <p class="col-s-12 col-m-12 col-l-12 text-center color-1 normal-text">
        <?php echo $params['message']?>
    </p>
    <div class="col-s-0 col-m-4 col-l-5 text-hidden">.</div>

    <?php
    if ($params['linkType'] == CommonConstants::LINK_TYPE_GET){

        $tailLink = "";

        //check array empty or not
        if (!empty($params['request'])){
            foreach ($params['request'] as $key => $value) {
                $tailLink = $tailLink."?".$key."=".$value;
            }
        }
    ?>
    <a class="col-s-12 col-m-4 col-l-2 link-text bannerButton bg-color-1 color-4"
       href="<?php echo $params['link'].$tailLink?>">Ok</a>

    <?php
    }

    if ($params['linkType'] == CommonConstants::LINK_TYPE_POST){
    ?>
    <form method="post"
          class="col-s-12 col-m-4 col-l-2"
          action="<?php echo $params['link']?>">
        <?php
        //check array empty or not
        if (!empty($params['request'])){
            foreach ($params['request'] as $key => $value) {
        ?>
                <input type="hidden"
                       name="<?php echo $key?>"
                       value="<?php echo $value?>">
        <?php
            }
        }
        ?>
        <input type="submit"
               value="Ok"
               class="col-s-12 col-m-12 col-l-12 link-text bannerButton bg-color-1 color-4">
    </form>
    <?php
    }
    ?>

    <div class="col-s-0 col-m-4 col-l-5 text-hidden">.</div>
</div>
