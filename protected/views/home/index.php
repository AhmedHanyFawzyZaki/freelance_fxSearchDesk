<style>
    body{
        background: url(<?= Yii::app()->request->getBaseUrl(true) ?>/img/background.png);
        background-size: 100%;
    }
    .bgmain, .navbar-inner_main, footer, .foot-last{
        background: none;
    }
    .brawen{
        color:#b48d39;
    }
    .green{
        color:#fff;
    }
    .place{
        box-shadow:none;
        border: none;
        background-color:rgba(0, 0, 0, 0.5);
        display: table;
        border-radius: 25px 25px 0px 0px;
        height: 160px !important;
    }
    .place h3 {
        border-bottom: 1px solid #626664;
        font-size: 20px;
        letter-spacing: 1px;
        padding: 0 20px 10px;
    }
    .place h4 {
        padding: 10px 20px;
        font-size: 16px;
        letter-spacing: 0.7px;
    }
    .brawen-circle {
        border: 25px solid #93783f;
        border-radius: 50px;
        left: 39%;
        position: absolute;
        top: -25px;
        z-index: -1;
    }
    .footer-color{
        color:#fff;
    }
    .pos-right{
        text-align: right;
    }
    .pos-left{
        margin-left: 0px !important;
        border-left: 1px solid;
    }
    .index-left{
        float: left !important;
        padding-left:20px;
    }
    .borderbottom{
        border-bottom: 1px solid #6c6635;
    }
    .footer-hr{
        display: none;
    }
</style>
<!-- InstanceBeginEditable name="content" -->
<!-- Begin page content -->
<div class="row-fluid margintop50">
    <div class="container">
        <div class="row-fluid">
            <div class="span12 content top10px">
                <div class="row-fluid">
                    <div class="span12 text-center">
                        <h3 class="white font33 letterspace">The Trader's Gateway to the Entire Forex World</h3>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span10 offset1">   
                        <div class="no_margin login_sys pull-right text-center relative">
                            <div class="myrow">
                                <div class="span12 text-center">
                                    <form action="<?= Yii::app()->request->getBaseUrl(true) ?>/home/searchResult" method="get" class="margintop20">
                                        <input type="text" placeholder="Enter Your Forex Search Terms Here" name="keyword" class="custom-input">
                                        <input type="submit" class="btn btn-large btn-custom" value="Search" class="height40">
                                        <br>
                                        <span onclick="$('#samples').toggle(500);" class="custom-link">Click Here for Sample Search Terms &nbsp;<i class="arrow-down"></i></span>
                                    </form>
                                </div>
                            </div>
                            <div class="row-fluid hide" id="samples">
                                <div class="row-fluid">
                                    <div class="span4">
                                        <span class="font14 brawen"><b>Sample General Forex Topics</b></span>
                                        <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/custom-hr.png" class="margintopNeg20 width100per">
                                    </div>
                                    <div class="span4">
                                        <span class="font14 brawen"><b>Sample General Forex Keywords</b></span>
                                        <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/custom-hr.png" class="margintopNeg20 width100per">
                                    </div>
                                    <div class="span4">
                                        <span class="font14 brawen"><b>Sample Countries and Currencies</b></span><label class="icon icon-remove-circle pull-right" onclick="$('#samples').hide(1000);"></label>
                                        <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/custom-hr.png" class="margintopNeg20 width100per">
                                    </div>
                                </div>
                                <div class="row-fluid scroll-tags">
                                    <div class="span4">
                                        <?php
                                        $topics = GeneralTopic::model()->findAllByAttributes(array('active' => 1));
                                        if ($topics) {
                                            foreach ($topics as $tp) {
                                                echo '<label class="font14 color-word">' . $tp->title . '</label>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="span4">
                                        <?php
                                        $words = FocalKeyword::model()->findAllByAttributes(array('active' => 1));
                                        if ($words) {
                                            foreach ($words as $i => $wo) {
                                                $cl = $i % 3 == 0 ? 'no-margin' : '';
                                                echo '<label class="font12 green-word span4 ' . $cl . '">' . $wo->title . '</label>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="span4">
                                        <?php
                                        $counts = CountryCurrency::model()->findAllByAttributes(array('active' => 1));
                                        if ($counts) {
                                            foreach ($counts as $i => $cn) {
                                                $cl1 = $i % 3 == 0 ? 'no-margin' : '';
                                                echo '<label class="font12 span4 green-word ' . $cl1 . '">' . $cn->title . '</label>';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--End Content-->
        </div>
    </div>
</div>
<!-- End page content --> 
<!-- InstanceEndEditable -->