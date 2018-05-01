<?php

$this->breadcrumbs = array(
    'Saved Links' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List SavedLink'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create SavedLink'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'Update SavedLink'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('translate', 'Delete SavedLink'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'View SavedLink') . ' "' . $model->link . '"'; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'link',
        'user_id' => array(
            'name' => 'user_id',
            'value' => $model->user->username,
        ),
        'folder_id' => array(
            'name' => 'folder_id',
            'value' => $model->folder->title,
        ),
        'date_created',
    ),
));
?>
