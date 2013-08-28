<?php
$this->breadcrumbs=array(
	'Mglists'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

/*
$this->menu=array(
	array('label'=>'List Mglist','url'=>array('index')),
	array('label'=>'Create Mglist','url'=>array('create')),
	array('label'=>'View Mglist','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Mglist','url'=>array('admin')),
);
*/
?>

<h1>Update Mglist <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>