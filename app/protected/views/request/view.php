<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
	'heading'=>'Thanks for your subscription request',
)); ?>

<?php 
if ($model->name<>'') 
  echo '<br /><p>Hi '.$model->name.'</p>';
  ?>
<p>Please check your email for a verification link. You will need to click on this before your subscription becomes active.</p>
 
<?php $this->endWidget(); ?>
