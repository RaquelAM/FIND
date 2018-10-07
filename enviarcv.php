<?php
require_once('class.phpmailer.php');
require('fpdf.php');

	$adminemail = "";





	$nombre = $_POST['name'];
	$email = $_POST['email'];
	$direccion = $_POST['adress'];
	$puesto = $_POST['puesto'];
	$tel	=	$_POST['phone'];
	$edad	=	$_POST['age'];
	$estudios= $_POST['estudios'];
	$mje	=	stripslashes($_POST['msj']);


$mail_caract = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";




	if($nombre=="" || $email=="" || $direccion=="" || $puesto=="" || $tel=="" || $edad=="" || $estudios=="" || $mje=="")
	{
		echo 1;
	}
	elseif(!preg_match($mail_caract, $email)){


		echo 2;

	}else{



	$mail = new PHPMailer;
	$mail->setFrom($email, '');
	$mail->addAddress('empleo@finddevelopingtalent.com', '');
	$mail->Subject  = 'Te han contactado desde find.com';
	$mail->isHTML(true);
	$mail->Body     = "<table width='100%' border='0'  >
						  <tbody>
							<tr>

							</tr>
	                        <tr>
							  <td style='height:20px; '></td>
							</tr>
							<tr>
							  <td style='font-weight:600; color: #aad509; text-align: left; font-size:14px;'>Nombre: <span style='color: #797979'>".$nombre."</span></td>
							</tr>
							<tr>
							  <td style='font-weight:600; color: #aad509; text-align: left; font-size:14px;'>e-mail: <span style='color: #797979'>".$email."</span></td>
							</tr>
							<tr>
							  <td style='font-weight:600; color: #aad509; text-align: left; font-size:14px;'>Dirección: <span style='color: #797979'>".$direccion."</span></td>
							</tr>
							<tr>
							  <td style='font-weight:600; color: #aad509; text-align: left; font-size:14px;'>Puesto deseado: <span style='color: #797979'>".$puesto."</span></td>
							</tr>
							<tr>
							  <td style='font-weight:600; color: #aad509; text-align: left; font-size:14px;'>Tel&eacute;fono: <span style='color: #797979'>".$tel."</span></td>
							</tr>
							<tr>
							  <td style='font-weight:600; color: #aad509; text-align: left; font-size:14px;'>Edad: <span style='color: #797979'>".$edad."</span></td>
							</tr>
							<tr>
							  <td style='font-weight:600; color: #aad509; text-align: left; font-size:14px;'>Estudios: <span style='color: #797979'>".$estudios."</span></td>
							</tr>
							<tr>
							</tr>
							<tr>
							  <td style='font-weight:600; color: #aad509; text-align: left; font-size:14px;'>Mensaje: <span style='color: #797979'>".$mje."</span></td>
							</tr>
	                        <tr>
							  <td style='height:20px; '></td>
							</tr>
							<tr>
	                            <td style='height:20px; background: #aad509; text-align:center; color:#fff; '></td>
	                        </tr>

						  </tbody>
						</table>";
	$mail->addStringAttachment(file_get_contents($_FILES['archivo']['tmp_name']),  $_FILES['archivo']['name'], 'base64', 'application/pdf');

	if(!$mail->send()) {
	  echo 3;
	} else {
	  echo 0;
	}


}



?>
