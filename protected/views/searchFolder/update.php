<?php

$this->breadcrumbs = array(
    'Search Folders' => array('index'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List SearchFolder'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create SearchFolder'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'View SearchFolder'), 'url' => array('view', 'id' => $model->id)),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Update SearchFolder') . ' "' . $model->title . '"'; ?>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>