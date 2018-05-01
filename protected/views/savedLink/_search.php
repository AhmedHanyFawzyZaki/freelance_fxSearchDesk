<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
        'type'=>'horizontal',
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span9')); ?>

	<?php echo $form->textFieldRow($model,'link',array('class'=>'span9','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span9')); ?>

	<?php echo $form->textFieldRow($model,'folder_id',array('class'=>'span9')); ?>

	<?php echo $form->textFieldRow($model,'date_created',array('class'=>'span9')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
