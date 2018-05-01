<div class="span4 offset4 right-div-login">
    <?php
    $action = strtolower(Yii::app()->controller->action->id);
    /* if ($action == 'landing' || $action == 'index') { */
    ?>
    <a href="#register" class="signup pull-right" role="button" data-toggle="modal" onclick="$('#login-div').hide();"><img src="<?= Yii::app()->request->getBaseUrl(true); ?>/img/signup-img.png"></a>
    <label class="pull-right marginleft20 white login margintop20" onclick="$('#login-div').show(1000);">Log In</label>
    <?php
    if ($action == 'index' || $action == 'landing')
    {
        ?>
    <a class="article-link" href="<?= Yii::app()->request->getBaseUrl(true) ?>/articles">Fx Recent Articles</a>
    <?php
    }
    /* } else {
      ?>
      <label class="pull-right marginleft20 white login margintop20" onclick="$('#login-div').show(1000);">Log In</label>
      <a href="#register" class="signup pull-right margintop20" role="button" data-toggle="modal" onclick="$('#login-div').hide();">Sign Up</a>
      <?php
      } */
    ?>

    <div class="row-fluid hide login-div" id="login-div">
        <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/login-img.png" class="login-img">
        <label class="icon icon-remove-circle pull-right login-cross" onclick="$('#login-div').hide(1000);"></label>
        <?php
        $loginModel = new LoginForm;
        $loginForm = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'login',
            'enableAjaxValidation' => false,
            'action' => Yii::app()->request->baseUrl . '/home/login',
            'type' => 'horizontal',
            'htmlOptions' => array(
                'class' => 'no-margin'
            )
        ));
        ?>
        <div class="input-group">
            <i class="icon icon-envelope input-icon"></i>
            <?php echo $loginForm->textField($loginModel, 'username', array('class' => 'input-cus', 'placeholder' => 'Email Address')) ?>
        </div>
        <div class="input-group">
            <i class="icon icon-lock input-icon"></i>
            <?php echo $loginForm->passwordField($loginModel, 'password', array('class' => 'input-cus', 'placeholder' => 'Password')) ?>
        </div>

        <a class="forgot" href="#forgot-pass" onclick="$('#login-div').hide();" role="button" data-toggle="modal">Forgot Password?</a>
        <button class="btn login-btn" type="submit">Log-in</button>
        <?php $this->endWidget(); ?>
    </div>
    <div class="modal modal-small hide fade" id="forgot-pass">
        <div class="forgot-password">
            <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/forgot-password.png" class="login-img">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <form class="form-horizontal no-margin" method="post" action="<?= Yii::app()->request->getBaseUrl(true) ?>/home/forgot">
                <div class="input-group">
                    <i class="icon icon-envelope-alt input-icon"></i>
                    <input type="text" placeholder="Your Email Address" required="required" class="input-cus" name="email">
                </div>

                <button class="btn login-btn" type="submit">Submit</button>
            </form>
        </div>
    </div>
    <div class="modal modal-small hide fade" id="register">
        <div class="forgot-password">
            <img src="<?= Yii::app()->request->getBaseUrl(true) ?>/img/register-now.png" class="login-img">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="reg-clos">&times;</button>
            <?php
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'user-form',
                'enableAjaxValidation' => true,
                'type' => 'horizontal',
                'action' => Yii::app()->request->getBaseUrl(true) . '/home/register',
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'htmlOptions' => array(
                    'class' => 'no-margin'
                )
            ));
            $model = new User('register');
            ?>
            <div class="input-group">
                <i class="icon icon-user input-icon"></i>
                <?php echo $form->textField($model, 'username', array('class' => 'input-cus', 'maxlength' => 255, 'placeholder' => 'User Name')); ?>
                <?php echo $form->error($model, 'username'); ?>
            </div>
            <div class="input-group">
                <i class="icon icon-envelope input-icon"></i>
                <?php echo $form->textField($model, 'email', array('class' => 'input-cus', 'maxlength' => 255, 'placeholder' => 'Email Address')); ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>
            <div class="input-group">
                <i class="icon icon-lock input-icon"></i>
                <?php echo $form->passwordField($model, 'password', array('class' => 'input-cus', 'maxlength' => 255, 'placeholder' => 'Password')); ?>
                <?php echo $form->error($model, 'password'); ?>
            </div>
            <div class="input-group">
                <i class="icon icon-lock input-icon"></i>
                <?php echo $form->passwordField($model, 'password_repeat', array('class' => 'input-cus', 'maxlength' => 255, 'placeholder' => 'Repeat Password')); ?>
                <?php echo $form->error($model, 'password_repeat'); ?>
            </div>
            <div class="input-group">
                <?php $this->widget('CCaptcha'); ?>
                <?php echo $form->textField($model, 'verifyCode', array('class' => 'input-cap', 'maxlength' => 255, 'placeholder' => 'Captcha')); ?>
                <?php echo $form->error($model, 'verifyCode'); ?>
            </div>

            <button class="btn login-btn" type="submit">Register</button>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>