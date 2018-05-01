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
                        <div class="no_margin login_sys pull-right text-left minheight325">
                            <div class="myrow">
                                <div class="span12">
                                    <h3 class="row-fluid">
                                        <span class="span8"><?= $art->title ?><br><small>Published on: <?=$art->date_created?></small></span>
                                        <div class="span4">
                                            <span class='st_sharethis_large' st_title='<?= $art->title ?>' st_url='<?= Yii::app()->request->getBaseUrl(true) ?>/article-<?= $art->slug ?>' displayText='ShareThis'></span>
                                            <span class='st_facebook_large' st_title='<?= $art->title ?>' st_url='<?= Yii::app()->request->getBaseUrl(true) ?>/article-<?= $art->slug ?>' displayText='Facebook'></span>
                                            <span class='st_twitter_large' st_title='<?= $art->title ?>' st_url='<?= Yii::app()->request->getBaseUrl(true) ?>/article-<?= $art->slug ?>' displayText='Tweet'></span>
                                            <span class='st_linkedin_large' st_title='<?= $art->title ?>' st_url='<?= Yii::app()->request->getBaseUrl(true) ?>/article-<?= $art->slug ?>' displayText='LinkedIn'></span>
                                            <span class='st_googleplus_large' st_title='<?= $art->title ?>' st_url='<?= Yii::app()->request->getBaseUrl(true) ?>/article-<?= $art->slug ?>' displayText='Google +'></span>
                                            <script type="text/javascript">var switchTo5x = true;</script>
                                            <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                                            <script type="text/javascript">stLight.options({publisher: "ebf579d1-ed95-47e9-8c16-2fa5d7ef21aa", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
                                        </div>
                                    </h3>
                                    <hr>
                                    <div class="row-fluid">
                                        <span><?= $art->description ?></span>
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