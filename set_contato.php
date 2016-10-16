<?php
include_once 'conectar.php';
$nome   = $_REQUEST['nome'];
$email  = $_REQUEST['email'];
$ods    = implode(',', array_filter($_REQUEST['ods']));
$msg    = $_REQUEST['msg'];
$retorno = array();

//Envio de e-mail para o remetente
$assunto = 'Mensagem Cadastrada no Portal Agenda 2030';
$arquivo = "<html>
				<body>
                    <div>
                    Prezad@ $nome!<br/>
                    <br/>
                    Sua mensagem foi cadastrada no Portal Agenda 2030 com sucesso!<br/>
                    <br/>
                    Mensagem:<br/>
                    $msg
                    <br/>
                    <br/>
                    Agradecemos o contato.
                    </div>";
$arquivo .= "</body></html>";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$preferen = ["input-charset" => "UTF-8", "output-charset" => "UTF-8"];
$headers .= 'From: ' . preg_replace('/^:\s+/', '', iconv_mime_encode('', 'Agenda 2030', $preferen));
if( !mail($email, $assunto, $arquivo, $headers) ){
    $retorno['status'] = 'fail';
    $retorno['msg']    = 'O e-mail informado é inválido.';
    die( json_encode($retorno, JSON_UNESCAPED_UNICODE) );
}

//Envio de e-mail para o destinatário
$destino = 'matpamoreira@gmail.com';
$assunto = 'Novo Mensagem Cadastrada no Portal';
$arquivo = "<html>
				<body>
                    <div>
                    Novo Mensagem Cadastrada no Portal Agenda 2030<br/>
                    <br/>
                    Data: " .  date('d/m/y H:i:s') . "<br/>
                    Nome: $nome<br/>
                    E-mail: $email<br/>
                    ODSs: $ods<br/>
                    <br/>
                    Mensagem:<br/>
                    $msg
                    </div>";
$arquivo .= "</body></html>";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$preferen = ["input-charset" => "UTF-8", "output-charset" => "UTF-8"];
$headers .= 'From: ' . preg_replace('/^:\s+/', '', iconv_mime_encode('', 'Agenda 2030', $preferen));
if( !mail($destino, $assunto, $arquivo, $headers) ){
    $retorno['status'] = 'fail';
    die( json_encode($retorno, JSON_UNESCAPED_UNICODE) );
}

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

