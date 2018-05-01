<?php
$this->breadcrumbs=array(
	'Focal Keywords'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List FocalKeyword'),'url'=>array('index')),
	array('label'=>Yii::t('translate', 'Create FocalKeyword'),'url'=>array('create')),
	array('label'=>Yii::t('translate', 'View FocalKeyword'),'url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Update FocalKeyword'). ' "'.$model->title.'"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>