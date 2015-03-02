<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
// $this->pageTitle=Yii::app()->name . ' - Login';
// $this->breadcrumbs=array('Login',);
?>

    <div class="page-header">
    	<h1>Login</h1>
    </div>
    <div class="row-fluid">
        <div class="span3">&nbsp;</div>
        <div class="span6">
            <?php
               $this->beginWidget('zii.widgets.CPortlet', array(
              'title'=>"<h4>Acceso Restringido</h4>",
           ));
           ?>
            <h5>Diligencie el siguiente formulario para acceder al Sistema:</h5>
            <hr>
            <div class="form">
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'login-form',
                    'enableClientValidation'=>true,
                    'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                    ),
                )); ?>     
            <div class="row">
                <?php echo $form->labelEx($model,'<strong>Usuario: *&nbsp;&nbsp;</strong>',array('class'=>'span3')); ?>
                <?php echo $form->textField($model,'username'); ?>
                <?php echo $form->error($model,'username',array('class'=>'alert alert-error')); ?>  
            </div>
    
            <div class="row">
                <?php echo $form->labelEx($model,'<strong>Contrase&ntilde;a: *</strong>',array('class'=>'span3')); ?>
                <?php echo $form->passwordField($model,'password'); ?>
                <?php echo $form->error($model,'password',array('class'=>'alert alert-error')); ?>
            </div>
        
            <div class="row">
                <?php echo $form->label($model,'rememberMe',array('class'=>'span3')); ?>
                <?php echo $form->checkBox($model,'rememberMe'); ?>
                <?php echo $form->error($model,'rememberMe',array('class'=>'alert alert-error')); ?>
            </div>
    
            <div class="row buttons">
                <?php echo CHtml::submitButton('Entrar',array('class'=>'btn btn btn-primary btn-large')); ?>
            </div>
    
        <?php $this->endWidget(); ?>
        </div><!-- form -->

        <?php $this->endWidget();?>

        </div>
        <div class="span3">&nbsp;</div>

    </div>