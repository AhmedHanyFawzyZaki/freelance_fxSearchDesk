<?php
$this->breadcrumbs=array(
	'Search Folders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List SearchFolder'),'url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Create SearchFolder');?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>