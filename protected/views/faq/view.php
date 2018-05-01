<?php

$this->breadcrumbs = array(
    'Faqs' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List Faq'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create Faq'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'Update Faq'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('translate', 'Delete Faq'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'View Faq') . ' "' . $model->id . '"'; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'question'=>array(
            'name'=>'question',
            'value'=>$model->question,
            'type'=>'raw'
        ),
        'answer'=>array(
            'name'=>'answer',
            'value'=>$model->answer,
            'type'=>'raw'
        ),
        'active'=>array(
            'name'=>'active',
            'value'=>$model->active?'Active':'Inactive'
        )
    ),
));
?>
