<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List Article'),'url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Create Article');?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>