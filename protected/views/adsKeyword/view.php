<?php

$this->breadcrumbs = array(
    'Ads Keywords' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List AdsKeyword'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create AdsKeyword'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'Update AdsKeyword'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('translate', 'Delete AdsKeyword'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'View AdsKeyword') . ' "' . $model->keyword . '"'; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'keyword',
        'counter',
        'active' => array(
            'name' => 'active',
            'value' => $model->active ? "Active" : "Inactive",
        ),
    ),
));
?>
