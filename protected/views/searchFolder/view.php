<?php

$this->breadcrumbs = array(
    'Search Folders' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List SearchFolder'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create SearchFolder'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'Update SearchFolder'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('translate', 'Delete SearchFolder'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'View SearchFolder') . ' "' . $model->title . '"'; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'title',
        'user_id' => array(
            'name' => 'user_id',
            'value' => $model->user->username,
        ),
        'date_created',
    ),
));
?>
