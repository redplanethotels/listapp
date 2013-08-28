<h1>Subscribe to: <?php echo $mglist->name; ?></h1>

<?php 
echo $this->renderPartial('_form', array('model'=>$model,'mglist_id'=>$mglist->id)); ?>