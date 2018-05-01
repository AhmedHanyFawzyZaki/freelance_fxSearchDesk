<title><?= Yii::app()->name ?> - Login</title>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/login/style.default.css" type="text/css" />
<style>
    #LoginForm_password_em_{
        color:red;
    }
</style>

<body class="loginpage">

    <div class="loginpanel">
        <div class="loginpanelinner text-center">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>" style="color:#0c57a3;font-size: 26px;text-align:center;"><?= Yii::app()->name; ?></a>
            <div class="logo animate0 bounceIn">

                <?php
                /** @var BootActiveForm $form */
                $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                    'id' => 'login',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                    'htmlOptions' => array(
                        'style' => 'padding:5px;background:#e9e9e9;'
                    ),
                ));
                ?>

                <div class="inputwrapper animate1 bounceIn">
                    <?php echo $form->textFieldRow($model, 'username', array('class' => 'txtfield', 'placeholder' => 'email or username')); ?>
                </div>

                <div class="inputwrapper animate2 bounceIn">
                    <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'inputwrapper animate2 bounceIn', 'placeholder' => 'password')); ?>
                </div>

                <div class="inputwrapper animate3 bounceIn">
                    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => 'Login')); ?>
                </div>

                <div class="inputwrapper animate4 bounceIn">
                    <?php echo $form->checkboxRow($model, 'rememberMe'); ?>
                </div>

                <?php $this->endWidget(); ?>
            </div><!--loginpanelinner-->
        </div><!--loginpanel-->

</body>
