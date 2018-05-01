<?php

$this->breadcrumbs = array(
    'Ads Keywords' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List AdsKeyword'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create AdsKeyword'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'View AdsKeyword'), 'url' => array('view', 'id' => $model->id)),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Update AdsKeyword') . ' "' . $model->keyword . '"'; ?>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>