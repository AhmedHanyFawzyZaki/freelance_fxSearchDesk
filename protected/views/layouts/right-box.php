<?php
if (Yii::app()->user->isGuest) {
    $this->renderPartial('//layouts/login-box');
} else {
    $this->renderPartial('//layouts/user-div');
}
?>