<?php

$this->breadcrumbs = array(
    'General Subjects' => array('index'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List GeneralSubject'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create GeneralSubject'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'View GeneralSubject'), 'url' => array('view', 'id' => $model->id)),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Update GeneralSubject') . ' "' . $model->title . '"'; ?>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>