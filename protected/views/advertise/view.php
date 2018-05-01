<?php

$this->breadcrumbs = array(
    'Advertises' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List Advertise'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create Advertise'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'Update Advertise'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('translate', 'Delete Advertise'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'View Advertise') . ' "' . $model->title . '"'; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'title',
        'description',
        'code',
        'active' => array(
            'name' => 'active',
            'value' => $model->active ? "Active" : "Inactive",
        ),
        'type' => array(
            'name' => 'type',
            'value' => Advertise::getType($model->type),
        ),
        /*'ads_keyword' => array(
            'name' => 'ads_keyword',
            'value' => $model->adKeyword->keyword
        ),*/
    ),
));
?>
