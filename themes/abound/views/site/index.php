<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>

<?php if (Yii::app()->user->isGuest) { ?>

    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="hero-unit animated bounceInUp"> 
                    <h1><?php echo Yii::app()->name;?></h1>    
                    <?php echo CHtml::link("Login",array('site/login'),array('class'=>'btn btn-primary btn-large')); ?>
                </div>
            </div>
        </div>
    </div>

<?php } else {  ?>

    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="hero-unit animated bounceInUp">	
                    <h1> <?php echo Yii::app()->name;?></h1>
     				<p>Buen dia compa&ntilde;o <strong><?php echo Yii::app()->user->usuario; ?></strong> que tenga un excelente dia y recuerda iniciar su labor en la parte superior de la pantalla</p>
                </div>
            </div>
        </div>
    </div>

<?php } ?>