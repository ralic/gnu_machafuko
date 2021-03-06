<?php
$this->breadcrumbs=array(
    'Webs'=>array('index'),
    Yii::t('bm','Manage'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();

    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('web-grid', {
        data: $(this).serialize()
    });

    return false;
});
");
?>

<h1><?php echo Yii::t('bm','Manage Webs'); ?></h1>

<p>
<?php echo Yii::t('bm','You may optionally enter a comparison operator'); ?> (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
<?php echo Yii::t('bm','or'); ?> <b>=</b>) <?php echo Yii::t('bm','at the beginning of each of your search values to specify how the comparison should be done'); ?>.
</p>

<?php echo CHtml::link(Yii::t('bm','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model'=>$model,'resModel'=>$resModel,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'web-grid',
	'htmlOptions'=>array('class'=>'my-grid-view'),
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'id',
        array(
            'type'=>'raw',
            'header'=>Yii::t('bm','Name'),
            'name'=>'name',
            'value'=>'$data->resource->name',
            'filter'=>'<input name="Resource[name]" value="'.$resModel->name.'"/>',
        ),
        array(
            'type'=>'raw',
            'header'=>Yii::t('bm','Description'),
            'name'=>'description',
            'value'=>'$data->resource->description',
            'filter'=>'<input name="Resource[description]" value="'.$resModel->description.'"/>',
        ),
        array(
            'class'=>'CButtonColumn',
        ),
    ),
));
