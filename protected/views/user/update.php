<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List User'),'url'=>array('index')),
	array('label'=>Yii::t('translate', 'Create User'),'url'=>array('create')),
	array('label'=>Yii::t('translate', 'View User'),'url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Update User'). ' "'.$model->username.'"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>