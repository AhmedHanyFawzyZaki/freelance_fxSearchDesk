<?php
$this->breadcrumbs=array(
	'Rss Feeds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List RssFeed'),'url'=>array('index')),
	array('label'=>Yii::t('translate', 'Create RssFeed'),'url'=>array('create')),
	array('label'=>Yii::t('translate', 'View RssFeed'),'url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Update RssFeed'). ' "'.$model->id.'"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>