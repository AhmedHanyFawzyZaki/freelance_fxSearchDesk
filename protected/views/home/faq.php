<!-- InstanceBeginEditable name="content" -->
<!-- Begin page content -->

<script>
    function changeCursor(val){
        if($('#cursor-'+val).hasClass('icon-chevron-down')){
            $('#cursor-'+val).removeClass('icon-chevron-down');
            $('#cursor-'+val).addClass('icon-chevron-up');
        }else{
            $('#cursor-'+val).removeClass('icon-chevron-up');
            $('#cursor-'+val).addClass('icon-chevron-down');
        }
    }
</script>

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
                                    <h2>FAQ</h2>
                                    <div class="accordion" id="accordion2">
                                        <?php
                                        if ($faqs) {
                                            foreach ($faqs as $fq) {
                                                ?>
                                                <div>
                                                    <div class="borderbottomgreen padding5">
                                                        <a class="faqgreen text-left row-fluid" data-toggle="collapse" data-parent="#accordion2" href="#<?= $fq->id ?>" onclick="changeCursor(<?=$fq->id?>)">
                                                            <span class="span11 font16"><?= $fq->question ?></span>
                                                            <i class="icon icon-chevron-down span1 text-right" id="cursor-<?=$fq->id?>"></i>
                                                        </a>
                                                    </div>
                                                    <div id="<?= $fq->id ?>" class="accordion-body collapse margintop10">
                                                        <div class="text-left">
                                                            <?= $fq->answer ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
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