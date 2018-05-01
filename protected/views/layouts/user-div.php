<?php
$user = User::model()->findByPk(Yii::app()->user->id);
?>

<div class="span3 offset5 right-div-login text-right">
    <div class="row-fluid margintop10">
        <div class="span6 offset3 text-center">
            <div class="row-fluid margintop5">
                <h5 class="no-margin username span12 no-h"><b>Welcome,</b> <?= Yii::app()->user->username ?></h5>
            </div>
            <div class="row-fluid white-new">
                <label class="margintop5" onclick="$('#profile-div').show(1000);">View Profile &nbsp;<i class="icon icon-angle-down"></i></label>
            </div>
        </div>
        <div class="span3">
            <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/user1.png" class="userimg"><br>
        </div>
    </div>

    <div class="row-fluid hide login-div text-left boxshadow black height250" id="profile-div">
        <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/profile.png" class="login-img">
        <label class="icon icon-remove-circle pull-right login-cross" onclick="$('#profile-div').hide(1000);"></label>
        <div class="row-fluid margintop20">
            <div class="span2">
                <i class="icon icon-user font34 grey"></i>
            </div>
            <div class="span8">
                <span>Welcome,</span><br>
                <span class="brown-white"><?= $user->username ?></span>
            </div>
            <div class="span2 text-right">
                <a href="<?= Yii::app()->request->getBaseUrl(true) ?>/home/faq" class="oldgreen">FAQ</a>
            </div>
            <hr class="width100per pull-left margintop10">
        </div>
        <div class="row-fluid">
            <div class="span2">
                <i class="icon icon-file-text-alt font34 grey"></i>
            </div>
            <div class="span7">
                <span>Subscription:</span><br>
                <span class="font12">
                    <?php
                    if (strtotime($user->date_of_renewal) >= (time() + 60 * 60 * 24 * 365 * 3)) {
                        echo 'Free';
                    } else {
                        if ($user->date_of_renewal && $user->date_of_renewal != '0000-00-00') {
                            echo 'will end on ' . date('d F Y', strtotime($user->date_of_renewal));
                        } else {
                            echo ' Not Subscribed';
                        }
                    }
                    ?>
                </span>
            </div>
            <div class="span3 text-right">
                <a href="<?= Yii::app()->request->getBaseUrl(true) ?>/home/renew?token=<?= $user->url ?>" class="oldgreen font12">Renew Now</a>
            </div>
            <hr class="width100per pull-left margintop10">
        </div>
        <div class="row-fluid margintop10">
            <div class="span2">
                <i class="icon icon-envelope-alt font30 grey"></i>
            </div>
            <div class="span10">
                <span>Email:</span><br>
                <span><?= $user->email ?></span>
            </div>
        </div>
        <a class="text-center lineheight40 login-btn" href="<?= Yii::app()->request->getBaseUrl(true) ?>/home/logout">Logout</a>
    </div>
</div>