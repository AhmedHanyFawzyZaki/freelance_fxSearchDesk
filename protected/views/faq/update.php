<?php
$this->breadcrumbs=array(
	'Faqs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List Faq'),'url'=>array('index')),
	array('label'=>Yii::t('translate', 'Create Faq'),'url'=>array('create')),
	array('label'=>Yii::t('translate', 'View Faq'),'url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Update Faq'). ' "'.$model->id.'"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>