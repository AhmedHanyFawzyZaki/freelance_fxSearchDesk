
<style type="text/css">


    body.dragging, body.dragging * {
        cursor: move !important;
    }

    .dragged {
        position: absolute;
        opacity: 0.5;
        z-index: 2000;
    }

    ol.example li.placeholder {
        position: relative;
        /** More li styles **/
    }
    ol.example li.placeholder:before {
        position: absolute;
        /** Define arrowhead **/
    }
    .example{

        width: 100%;
    }
    ol.example li{
        float: left;
        width: 48%;
    }
</style>


<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/inettuts.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/inettuts.js.css" rel="stylesheet" type="text/css" />


<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/im.css" type="text/css" rel="stylesheet" />

<div id="columns">

    <div class="row-fluid">
        <div class="span3">
            <div class="circle-tile">
                <a href="<?= Yii::app()->request->baseUrl ?>/generalSubject">
                    <div class="circle-tile-heading dark-blue">
                        <i class="icon-book mrgr-10 muted"></i>
                    </div>
                </a>
                <div class="circle-tile-content dark-blue">
                    <p>
                        <?= Yii::t('translate', 'General Subjects'); ?>
                    </p>
                    <span>
                        <?= GeneralSubject::model()->count(); ?>

                        <i class="ion ion-stats-bars"></i>

                    </span>
                    <a href="<?= Yii::app()->request->baseUrl ?>/generalSubject" class="circle-tile-footer"><?= Yii::t('translate', 'More Info'); ?> <i class="fa fa-chevron-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="span3">
            <div class="circle-tile">
                <a href="<?= Yii::app()->request->baseUrl ?>/generalTopic">
                    <div class="circle-tile-heading bg-yellow">
                        <i class="icon-hdd mrgr-10 muted"></i>
                    </div>
                </a>
                <div class="circle-tile-content bg-yellow">
                    <p>
                        <?= Yii::t('translate', 'General Topics'); ?>
                    </p>
                    <span>
                        <?= GeneralTopic::model()->count(); ?>

                        <i class="ion ion-stats-bars"></i>

                    </span>
                    <a href="<?= Yii::app()->request->baseUrl ?>/generalTopic" class="circle-tile-footer"><?= Yii::t('translate', 'More Info'); ?><i class="fa fa-chevron-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="span3">
            <div class="circle-tile">
                <a href="<?= Yii::app()->request->baseUrl ?>/focalKeyword">
                    <div class="circle-tile-heading blue-background">
                        <i class="icon-location-arrow mrgr-10 muted"></i>
                    </div>
                </a>
                <div class="circle-tile-content blue-background">
                    <p>
                        <?= Yii::t('translate', 'Focal Keywords'); ?>
                    </p>
                    <span>
                        <?= FocalKeyword::model()->count(); ?>

                        <i class="ion ion-stats-bars"></i>

                    </span>
                    <a href="<?= Yii::app()->request->baseUrl ?>/focalKeyword" class="circle-tile-footer"><?= Yii::t('translate', 'More Info'); ?> <i class="fa fa-chevron-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="span3">
            <div class="circle-tile">
                <a href="<?= Yii::app()->request->baseUrl ?>/website">
                    <div class="circle-tile-heading red">
                        <i class="icon-link mrgr-10 muted"></i>
                    </div>
                </a>
                <div class="circle-tile-content red">
                    <p>
                        <?= Yii::t('translate', 'Websites'); ?>
                    </p>
                    <span>
                        <?= Website::model()->count(array('condition'=>'active=1')); ?>

                        <i class="ion ion-stats-bars"></i>

                    </span>
                    <a href="<?= Yii::app()->request->baseUrl ?>/website" class="circle-tile-footer"><?= Yii::t('translate', 'More Info'); ?> <i class="fa fa-chevron-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row-fluid">

        <div class="span6 block2 box-header">
            <h3>USERS (vs) SEARCH FOLDERS</h3>

            <div class="panel panel-default">

                <div class="panel-body">
                    <div id="morris-line-chart"></div>
                </div>
            </div>
        </div>



        <div class="span6 block2 box-header2">
            <h3>Users</h3>

            <div class="panel panel-default">

                <div class="panel-body">
                    <div id="morris-donut-chart"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row-fluid well" style="width:96%;">
        <ul class="shortcuts span12">
            <!--<li class="events">
                <a class="btn" href="<?php echo Yii::app()->baseUrl; ?>/settings">
                    <span class="fa icon-gear"></span>
                    <span class="shortcuts-label"><?= Yii::t('translate', 'Settings') ?></span>
                </a>
            </li>-->
            <li class="events">
                <a class="btn" href="<?php echo Yii::app()->baseUrl; ?>/user">
                    <span class="fa icon-user"></span>
                    <span class="shortcuts-label"><?= Yii::t('translate', 'Users') ?></span>
                </a>
            </li>
            <li class="events">
                <a class="btn" href="<?php echo Yii::app()->baseUrl; ?>/page">
                    <span class="fa icon-tags"></span>
                    <span class="shortcuts-label"><?= Yii::t('translate', 'Pages') ?></span>
                </a>
            </li>
            <li class="events">
                <a class="btn" href="<?php echo Yii::app()->baseUrl; ?>/faq">
                    <span class="fa icon-list-alt"></span>
                    <span class="shortcuts-label"><?= Yii::t('translate', 'FAQs') ?></span>
                </a>
            </li>
            <li class="events">
                <a class="btn" href="<?php echo Yii::app()->baseUrl; ?>/generalSubject">
                    <span class="fa icon-book"></span>
                    <span class="shortcuts-label"><?= Yii::t('translate', 'General Subjects') ?></span>
                </a>
            </li>
            <li class="events">
                <a class="btn" href="<?php echo Yii::app()->baseUrl; ?>/generalTopic">
                    <span class="fa icon-hdd"></span>
                    <span class="shortcuts-label"><?= Yii::t('translate', 'General Topics') ?></span>
                </a>
            </li>
            <li class="events">
                <a class="btn" href="<?php echo Yii::app()->baseUrl; ?>/focalKeyword">
                    <span class="fa icon-location-arrow"></span>
                    <span class="shortcuts-label"><?= Yii::t('translate', 'Focal Keywords') ?></span>
                </a>
            </li>
            <li class="events">
                <a class="btn" href="<?php echo Yii::app()->baseUrl; ?>/countryCurrency">
                    <span class="fa icon-globe"></span>
                    <span class="shortcuts-label"><?= Yii::t('translate', 'Countries and Currencies') ?></span>
                </a>
            </li>
            <li class="events">
                <a class="btn" href="<?php echo Yii::app()->baseUrl; ?>/associatedKeyword">
                    <span class="fa icon-code-fork"></span>
                    <span class="shortcuts-label"><?= Yii::t('translate', 'Associated Keywords') ?></span>
                </a>
            </li>
            <li class="events">
                <a class="btn" href="<?php echo Yii::app()->baseUrl; ?>/website">
                    <span class="fa icon-link"></span>
                    <span class="shortcuts-label"><?= Yii::t('translate', 'Websites') ?></span>
                </a>
            </li>
            <li class="events">
                <a class="btn" href="<?php echo Yii::app()->baseUrl; ?>/searchFolder">
                    <span class="fa icon-search"></span>
                    <span class="shortcuts-label"><?= Yii::t('translate', 'Search Folders') ?></span>
                </a>
            </li>
            <li class="events">
                <a class="btn" href="<?php echo Yii::app()->baseUrl; ?>/advertise">
                    <span class="fa icon-money"></span>
                    <span class="shortcuts-label"><?= Yii::t('translate', 'Advertisements') ?></span>
                </a>
            </li>
            <li class="events">
                <a class="btn" href="<?php echo Yii::app()->baseUrl; ?>/contactUs">
                    <span class="fa icon-phone"></span>
                    <span class="shortcuts-label"><?= Yii::t('translate', 'Contact Us') ?></span>
                </a>
            </li>
        </ul>
    </div>

    <?php
    $y = date('Y');
    for ($i = $y - 5; $i <= $y; $i++) {
        $data[] = array('y' => (string) $i, 'a' => User::model()->count(array('condition' => 'user_type=1 and year(date_created)=' . $i)), 'b' => SearchFolder::model()->count(array('condition' => 'year(date_created)=' . $i)));
    }
    ?>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script>
        var active_users =<?= User::model()->count(array('condition' => 'user_type=1 and active=1')) ?>;
        var inactive_users =<?= User::model()->count(array('condition' => 'user_type=1 and active=0')) ?>;
        var data =<?= json_encode($data) ?>;
    </script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom.js"></script>

    <div class="clear"></div>
    <!-- /.outer -->
</div>
<!-- END CONTENT -->
