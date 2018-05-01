<?php
$this->breadcrumbs=array(
	'Country Currencies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List CountryCurrency'),'url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Create CountryCurrency');?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>