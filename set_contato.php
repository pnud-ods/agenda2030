<?php
include_once 'conectar.php';
$nome  = $_REQUEST['nome'];
$email = $_REQUEST['email'];
$msg   = $_REQUEST['msg'];
$ods   = $_REQUEST['ods'];
$retorno = array();
//Insere contato no banco de dados
$sql = "insert into participacao
        (nom_contato, dsc_email_contato, dsc_mensagem, dsc_ods, dsc_ip) values
        ('$nome', '$email', '$msg', '$ods', '{$_SERVER['REMOTE_ADDR']}');";
if($conn->query($sql)){
    $retorno['status'] = 'ok';
}
else{
    $retorno['status'] = 'fail';
}

die( json_encode($retorno, JSON_UNESCAPED_UNICODE) );

