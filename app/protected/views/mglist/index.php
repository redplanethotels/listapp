<?php
$this->breadcrumbs=array(
	'Mglists',
);

$this->menu=array(
	array('label'=>'Create Mglist','url'=>array('create')),
	array('label'=>'Manage Mglist','url'=>array('admin')),
);
?>

<h1>Manage Lists</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
