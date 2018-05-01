<div class="span2 ads">
    <?php
    $model = Advertise::model()->find(array('order' => 'rand()', 'condition' => 'active=1 and type=0'));
    if ($model) {
        echo $model->code;
    } else {
        ?>
        <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/vads.png" class="width100per">
        <?php
    }
    ?>
</div>