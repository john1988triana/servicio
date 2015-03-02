<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="row-fluid">
	<div class="span3 hidden-tablet">
		<div class="span3 hidden-phone fixedo">
		
			<div class="sidebar-nav">  
				<div class="tit_plu">Operaciones</div>
		  		<?php $this->widget('zii.widgets.CMenu', array(
				/*'type'=>'list',*/
				'encodeLabel'=>false,
				'items'=>array(
					array('items'=>$this->menu),
				),
				));?>
				<br>
				<?php Yii::import('ext.mio.plg_usuarios',true); ?>
			</div>      
		</div>
		<div class="span3 visible-phone">

    		<?php if(isset($this->breadcrumbs)):?>
		  		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
            			'links'=>$this->breadcrumbs,
			      		'homeLink'=>CHtml::link('Inicio',array('site/index')),
            			'htmlOptions'=>array('class'=>'breadcrumb well')
        		)); ?><!-- breadcrumbs -->
    		<?php endif?>
		
			<div class="sidebar-nav">  
				<div class="tit_plu">Operaciones</div>
		  		<?php $this->widget('zii.widgets.CMenu', array(
				/*'type'=>'list',*/
				'encodeLabel'=>false,
				'items'=>array(
					array('items'=>$this->menu),
				),
				));?>
				<br>
			</div>      
		</div>
   </div><!--/span-->
  <div class="span9">
    <div class="hidden-phone">
    	
    <?php if(isset($this->breadcrumbs)):?>
		  <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
			      'homeLink'=>CHtml::link('Inicio',array('site/index')),
            'htmlOptions'=>array('class'=>'breadcrumb well')
        )); ?><!-- breadcrumbs -->
    <?php endif?>
    </div>
    
    <!-- Include content pages -->
    <?php echo $content; ?>

	</div><!--/span-->
  </div><!--/row-->


<?php $this->endContent(); ?>