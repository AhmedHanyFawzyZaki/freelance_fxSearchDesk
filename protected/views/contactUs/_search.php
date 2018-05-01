<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
        'type'=>'horizontal',
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span9')); ?>

	<?php echo $form->textFieldRow($model,'company_name',array('class'=>'span9','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span9','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span9','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span9','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span9','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'subject',array('class'=>'span9','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'comment',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'send_updates',array('class'=>'span9')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
