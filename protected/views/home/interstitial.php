<div class="se-pre-con row-fluid">
    <div class="span6 offset3 se-pre-con-container">
        <div class="se-pre-inner">
            <!--<h3><i>JUST ONE MORE QUESTION…</i></h3>-->
            <h3 class="font20"><i>As We Prepare Your Search Results, Please Tell Us:</i></h3>
            <!--<h4>Which of the terms below is most relevant to your search?</h4>-->
            <h4>Are any of the forex subjects below also of interest to you? (please pick one)</h4>
            <hr>
            <!--<p><i>Answering will enhance your search experience and allow us to show you something that may dramatically improve your trading results!</i></p>-->
            <p><i>Answering will allow us to enhance your search experience.</i></p>
        </div>
        <div class="row-fluid">
            <table class="table no-margin">
                <tr>
                    <?php
                    $words = AdsKeyword::model()->findAll(array('condition' => 'active=1 and id not in(5,6)'));
                    if ($words) {
                        $w_num = count($words) - 1;
                        foreach ($words as $i => $wd) {
                            $ad = AdsKeywordLink::model()->find(array('condition' => 'active=1 and ads_keyword="' . $wd->id . '"', 'order' => 'rand()'));
                            if ($ad && $ad->related_link)
                                $href = 'href="' . $ad->related_link . '" target="_blank"';
                            else
                                $href = 'href="javascript:void(0);"';

                            $cl = $i == $w_num ? ' style="float:right"' : ' ';
                            echo '<td><a ' . $href . $cl . ' onclick="window.location=\'' . Yii::app()->request->getBaseUrl(true) . '/home/searchResult?q=' . $wd->id . '\'">' . $wd->keyword . '</a></td>';
                        }
                    }
                    ?>
                </tr>
            </table>
        </div>
        <div class="row-fluid">
            <?php
            $words1 = AdsKeyword::model()->findAll(array('condition' => 'id in (5,6) and active=1'));
            if ($words1) {
                $w_num = count($words1) - 1;
                foreach ($words1 as $i => $wd) {
                    $ad = AdsKeywordLink::model()->find(array('condition' => 'active=1 and ads_keyword="' . $wd->id . '"', 'order' => 'rand()'));
                    if ($ad && $ad->related_link)
                        $href = 'href="' . $ad->related_link . '" target="_blank"';
                    else
                        $href = 'href="javascript:void(0);"';

                    $cl = $i == $w_num ? ' style="float:right"' : ' ';
                    echo '<a ' . $href . $cl . ' onclick="window.location=\'' . Yii::app()->request->getBaseUrl(true) . '/home/searchResult?q=' . $wd->id . '\'">' . $wd->keyword . '</a>';
                }
            }
            ?>
        </div>
        <div class="row-fluid">
            <div class="se-pre-ads span10 offset1">
                <!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                     style="display:inline-block;width:468px;height:15px"
                     data-ad-client="ca-pub-1628716478426750"
                     data-ad-slot="8074552227"></ins>
                <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>-->
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Responsive ad to work on all screens -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-1628716478426750"
                     data-ad-slot="4311798625"
                     data-ad-format="auto"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
    </div>
</div>