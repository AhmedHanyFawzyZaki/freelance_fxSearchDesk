<?php
$this->breadcrumbs=array(
	'Contact Uses'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List ContactUs'),'url'=>array('index')),
	array('label'=>Yii::t('translate', 'Create ContactUs'),'url'=>array('create')),
	array('label'=>Yii::t('translate', 'View ContactUs'),'url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Update ContactUs'). ' "'.$model->id.'"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>