<?php

$this->breadcrumbs = array(
    'Advertises' => array('index'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List Advertise'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create Advertise'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'View Advertise'), 'url' => array('view', 'id' => $model->id)),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Update Advertise') . ' "' . $model->title . '"'; ?>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>