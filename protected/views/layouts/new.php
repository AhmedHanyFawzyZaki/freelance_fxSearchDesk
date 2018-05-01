<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->
    <head>
        <meta charset="utf-8">
        <!-- InstanceBeginEditable name="doctitle" -->
        <title><?= Yii::app()->name ?></title>
        <!-- InstanceEndEditable -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Designed By : Ahmed Hany Fawzy">

        <meta name="description" content="Forex search engine that searches all of the top forex sites to deliver highly relevant search results.">
        <meta name="keywords" content="Forex, Forex Trading, Search Forex, Forex Search Engine">
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/Font-awesome/css/font-awesome.min.css" />

        <!-- Le styles -->
        <?php
        Yii::app()->bootstrap->register();
        ?>
        <link href="<?= Yii::app()->request->getBaseUrl(true) ?>/css/style.css" rel="stylesheet">


        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="<?= Yii::app()->request->getBaseUrl(true) ?>/js/html5shiv.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <!--<link rel="shortcut icon" href="img/favicon.png">-->
        <!-- InstanceBeginEditable name="head" -->
        <!-- InstanceEndEditable -->

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-68425192-1', 'auto');
            ga('send', 'pageview');

        </script>
    </head>
    <body data-spy="scroll" data-target=".bs-docs-sidebar">
        <!-- header
        ================================================== --> 
        <header>
            <!-- NAVBAR
            ================================================== -->
            <div class="navbar-wrapper bgmain">
                <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
                <div class="container">
                    <div class="navbar no_margin">
                        <div class="navbar-inner navbar-inner_main row-fluid">
                            <a href="<?= Yii::app()->request->getBaseUrl(true) ?>/home" class="span4">
                                <!--<h1 class="text-center white comic animate-2"><?= Yii::app()->name ?></h1>-->
                                <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/new-logo.png" width="175" class="margintop25">
                            </a>
                            <?php $this->renderPartial('//layouts/right-box'); ?>
                        </div><!-- /.navbar-inner -->
                        <?php
                        if (Yii::app()->user->hasFlash('success')) {
                            echo '<h4 class="alert alert-danger text-center">' . Yii::app()->user->getFlash('success') . ' <a class="close pull-right" data-dismiss="alert" href="#">&times;</a></h4>';
                        }
                        ?>
                    </div><!-- /.navbar -->
                </div> <!-- /.container -->
            </div><!-- /.navbar-wrapper -->
        </header>
        <!--End Header-->


        <?= $content ?>
        <?php $this->renderPartial('//layouts/footer'); ?>