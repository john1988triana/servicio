<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title><?php echo Yii::app()->name;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Admininstracion Servicio Tecnico de PcMac">
        <meta name="author" content="john1988triana@gmail.com">
    	<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>

        
    	<?php
    	  $baseUrl = Yii::app()->theme->baseUrl; 
    	  $cs = Yii::app()->getClientScript();
    	  Yii::app()->clientScript->registerCoreScript('jquery');
    	?>
        <!-- Iconos -->
        <link rel="shortcut icon" href="<?php echo $baseUrl;?>/img/icons/faviconpcmac.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $baseUrl;?>/img/icons/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $baseUrl;?>/img/icons/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo $baseUrl;?>/img/icons/apple-touch-icon-57-precomposed.png">
    	<?php  
        	$cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
        	$cs->registerCssFile($baseUrl.'/css/bootstrap-responsive.min.css');
        	$cs->registerCssFile($baseUrl.'/css/abound.css');
    	    $cs->registerCssFile($baseUrl.'/css/animate.css');
        ?>
        <!-- styles for style switcher -->
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/normalize.css" />
      	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/style-brown.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/servicios.css" />
    
    	<?php
            $cs->registerScriptFile($baseUrl.'/js/modernizr.js');
        	$cs->registerScriptFile($baseUrl.'/js/bootstrap.min.js');
        	$cs->registerScriptFile($baseUrl.'/js/plugins/jquery.sparkline.js');
        	$cs->registerScriptFile($baseUrl.'/js/plugins/jquery.flot.min.js');
        	$cs->registerScriptFile($baseUrl.'/js/plugins/jquery.flot.pie.min.js');
        	$cs->registerScriptFile($baseUrl.'/js/charts.js');
        	$cs->registerScriptFile($baseUrl.'/js/plugins/jquery.knob.js');
        	$cs->registerScriptFile($baseUrl.'/js/plugins/jquery.masonry.min.js');
        	$cs->registerScriptFile($baseUrl.'/js/styleswitcher.js');
            $cs->registerScriptFile($baseUrl.'/js/bootstrap-datepicker.js');
            $cs->registerScriptFile($baseUrl.'/js/jquery.animate-colors-min.js');
    	?>
    </head>
    <body>
        <!--[if lt IE 8]>
        <div class="alert alert-error">
            <p class="browsehappy">Está utilizando un <strong>obsoleta</strong>navegador. Por favor <a href="http://browsehappy.com/">actualizar su navegador</a> para mejorar su experiencia.</p>
        </div>
        <![endif]-->
        <section id="navigation-main">   
        <!-- Require the navigation -->
            <?php require_once('tpl_navigation.php');?>
        </section> <!--/#navigation-main -->
    
        <section class="main-body">
            <div class="container-fluid">
                <!-- Include content pages -->
                <?php echo $content; ?>
            </div>
        </section>
        
        <!-- Require the footer -->
        <?php require_once('tpl_footer.php'); ?>
  </body>
</html>