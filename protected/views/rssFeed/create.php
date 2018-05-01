<?php
$this->breadcrumbs=array(
	'Rss Feeds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('translate', 'List RssFeed'),'url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Create RssFeed');?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>