<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($model,'id'); ?>
        <?php echo $form->textField($model,'id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'res'); ?>
        <?php echo $form->textField($model,'res'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'priority'); ?>
        <?php echo $form->textField($model,'priority'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'readed'); ?>
        <?php echo $form->textField($model,'readed'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
