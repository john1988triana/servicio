<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="#">PcMac <small>Servicio Tecnico</small></a>
          
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        array('label'=>'Usuarios','url'=>array('usuario/admin'), 'visible'=>Yii::app()->user->checkAccess('admin')),
                        array('label'=>'Empresas','url'=>array('empresa/admin'), 'visible'=>Yii::app()->user->checkAccess('admin')),
                        array('label'=>'Estados Predeterminados','url'=>array('estadopredet/admin'), 'visible'=>Yii::app()->user->checkAccess('admin')),
                        array('label'=>'Administraci&oacute;n','url'=>array('ordenservicio/admin'), 'visible'=>Yii::app()->user->checkAccess('tecnico')),
                        array('label'=>'Administraci&oacute;n','url'=>array('ordenservicio/adminn'), 'visible'=>Yii::app()->user->checkAccess('recepcionOtrasEmpresas')),
                        array('label'=>'Administraci&oacute;n','url'=>array('ordenservicio/adminp'), 'visible'=>Yii::app()->user->checkAccess('recepcionPcMac')),
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>