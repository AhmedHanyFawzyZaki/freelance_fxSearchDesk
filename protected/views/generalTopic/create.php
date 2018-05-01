<?php
$this->breadcrumbs=array(
	'General Topics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List GeneralTopic'),'url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Create GeneralTopic');?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>