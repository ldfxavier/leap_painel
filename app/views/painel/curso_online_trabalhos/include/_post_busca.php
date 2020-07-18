<?php
$Painel = new PainelModel;

$dados = "";
if(isset($_POST['busca']) && !empty($_POST['busca'])):
    $dados = $Painel->p_read("usuario_usuario", "`usuario`.`nome` LIKE '%".$_POST['busca']."%'");
endif;

$where = [];

if($dados):
    $id = [];
    foreach($dados as $r):
        $id[] = $r->id;
    endforeach;
    $busca = "(`usuario` = '";
    $busca .= implode("' OR `usuario` = '", $id);
    $busca .= "')";
    $where[] = $busca;
endif;

if(isset($_POST['status']) && !empty($_POST['status'])):
    $where[] = "`status` = '".$_POST['status']."'";
endif;

$where = implode(" AND ", $where);
