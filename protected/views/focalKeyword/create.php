<?php
$this->breadcrumbs=array(
	'Focal Keywords'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List FocalKeyword'),'url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Create FocalKeyword');?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>