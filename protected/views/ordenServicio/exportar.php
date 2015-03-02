<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Orden de Servicio</title>
			<style>
				body{color: #464642;
					font-family: helvetica, arial;
					font-size: 12px;}
				.bordeprincipal {border:1px solid #333333;
					height: 100%;	
					width: 100%;}
				.centrar{margin: 0px auto;
					width: 98%;}
				.derecha{margin-top: 5px;
					float: right;
					width: 35%;}
				.izquierda{font-size: 14px; 
					text-align: center;
					float: left;
					width: 60%;}
				#orden{border: 2px solid #a1a1a1;
    				padding: 5px 20px;
    				margin: 0px auto;
    				width: 25%;
    				border-radius: 25px;}
				.cajitausuario{background: #dddddd;
					border-radius: 10px;
					float: left;
					height: 100px;
					padding: 10px;
					width: 55%;}
				.cajitafecha{float:right;
					padding: 10px;
					width: 35%;}
				.cajitaequipo1{float: left;
					width: 48%;}
				.cajitaequipo2{float: right;
					width: 48%;}
				.preguntas table tr td{padding-right: 60px;}
				.titulo{margin-top: 10px;
					text-align: center;
					font-size: 13px;}
				.cajita{background-color: #dddddd;
					border-radius: 10px;
					height: 100px;
					padding-left: 10px;}
				.cajitap{/*background-color: #dddddd;*/
					border-radius: 10px;
					height: 50px;	
					padding: 10px;}
				.cajitaa{height: 40px;	
					padding: 5px;}
				.peque{font-size: 9px;
					text-align: center;}
				.consejo{background-color: #FF4719;
					border-radius: 10px;
					color: #ffffff;
					margin: 0px auto;
					padding: 1px;
					text-align: center;}
				.cajasuper{/*background: #dddddd;*/
					border-radius: 10px;
					padding: 10px;}
			</style>
	</head>
	<body>
		<div class="bordeprincipal">
			<div class="centrar">
				<div class="logo">
					<div class="izquierda">
						<p><strong>ORDEN DE SERVICIO</strong></p></br>
						<p id="orden"><strong><?php echo $model->id; ?></strong></p>	
					</div>
					<div class="derecha">
						<?php
							if($model->id_usuario==1){
								echo '<img src="images/logo_pcmac.png" width="180" height="90" alt="Logo PcMac">';
							}
							if($model->id_usuario==2){
								echo '<img src="images/logo_etb.gif" width="100" height="100" alt="Logo ETB">';
							} 
							if($model->id_usuario==3){
								echo '<img src="images/avantel_logo.png" width="150" height="90" alt="Logo Avantel">';
							}
						?>
					</div>
				</div>
				<br>
				<div>
					<div class="cajitausuario">
						<table>
							<tr>
								<td><strong>Identificaci&oacute;n:</strong></td>
								<td> <?php echo $model->docu_cliente; ?></td>
							</tr>
							<tr>
								<td><strong>Nombre:</strong></td>
								<td> <?php echo $model->nom_cliente; ?></td>
							</tr>
							<tr>
								<td><strong>Tel&eacute;fono:</strong></td>
								<td> <?php echo $model->tele_cliente; ?></td>
							</tr>
							<tr>
								<td><strong>Direcci&oacute;n:</strong></td>
								<td> <?php echo $model->dire_cliente; ?></td>
							</tr>
							<tr>
								<td><strong>E-Mail:</strong></td>
								<td><a href=""><?php echo $model->mail_cliente; ?></a></td>
							</tr>
							<tr>
								<td><strong>Garant&iacute;a:</strong></td>
								<td> <?php echo $modetalle->garantia; ?></td>
							</tr>
						</table>
					</div>
					<div class="cajitafecha">
						<table>
							<tr>
								<td><strong>Fecha Inicio:</strong></td>
								<td><?php echo $model->fecha_inicio; ?></td>
							</tr>
							<tr>
								<td><strong>Fecha Entrega:</strong></td>
								<td><?php echo $model->fecha_entrega ?></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="titulo"><strong>Informaci&oacute;n del Equipo</strong></div>
				<div class="cajasuper">
					<div>
						<div class="cajitaequipo1">
							<table>
								<tr>
									<td><strong>Referencia:</strong></td>
									<td><?php echo $modetalle->referencia; ?></td>
								</tr>	
								<tr>
									<td><strong>Clave del Eqipo:</strong></td>
									<td><?php echo $modetalle->contra_di; ?></td>
								</tr>
							</table>
						</div>
						<div class="cajitaequipo2" >
							<table>
								<tr>
									<td><strong>Serial:</strong></td>
									<td><?php echo $modetalle->serial; ?></td>
								</tr>
								<tr>
									<td><strong>Clave Icloud:</strong></td>
									<td><?php echo $modetalle->contra_cl; ?></td>
								</tr>
							</table>
						</div>
					</div>
					<strong>Accesorios:</strong>
					<div class="cajitaa"><?php echo $modetalle->accesorio; ?></div>
					<div class="preguntas">
						<table>
							<tr>
								<td><strong>Prende?</strong></td>
								<td><?php echo $modetalle->prende; ?></td>
								<td><strong>Da Imagen?</strong></td>
								<td><?php echo $modetalle->imagen; ?></td>
								<td><strong>Backup?</strong></td>
								<td><?php echo $modetalle->back; ?></td>
							</tr>
						</table>
					</div>
				</div>	
				<div class="titulo"><strong>Problema</strong></div>
				<div class="cajita">
					<p><?php echo $modetalle->problema; ?></p>
				</div>
				<div class="titulo"><strong>Diagn&oacute;stico</strong></div>
				<div class="cajita">
					<p><?php echo $modetalle->diagnostico; ?></p>
					<p style="text-align:center; color: #FF4719; font-size: 10px;">Todo Diagn&oacute;stico Tiene Costo</p>
				</div>
				<div class="titulo"><strong>Repuesto Solicitado</strong></div>
				<div class="cajitap"><?php echo $modetalle->repuesto; ?></div>
				<div class="peque"> 	
					<p><strong>INQUIETUDES: sistema@pcmac.co / Bogot&aacute;:</strong> Cr13 A No. 86A-84 PBX: 611 19 11 <br>
					<strong>Cali:</strong> C.C. Holguines Trade Center Cra.100 No.11-90 Local 177 PBX: 524 4777 / 524 57 77 <br>
					<strong>Medellin:</strong> Av. el poblado Cra. 43 a #11-65 local 5.</p>
				</div>
				<div class="consejo">
					<p>¡NO SE RESPONDE! Por Ning&uacute;n equipo despues de 90 d&iacute;as de recibido, ni por la informaci&oacute;n que
					contengan las m&aacute;quinas (Se debe hacer backup antes de entregar la m&aacute;quina al laboratorio)</p>
				</div>
			</div>
		</div>
	</body>
</html>