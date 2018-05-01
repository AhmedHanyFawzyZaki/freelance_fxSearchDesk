<?php
$this->breadcrumbs=array(
	'Ads Keywords'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List AdsKeyword'),'url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Create AdsKeyword');?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>