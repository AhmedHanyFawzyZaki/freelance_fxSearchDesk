<?php
$this->breadcrumbs=array(
	'General Topics'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List GeneralTopic'),'url'=>array('index')),
	array('label'=>Yii::t('translate', 'Create GeneralTopic'),'url'=>array('create')),
	array('label'=>Yii::t('translate', 'View GeneralTopic'),'url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Update GeneralTopic'). ' "'.$model->title.'"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>