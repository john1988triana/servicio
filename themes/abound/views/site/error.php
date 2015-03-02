<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>array('Error'),
			  'homeLink'=>CHtml::link('Home',array("index")),
            'htmlOptions'=>array('class'=>'breadcrumb well')
 ));
?>
<div class="alert alert-error">
	<h2>Error <?php echo $code; ?></h2>

	<div class="error">
		<?php echo CHtml::encode($message); ?>
	</div>
</div>