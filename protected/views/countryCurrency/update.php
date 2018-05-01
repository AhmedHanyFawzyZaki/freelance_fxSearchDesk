<?php

$this->breadcrumbs = array(
    'Country Currencies' => array('index'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List CountryCurrency'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create CountryCurrency'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'View CountryCurrency'), 'url' => array('view', 'id' => $model->id)),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Update CountryCurrency') . ' "' . $model->title . '"'; ?>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>