<?php
$this->breadcrumbs=array(
	'Settings'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>Yii::t('translate', 'List Settings'),'url'=>array('index')),
	//array('label'=>Yii::t('translate', 'Create Settings'),'url'=>array('create')),
	array('label'=>Yii::t('translate', 'View Settings'),'url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Update Settings'); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>