<?php
/**
 * @var UserAdminController $this
 * @var CActiveForm $form
 */
?>
<div class="form mt20">
    <?php

    $form = $this->beginWidget('CActiveForm', array(
        //'id'=>'network-form-_form-form',
        'id' => 'post-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // See class documentation of CActiveForm for details on this,
        // you need to use the performAjaxValidation()-method described there.
        'enableAjaxValidation' => true,
        // 'htmlOptions' => array('class' => 'dropzone')
    )); ?>

    <div class="row logo-center img-responsive">
        <div class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 col-sm-4 col-sm-offset-4">
            <?php echo CHtml::image('images/SB_Logo.png');?>
        </div>
    </div>

    <div class="text-box">

        <div class="row col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 col-sm-4 col-sm-offset-4">
            <?php echo $form->labelEx($model, 'linkAddress'); ?>
            <?php echo $form->textField($model, 'linkAddress', ['class' => 'form-control', 'placeholder' => 'Enter Link']); ?>
            <?php echo $form->error($model, 'linkAddress'); ?>

        </div>


        <div class="row col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 col-sm-4 col-sm-offset-4">
            <?php echo $form->labelEx($model, 'text'); ?>
            <?php echo $form->textArea($model, 'text', ['class' => 'form-control', 'placeholder' => 'Enter Text', 'rows'=>'7']); ?>
            <?php echo $form->error($model, 'text'); ?>
        </div>

        <div class="row"></div>

        <div class="row col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4 col-sm-4 col-sm-offset-4">
            <?php echo CHtml::link('Cancel', ['/site/index'], ['class' => 'btn-space-left position-right btn btn-sm btn-danger btn-glyphicons']); ?>
            <?php echo CHtml::htmlButton('Submit', ['type' => 'submit', 'class' => 'position-right btn btn-sm btn-primary btn-glyphicons']); ?>
        </div>

        <div class="row"></div>

        <?php $this->endWidget(); ?>
    </div>

</div>
<!-- form -->