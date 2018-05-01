<?php

$this->breadcrumbs = array(
    'Articles' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List Article'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create Article'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'Update Article'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('translate', 'Delete Article'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'View Article') . ' "' . $model->title . '"'; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'title',
        'publish' => array(
            'name' => 'publish',
            'value' => $model->publish ? "Yes" : "No",
        ),
        'intro' => array(
            'name' => 'intro',
            'value' => $model->intro,
            'type' => 'raw'
        ),
        'description' => array(
            'name' => 'description',
            'value' => $model->description,
            'type' => 'raw'
        ),
        /* 'image' => array(
          'name' => 'image',
          'value' => Helper::showImage($model->image, 'Not Set', $model->title, 'articles', 'tiny', ''),
          'type' => 'raw'
          ), */
        /* 'featured' => array(
          'name' => 'featured',
          'value' => $model->featured?"Yes":"No",
          ), */
        'date_created',
    ),
));
?>
