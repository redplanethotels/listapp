<?php
$this->breadcrumbs=array(
	'Mglists'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'Send a message','url'=>array('send')),
	array('label'=>'Create a list','url'=>array('create')),
);
*/
?>

<h1>Import Members to List</h1>

<?php echo $this->renderPartial('_import_form',array('model'=>$model)); ?>