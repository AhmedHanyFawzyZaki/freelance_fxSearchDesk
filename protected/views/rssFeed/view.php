<?php

$this->breadcrumbs = array(
    'Rss Feeds' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List RssFeed'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create RssFeed'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'Update RssFeed'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('translate', 'Delete RssFeed'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'View RssFeed') . ' "' . $model->id . '"'; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'content',
        'date_created',
        'active' => array(
            'name' => 'active',
            'value' => $model->active ? "Active" : "Inactive",
        ),
    ),
));
?>
