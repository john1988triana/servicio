<?php
$baseUrl = Yii::app()->theme->baseUrl; 
?>
     <div class="summary p_usuarios">
      <div class="tit_plugin">Mi Información</div>
        <ul>
              <li>
              <span class="summary-icon">
                      <img src="<?php echo $baseUrl ;?>/img/group.png" width="36" height="36" alt="Active Members">
              </span>
              <span class="summary-title"> Usuario:</span>
              <span class="summary-number"><?php echo Yii::app()->user->getState('usuario');?></span>
          </li>
          <li>
              <span class="summary-icon">
                      <img src="<?php echo $baseUrl ;?>/img/page_white_edit.png" width="36" height="36" alt="Open Invoices">
              </span>
              <span class="summary-title"> Cargo:</span>
              <span class="summary-number"><?php echo Yii::app()->user->getState('cargo');?></span>
          </li>
          <li>
              <span class="summary-icon">
                      <img src="<?php echo $baseUrl ;?>/img/maps.png" width="36" height="36" alt="Open Quotes<">
              </span>
              <span class="summary-title"> Empresa:</span>
              <span class="summary-number"><?php echo Yii::app()->user->getState('nempresa');?></span>
          </li>
          <li>
              <span class="summary-icon">
                      <img src="<?php echo $baseUrl ;?>/img/calendar.png" width="36" height="36" alt="Recent Conversions">
              </span>
              <span class="summary-title">Fecha y Hora :</span>
              <div id="reloj" style="padding-left : 50px;"><span class="summary-number">Hora No Disponible</span></div>
          </li>
        </ul>
</div>

<script>
  function funcionReloj(){ 
    var horaActual = new Date(); 
    var hora = horaActual.getHours(); 
    var minuto = horaActual.getMinutes(); 
    var segundo = horaActual.getSeconds(); 
    var ano = horaActual.getFullYear();
    var mes = horaActual.getMonth();
    var dia = horaActual.getDate();
    var sdia = horaActual.getDay();
    var ndia = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    var nmes =  new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    var imprimir = "<span class='summary-number'>" + hora + " : " + minuto + " : " + segundo + " - " + ndia[sdia] + "<br>" + dia + "-" + nmes[mes] + "-" + ano +"</span>"
     
    document.getElementById('reloj').innerHTML = imprimir; 
    setTimeout("funcionReloj()",1000) ;
} 
document.addEventListener('load',funcionReloj(),false);
</script>
