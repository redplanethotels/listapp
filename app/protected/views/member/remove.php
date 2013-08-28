<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
	'heading'=>'Removed from List',
)); ?>

<?php 
if ($member->address<>'') 
  echo '<br /><p>Hi '.$member->address.'</p>';
  ?>
<p>We have removed you from <?php echo $mglist->name; ?></p>
 
<?php $this->endWidget(); ?>
