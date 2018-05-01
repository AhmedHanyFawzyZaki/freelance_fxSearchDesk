<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List Article'),'url'=>array('index')),
	array('label'=>Yii::t('translate', 'Create Article'),'url'=>array('create')),
	array('label'=>Yii::t('translate', 'View Article'),'url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Update Article'). ' "'.$model->title.'"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>