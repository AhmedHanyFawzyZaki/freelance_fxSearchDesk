<?php
$this->breadcrumbs=array(
	'General Subjects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List GeneralSubject'),'url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Create GeneralSubject');?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>