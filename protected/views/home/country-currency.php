<!-- InstanceBeginEditable name="content" -->
<!-- Begin page content -->
<div class="row-fluid">
    <div class="containerfull minheight325">
        <div class="row-fluid">
            <div class="span12 content top10px">
                <div class="row-fluid">
                    <div class="span12 text-center">
                        <h3 class="green alert alert-success">The Trader's Gateway to the Entire Forex World</h3>
                    </div>
                </div>
                <div class="row-fluid">
                    <?php
                    $this->renderPartial('left-ads');
                    ?>
                    <div class="span8 color_div">   
                        <div class="no_margin login_sys pull-right text-center minheight300">
                            <div class="myrow">
                                <div class="span12 color_div login-box">
                                    <h2 class="green font20">Enter Your Forex Countries<br><b class="font14">(or just click "Run Search")</b></h2>
                                    <form action="<?= Yii::app()->request->getBaseUrl(true) ?>/home/chooseCC" method="post" class="margintop20 dis_tab100">
                                        <div class="span7 offset3">
                                            <div class="pull-left">
                                                <input type="text" name="currency[]" id="other-text" style="width: 300px;" value="<?= Yii::app()->user->hasState('currency') ? Yii::app()->user->getState('currency') : '' ?>">
                                                <br>
                                                <span class="font12">(feel free to use connectors, e.g. "Euro" and "Easing")</span>
                                            </div>
                                            <input type="submit" class="btn btn-success btn-large pull-left" value="Run Search" style="margin-left: 10px;">
                                        </div>
                                    </form>
                                    <div class="row-fluid margintop30">
                                        <h4 class="green underline text-left">Example Countries:</h4>
                                        <?php
                                        if ($model) {
                                            foreach ($model as $i => $mo) {
                                                ?>
                                                <label class="pull-left font14 text-left color-word">
                                                    <?= $mo->title ?>
                                                </label>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php //$this->renderPartial('//layouts/right-box') ?>
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