<?php
$this->breadcrumbs=array(
	'Saved Links'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List SavedLink'),'url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Create SavedLink');?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>