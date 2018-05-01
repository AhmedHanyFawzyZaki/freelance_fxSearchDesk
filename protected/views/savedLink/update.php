<?php

$this->breadcrumbs = array(
    'Saved Links' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List SavedLink'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create SavedLink'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'View SavedLink'), 'url' => array('view', 'id' => $model->id)),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Update SavedLink') . ' "' . $model->link . '"'; ?>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>