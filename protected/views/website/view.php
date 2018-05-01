<?php

$this->breadcrumbs = array(
    'Websites' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List Website'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create Website'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'Update Website'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('translate', 'Delete Website'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'View Website') . ' "' . $model->url . '"'; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'url',
        'active' => array(
            'name' => 'active',
            'value' => $model->active ? "Active" : "Inactive",
        ),
        'description' => array(
            'name' => 'description',
            'value' => $model->description,
            'type' => 'raw'
        ),
        'included_categories' => array(
            'name' => 'included_categories',
            'value' => SearchTab::fetchAll($model->included_categories),
        ),
    ),
));
?>
