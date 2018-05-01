<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
        'type'=>'horizontal',
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span9')); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span9','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span9','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span9','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span9','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'phone',array('class'=>'span9','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'image',array('class'=>'span9','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'user_type',array('class'=>'span9')); ?>

	<?php echo $form->textFieldRow($model,'date_created',array('class'=>'span9')); ?>

	<?php echo $form->textFieldRow($model,'url',array('class'=>'span9','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
