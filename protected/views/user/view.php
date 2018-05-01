<?php

$this->breadcrumbs = array(
    'Users' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List User'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create User'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'Update User'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('translate', 'Delete User'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'View User') . ' "' . $model->username . '"'; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'username',
        'user_type' => array(
            'name' => 'user_type',
            'value' => $model->userType->title
        ),
        'email',
        //'password',
        'first_name',
        'last_name',
        'phone',
        //'slug',
        'date_created',
        'date_of_renewal',
        'image' => array(
            'name' => 'image',
            'value' => Helper::showImage($model->image, $model->username, $model->username, 'users', 'tiny', 'defaultUser.jpg'),
            'type' => 'raw'
        ),
        'active'=>array(
            'name'=>'active',
            'value'=>$model->active?'Active':'Inactive'
        )
    ),
));
?>
