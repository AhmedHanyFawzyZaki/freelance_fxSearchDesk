<?php
$this->breadcrumbs=array(
	'Advertises'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List Advertise'),'url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Create Advertise');?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>