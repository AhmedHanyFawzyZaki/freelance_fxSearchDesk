<?php
$this->breadcrumbs = array(
    'Users' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => Yii::t('translate', 'List User'), 'url' => array('index')),
    array('label' => Yii::t('translate', 'Create User'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->pageTitlecrumbs = Yii::t('translate', 'Manage Users'); ?>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php
$this->renderPartial('_search', array(
    'model' => $model,
));
?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'user-grid',
    'type' => 'striped  condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'id',
        'username',
        //'password',
        'email',
        'first_name',
        'last_name',
        'date_of_renewal',
        'user_type' => array(
            'name' => 'user_type',
            'value' => '$data->userType->title',
            'filter' => CHtml::listData(UserType::model()->findAll(), 'id', 'title')
        ),
        'active'=>array(
            'name'=>'active',
            'value'=>'$data->active?"Active":"Inactive"',
            'filter'=>array('1'=>'Active', '0'=>'Inactive')
        ),
        /*
          'phone',
          'image',
          'user_type',
          'date_created',
          'url',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
