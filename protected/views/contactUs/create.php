<?php
$this->breadcrumbs=array(
	'Contact Uses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List ContactUs'),'url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Create ContactUs');?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>