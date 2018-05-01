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
                                    <h2 class="green font28">Pick a General Forex Topic</h2>
                                    <form action="<?= Yii::app()->request->getBaseUrl(true) ?>/home/chooseTopic" method="post">
                                        <div class="row-fluid margintop30">
                                            <?php
                                            if ($model) {
                                                foreach ($model as $i => $mo) {
                                                    $selected = $mo->id;
                                                    if (Yii::app()->user->hasState('topic'))
                                                        $selected = Yii::app()->user->getState('topic');
                                                    ?>
                                                    <div class="span3 <?= $i % 4 == 0 ? 'no-margin' : '' ?>">
                                                        <label class="radio pull-left font16 text-left">
                                                            <input type="radio" class="margintop5" name="topic" value="<?= $mo->id ?>" <?= $selected == $mo->id ? 'checked' : '' ?>>
                                                            <?= $mo->title ?>
                                                        </label>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="row-fluid">
                                            <br>
                                            <input type="submit" class="btn btn-success btn-large pull-right" value="Proceed">
                                        </div>
                                    </form>
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