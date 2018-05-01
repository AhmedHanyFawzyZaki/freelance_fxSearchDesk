<?php

$this->breadcrumbs = array(
    'Focal Keywords' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List FocalKeyword'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create FocalKeyword'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'Update FocalKeyword'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('translate', 'Delete FocalKeyword'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'View FocalKeyword') . ' "' . $model->title . '"'; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'title',
        'active' => array(
            'name' => 'active',
            'value' => $model->active ? "Active" : "Inactive",
        ),
    ),
));
?>
