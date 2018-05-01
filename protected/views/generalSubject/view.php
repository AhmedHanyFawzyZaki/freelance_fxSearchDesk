<?php

$this->breadcrumbs = array(
    'General Subjects' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List GeneralSubject'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create GeneralSubject'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'Update GeneralSubject'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('translate', 'Delete GeneralSubject'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'View GeneralSubject') . ' "' . $model->title . '"'; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'title',
        'active' => array(
            'name' => 'active',
            'value' => $model->active ? 'Active' : 'Inactive'
        ),
    ),
));
?>
