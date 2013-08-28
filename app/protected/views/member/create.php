<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Create',
);

?>

<h1>Create Member</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>