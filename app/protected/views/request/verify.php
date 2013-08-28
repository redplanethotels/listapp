<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
	'heading'=>'Your subscription is verified',
)); ?>

<?php 
if ($model->name<>'') 
  echo '<br /><p>Hi '.$model->name.'</p>';
  ?>
<p>You've been added to the mailing list: <?php echo $mglist->name; ?></p>
 
<?php $this->endWidget(); ?>
