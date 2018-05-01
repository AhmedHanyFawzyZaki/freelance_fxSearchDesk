<?php

$this->breadcrumbs = array(
    'Associated Keywords' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List AssociatedKeyword'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create AssociatedKeyword'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'Update AssociatedKeyword'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('translate', 'Delete AssociatedKeyword'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'View AssociatedKeyword') . ' "' . $model->title . '"'; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'title',
        'focal_keyword_id' => array(
            'name' => 'focal_keyword_id',
            'value' => $model->focalKeyword->title,
        ),
        'country_currency' => array(
            'name' => 'country_currency',
            'value' => $model->countryCurrency->title,
        ),
        'active' => array(
            'name' => 'active',
            'value' => $model->active?"Active":"Inactive",
        ),
        'is_focal' => array(
            'name' => 'is_focal',
            'value' => $model->is_focal?"Focal Keyword":"Country/Currency Keyword",
        ),
    ),
));
?>
