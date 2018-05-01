<?php
$this->breadcrumbs=array(
	'Websites'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List Website'),'url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Create Website');?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>