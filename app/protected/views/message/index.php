<?php
$this->breadcrumbs=array(
	'Messages',
);

$this->menu=array(
	array('label'=>'Create Message','url'=>array('create')),
	array('label'=>'Manage Message','url'=>array('admin')),
);
?>

<h1>Messages</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
