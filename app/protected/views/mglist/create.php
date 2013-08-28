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

<h1>Create a Mailing List</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>