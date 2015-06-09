<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'message-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

  <?php 

    if ($model->mglist_id == 0 ) {
      echo CHtml::activeLabel($model,'mglist_id',array('label'=>'Send to Mailing List:')); 
      echo $form->dropDownList($model,'mglist_id',Mglist::model()->getListOptions(),array('empty'=>'Select a List'));
    } else {
      echo CHtml::hiddenField('mglist_id',$model->mglist_id);
        }
  ?>

	<?php //  echo $form->textFieldRow($model,'mglist_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'subject',array('class'=>'span5','maxlength'=>255)); ?>

    <?php echo $form->textFieldRow($model,'campaign_id',array('maxlength'=>20, 'class'=>'span5')); ?>
    <?php echo $form->textFieldRow($model,'tag',array('maxlength'=>20, 'class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'body',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Send Message' : 'Send Message',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
