<style>
    .brawen-circle{
        border-color: #006146;
    }
    .bgmain{
        background: none;
        border: none;
    }
    .navbar-inner_main{
        background: none;
    }
    .signup{
        padding: 0px;
    }
    .login{
        color:#5e5e5e;
        margin-right: 25px;
        font-size: 24px;
        padding: 15px 0px;
    }
    .login-div{
        top:83px;
        right:87px;
    }
    .bg-head{
        background: url('<?= Yii::app()->request->getBaseUrl(true); ?>/img/bg-head.png') no-repeat;
        background-size: 100%;
        margin-bottom: 10px;
    }
    .bg-head h3{
        font-weight: 900;
    }
    .custom-input{
        padding: 5px 20px !important;
        width: 500px;
        margin: 0px !important;
    }
    .brawen-new{
        color:#006146;
        margin-left: 15px;
    }
    .height9{
        height: 9px !important;
    }
    .green-word, .green-word:hover, .green-word:active, .green-word:focus{
        color:#266f59;
        font-size: 14px;
        background: none;
    }
    .paddingleft15{
        padding-left:15px;
    }
    .right-div-login{
        padding: 0px;
    }
    #profile-div{
        right:90px;
    }
</style>
<!-- InstanceBeginEditable name="content" -->
<!-- Begin page content -->
<div class="row-fluid margintop10">
    <div class="row-fluid bg-head">
        <div class="span12 text-center margintop70">
            <h3 class="white font33">The Trader's Gateway to the Entire Forex World</h3>
        </div>
        <div class="row-fluid clear">
            <div class="span12 text-center">
                <form action="<?= Yii::app()->request->getBaseUrl(true) ?>/home/search" method="get" class="margintop20 marginbottom65">
                    <div class="search-border">
                        <input type="text" placeholder="Enter Your Forex Search Terms Here" name="keyword" required="" class="custom-input">
                        <button type="submit" class="search-submit"><i class="icon icon-search"></i></button>
                    </div>
                </form>
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Horizontal Banner Prime -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:728px;height:90px"
                     data-ad-client="ca-pub-1628716478426750"
                     data-ad-slot="2246483427"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row-fluid">
            <div class="span12 content top10px">
                <div class="row-fluid">
                    <?php
                    $this->renderPartial('left-ads');
                    ?>
                    <div class="span8">   
                        <div class="no_margin login_sys pull-right text-left relative">
                            <div class="row-fluid">
                                <div class="row-fluid text-center marginbottom20">
                                    <span class="font20 brawen-new"><b><i>OR, Just Click on One of the Popular Terms Below to do a Quick Search</i></b></span>
                                </div>
                                <div class="row-fluid">
                                    <div class="span12 text-center">
                                        <span class="font18 brawen-new"><b>Quick Search Terms</b></span>
                                        <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/new-hr.png" class="margintopNeg20 width100per height9">
                                        <div class="row-fluid paddingleft15">
                                            <?php
                                            $i = 0;
                                            $topics = GeneralTopic::model()->findAllByAttributes(array('active' => 1));
                                            if ($topics) {
                                                foreach ($topics as $tp) {
                                                    $cl = $i % 4 == 0 ? 'no-margin' : '';
                                                    $i++;
                                                    echo '<label class="font12 green-word span3 ' . $cl . '"><a href="' . Yii::app()->request->getBaseUrl(true) . '/home/search?keyword=' . $tp->title . '" class="font14 green-word">' . $tp->title . '</a></label>';
                                                }
                                            }
                                            $words = FocalKeyword::model()->findAllByAttributes(array('active' => 1));
                                            if ($words) {
                                                foreach ($words as $wo) {
                                                    $cl = $i % 4 == 0 ? 'no-margin' : '';
                                                    $i++;
                                                    echo '<label class="font12 green-word span3 ' . $cl . '"><a href="' . Yii::app()->request->getBaseUrl(true) . '/home/search?keyword=' . $wo->title . '" class="font14 green-word">' . $wo->title . '</a></label>';
                                                }
                                            }
                                            $counts = CountryCurrency::model()->findAllByAttributes(array('active' => 1));
                                            if ($counts) {
                                                foreach ($counts as $cn) {
                                                    $cl = $i % 4 == 0 ? 'no-margin' : '';
                                                    $i++;
                                                    echo '<label class="font12 span3 green-word ' . $cl . '"><a href="' . Yii::app()->request->getBaseUrl(true) . '/home/search?keyword=' . $cn->title . '" class="font14 green-word">' . $cn->title . '</a></label>';
                                                }
                                            }
                                            ?>
                                        </div>
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