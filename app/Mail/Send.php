<?php

function sendMailContact($for, Array $data)
{
    $template = require 'Template.php';

    $affair = 'CIOPPA - Correo de contacto';

    if ($data['type'] == "Vivero" || $data['type'] == "Paisajista") {
        $str = '<hr><strong>Empresa:&nbsp;</strong><em>%empresa%</em><hr><strong>CUIT:&nbsp;</strong><em>%cuit%</em>';
        $str = str_replace("%empresa%", $data['empresa'], $str);
        $str = str_replace("%cuit%", $data['cuit'], $str);
    }else
        $str = '';
    
    foreach ($data as $k => $v) {
        $template = str_replace("%".$k."%", $v, $template);
    }

    $message = str_replace("%str%", $str, $template);
    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $headers  = 'MIME-Version: 1.0\r\n';
    $headers .= 'Content-type: text/html; charset=iso-8859-1\r\n';
    $headers .= 'From: '.$data['nombre'].' <'.$data['email'].'>\r\n';

    mail($for, $affair, $message, $headers);
}