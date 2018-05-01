<?php
$this->breadcrumbs=array(
	'Associated Keywords'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List AssociatedKeyword'),'url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Create AssociatedKeyword');?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>