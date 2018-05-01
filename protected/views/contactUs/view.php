<?php

$this->breadcrumbs = array(
    'Contact Uses' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List ContactUs'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create ContactUs'), 'url' => array('create')),
    array('label' => Yii::t('translate', 'Update ContactUs'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('translate', 'Delete ContactUs'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'View ContactUs') . ' "' . $model->id . '"'; ?>

<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'company_name',
        'first_name',
        'last_name',
        'title',
        'email',
        'subject',
        'comment',
        'send_updates'=>array(
            'name'=>'send_updates',
            'value'=>$model->send_updates?"Yes":"No",
        ),
    ),
));
?>
