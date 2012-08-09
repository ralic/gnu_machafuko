<?php
$this->breadcrumbs=array(
	'Webs',
);

$this->menu=array(
	array('label'=>Yii::t('bm','Create Web'), 'url'=>array('create')),
	array('label'=>Yii::t('bm','Manage Web'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('bm','Webs'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>