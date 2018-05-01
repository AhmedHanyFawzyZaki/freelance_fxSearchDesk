
<?php
if (Yii::app()->user->hasFlash("wrong_pass")) {
    echo '<div class="alert alert-danger">' . Yii::app()->user->getFlash("wrong_pass") . '</div>';
}
?>
<div class="row-fluid containermini">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
        'type' => 'horizontal',
    ));
    ?>
    <h3>Change your password:</h3><hr>
    <?php echo $form->passwordFieldRow($user, 'password', array('class' => 'span9', 'placeholder' => 'Password')); ?>
    <?php echo $form->passwordFieldRow($user, 'password_repeat', array('class' => 'span9', 'placeholder' => 'Repeat password')); ?>

    <div style="margin: 10px;display: table;float: right;" >
        <button type="submit" class="btn btn-success pull-right">Change</button>
    </div>
    <?php $this->endWidget(); ?>
    <!-- /.registration-wrap -->
</div>