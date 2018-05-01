<!-- InstanceBeginEditable name="content" -->
<!-- Begin page content -->
<div class="row-fluid">
    <div class="container minheight325">
        <div class="row-fluid">
            <div class="span12 content top10px">
                <div class="row-fluid">
                    <div class="span12 text-center">
                        <h3 class="colored-text font24">The Trader's Gateway to the Entire Forex World</h3>
                        <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/big-underline.png" class="margintopNeg20">
                    </div>
                </div>
                <div class="row-fluid">
                    <?php
                    $this->renderPartial('left-ads');
                    ?>
                    <div class="span8 color_div">   
                        <div class="no_margin login_sys pull-right text-center">
                            <div class="myrow">
                                <div class="span12">
                                    <h2><?=$model->title?></h2>
                                    <?=$model->details?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $this->renderPartial('right-ads');
                    ?>
                </div>
            </div><!--End Content-->
        </div>
    </div>
</div>
<!-- End page content --> 
<!-- InstanceEndEditable -->