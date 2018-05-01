<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="description" content="<?php echo CHtml::encode($this->pageTitle); ?>">
        <meta name="author" content="Ahmed Hany">

        <?php
        echo '<link type="text/css" rel="stylesheet" href="' . Yii::app()->theme->baseUrl . '/css/style.css">';
        Yii::app()->bootstrap->register();
        ?>

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/date.js"></script>

        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/Font-awesome/css/font-awesome.min.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/os_temp.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.window.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/morris-0.4.3.min.css" />

        <?php
        /*         * ******************fancyBox Class********************** */
        $this->widget('application.extensions.fancybox.EFancyBox', array(
            'target' => '.s_frame',
            'config' => array(
                'maxWidth' => '98%',
                'maxHeight' => 300,
                //'fitToView' => true,
                //'width' => '50%',
                //'height' => '60%',
                //'autoSize' => false,
                //'closeClick' => true,
                //'openEffect' => 'none',
                //'closeEffect' => 'none',
                'type' => 'iframe',
            ),
        ));
        ?>

    </head>
    <?php
    if (Yii::app()->user->getState('wide_screen') == 1) {
        $classN = "hide-sidebar";
    } else {
        $classN = '';
    }
    ?>
    <body class="<?= $classN; ?>" >

        <div id="wrap">

            <!-- #top -->
            <div id="top">

                <!-- .navbar -->
                <div class="navbar navbar-inverse navbar-static-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">

                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <a class="brand" href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard">
                                <?php echo Yii::t('translate', Yii::app()->name); ?></a>
                            </a>

                            <div class="nav-collapse collapse">

                                <div class="btn-toolbar topnav">

                                    <div class="btn-group">
                                        <a href="javascript:void(0)" id="changeSidebarPos" class="btn btn-success">
                                            <i class='icon-resize-horizontal'></i></a>

                                    </div>

                                    <div class="btn-group">
                                        <a class="btn btn-inverse" rel="tooltip" href="<?php echo Yii::app()->request->baseUrl; ?>"
                                           data-original-title="<?php echo Yii::t('translate', 'View Site'); ?>"
                                           data-placement="bottom" >
                                            <i class="icon-home"></i>
                                        </a>
                                        <a class="btn btn-inverse" rel="tooltip" href="<?php echo Yii::app()->request->baseUrl; ?>/settings"
                                           data-original-title="<?php echo Yii::t('translate', 'Settings'); ?>"
                                           data-placement="bottom" >
                                            <i class="icon-gear"></i>
                                        </a>
                                    </div>

                                    <a class="btn btn-inverse" data-placement="bottom" 
                                       data-original-title="<?php echo Yii::t('translate', 'Logout'); ?>" rel="tooltip" href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/logout">
                                        <i class="icon-off"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.navbar -->
            </div>

            <!-- #left -->
            <div id="left">
                <!-- .user-media -->
                <div class="media user-media hidden-phone">
                    <?= Helper::showImage(Yii::app()->user->userimage, Yii::app()->user->username, Yii::app()->user->username, 'users', 'tiny', 'defaultUser.jpg', 'media-object img-polaroid user-img') ?>
                    <div class="media-body hidden-tablet" style="margin-top:13%;">
                        <h5 class="media-heading" style="font-size:14px;"><?= Yii::app()->name; ?></h5>
                        <ul class="unstyled user-info">
                            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/<?= Yii::app()->user->id ?>"><?= Yii::app()->user->username ?></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.user-media -->
                <!-- BEGIN MAIN NAVIGATION -->
                <ul id="menu" class="collapse" style="height:auto;">
                    <li>
                        <a href="<?= Yii::app()->request->baseUrl ?>/dashboard">
                            <i class="icon-dashboard"></i>
                            <?= Yii::t('translate', 'Dashboard') ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Yii::app()->request->baseUrl ?>/settings">
                            <i class="icon-gear"></i>
                            <?= Yii::t('translate', 'System Settings') ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Yii::app()->request->baseUrl ?>/contactUs">
                            <i class="icon-phone"></i>
                            <?= Yii::t('translate', 'Contact Us') ?>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="" data-target="#subnav0" data-toggle="collapse">
                            <i class="icon-user"></i>
                            <span><?= Yii::t('translate', 'Users') ?><span class="icon-sort-down pull-right"></span></span>
                        </a>
                        <div class="subnav collapse" id="subnav0" style="height: 0px;">
                            <ul class="colored" id="yw10">
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl ?>/user" tabindex="-1">
                                        <?= Yii::t('translate', 'All') ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl ?>/user?type=2" tabindex="-1">
                                        <?= Yii::t('translate', 'Administrators') ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl ?>/user?type=1" tabindex="-1">
                                        <?= Yii::t('translate', 'Users') ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="" data-target="#subnav1" data-toggle="collapse">
                            <i class="icon-list"></i>
                            <span><?= Yii::t('translate', 'Contents') ?><span class="icon-sort-down pull-right"></span></span>
                        </a>
                        <div class="subnav collapse" id="subnav1" style="height: 0px;">
                            <ul class="colored">
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl ?>/faq" tabindex="-1">
                                        <?= Yii::t('translate', 'FAQs') ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl ?>/page" tabindex="-1">
                                        <?= Yii::t('translate', 'Pages') ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl ?>/rssFeed" tabindex="-1">
                                        <?= Yii::t('translate', 'RSS Feeds') ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl ?>/article" tabindex="-1">
                                        <?= Yii::t('translate', 'Articles') ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="" data-target="#functionality" data-toggle="collapse">
                            <i class="icon-search"></i>
                            <span><?= Yii::t('translate', 'Functionality') ?><span class="icon-sort-down pull-right"></span></span>
                        </a>
                        <div class="subnav collapse" id="functionality" style="height: 0px;">
                            <ul class="colored">
                                <!--<li>
                                    <a href="<?php echo Yii::app()->request->baseUrl ?>/generalTopic" tabindex="-1">
                                <?= Yii::t('translate', 'General Topics') ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl ?>/focalKeyword" tabindex="-1">
                                <?= Yii::t('translate', 'Focal Keywords') ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl ?>/countryCurrency" tabindex="-1">
                                <?= Yii::t('translate', 'Countries/Currencies') ?>
                                    </a>
                                </li>-->
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl ?>/website" tabindex="-1">
                                        <?= Yii::t('translate', 'Websites') ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl ?>/advertise" tabindex="-1">
                                        <?= Yii::t('translate', 'Advertisements') ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::app()->request->baseUrl ?>/dashboard/import">
                                        <i class="icon-inbox"></i>
                                        <?= Yii::t('translate', 'Import') ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::app()->request->baseUrl ?>/crawler">
                                        <i class="icon-compass"></i>
                                        <?= Yii::t('translate', 'Crawler') ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--<li>
                        <a href="<?= Yii::app()->request->baseUrl ?>/adsKeyword">
                            <i class="icon-edit"></i>
                    <?= Yii::t('translate', 'Ads Keywords') ?>
                        </a>
                    </li>-->
                    <li>
                        <a href="<?= Yii::app()->request->baseUrl ?>/dashboard/logout">
                            <i class="icon-off"></i>
                            <?= Yii::t('translate', 'Logout') ?>
                        </a>
                    </li>
                </ul>
                <!-- END MAIN NAVIGATION -->

            </div>
            <!-- /#left -->

            <!-- #content -->
            <div id="content">
                <!-- .outer -->
                <div class="container-fluid outer">
                    <div class="row-fluid">
                        <!-- .inner -->
                        <div class="span12 inner">
                            <!--Begin Datatables-->
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="box dark">
                                        <header>
                                            <div class="icons"><i class="icon-eye-open"></i></div>
                                            <?php
                                            if ((Yii::app()->controller->id == 'dashboard' and Yii::app()->controller->action->id == 'index') || (Yii::app()->controller->id == 'dashboard' and Yii::app()->controller->action->id == 'import')) {
                                                echo "<h5>Dashboard</h5>";
                                            } else {
                                                echo "<h5>" . $this->pageTitlecrumbs . "</h5>";
                                            }
                                            ?>
                                            <!-- .toolbar -->
                                            <div class="toolbar">
                                                <?php if (Yii::app()->controller->id != 'dashboard') { ?> <ul class="nav">
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="icon-th-large"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <?php
                                                                $this->beginWidget('zii.widgets.CPortlet', array(
                                                                ));
                                                                $this->widget('bootstrap.widgets.TbMenu', array(
                                                                    'items' => $this->menu,
                                                                    'htmlOptions' => array('class' => 'nav'),
                                                                ));
                                                                $this->endWidget();
                                                                ?>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                        </li>
                                                    </ul>
                                                    <? }?>
                                                </div>
                                                <!-- /.toolbar -->
                                            </header>

                                            <div id="collapse4" class="body">
                                                <?php echo $content; ?>

                                            </div>

                                        </div>
                                    </div>
                                    <!--End Datatables-->
                                </div>
                                <!-- /.row-fluid -->
                            </div>
                            <!-- /.outer -->
                        </div>
                        <!-- /#content -->
                        <!-- #push do not remove -->
                        <div id="push"></div>
                        <!-- /#push -->
                    </div>
                    <!-- /#wrap -->
                    <div id="footer">
                        <p><?php echo date('Y'); ?> &copy; Ahmed Hany</p>
                    </div>

                    <script>
                        $("document").ready(function () {
                            $("#changeSidebarPos").click(function () {
                                $.ajax({
                                    url: "<?php echo Yii::app()->createUrl('dashboard/ajaxRequest'); ?>",
                                    success: function () {
                                    }
                                });
                            });
                        });
                    </script>



                    <!---------Crop and upload----------------->

                    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
                    <!--[if lt IE 9]>
                      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
                    <![endif]-->

                    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/js/croppic/croppic.css" />
                    <script src="<?= Yii::app()->theme->baseUrl ?>/js/croppic/croppic.min.js"></script>                
                    <!--users photo uploader -->
                    <script>
                        var croppicContainerEyecandyOptions = {
                            uploadUrl: '<?= Yii::app()->request->baseUrl ?>/croppic/saveOriginalImage',
                            cropUrl: '<?= Yii::app()->request->baseUrl ?>/croppic/saveCroppedImage',
                            //imgEyecandy:false,
                            loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
                            outputUrlId: 'User_image',
                        }
                        var userImageEyecandy = new Croppic('cropContainerEyecandy', croppicContainerEyecandyOptions);

                        var bannerOptions = {
                            uploadUrl: '<?= Yii::app()->request->baseUrl ?>/croppic/saveOriginalImage',
                            cropUrl: '<?= Yii::app()->request->baseUrl ?>/croppic/saveCroppedImage',
                            //imgEyecandy:false,
                            loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
                            outputUrlId: 'User_banner',
                        }
                        var userBannerEyecandy = new Croppic('bannerCandy', bannerOptions);

                    </script>
                    <!---Baby banner and image cropping---->
                    <script>
                        var babyImageCandyOptions = {
                            uploadUrl: '<?= Yii::app()->request->baseUrl ?>/croppic/saveOriginalImage',
                            cropUrl: '<?= Yii::app()->request->baseUrl ?>/croppic/saveCroppedImage',
                            //imgEyecandy:false,
                            loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
                            outputUrlId: 'Baby_image',
                        }
                        var babyImageEyecandy = new Croppic('babyImageCandy', babyImageCandyOptions);

                        var babyBannerCandyOptions = {
                            uploadUrl: '<?= Yii::app()->request->baseUrl ?>/croppic/saveOriginalImage',
                            cropUrl: '<?= Yii::app()->request->baseUrl ?>/croppic/saveCroppedImage',
                        //imgEyecandy:false,
                        loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
                        outputUrlId: 'Baby_banner',
                    }
                    var babyBannerEyecandy = new Croppic('babyBannerCandy', babyBannerCandyOptions);

                </script>
                <!---------end Crop and upload----------------->

                </body>
                </html>