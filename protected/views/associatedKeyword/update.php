<?php

$this->breadcrumbs = array(
    'Associated Keywords' => array('index'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List AssociatedKeyword'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create AssociatedKeyword'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'View AssociatedKeyword'), 'url' => array('view', 'id' => $model->id)),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Update AssociatedKeyword') . ' "' . $model->title . '"'; ?>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>