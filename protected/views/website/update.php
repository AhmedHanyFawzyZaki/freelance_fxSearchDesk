<?php
$this->breadcrumbs=array(
	'Websites'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List Website'),'url'=>array('index')),
	array('label'=>Yii::t('translate', 'Create Website'),'url'=>array('create')),
	array('label'=>Yii::t('translate', 'View Website'),'url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Update Website'). ' "'.$model->url.'"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>