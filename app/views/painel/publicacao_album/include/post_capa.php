<?php
	$id = $_post['id'];
	$cod = $_post['cod'];

	$Foto = new FotoModel;

	echo $Foto->atualizar_capa($id, $cod);
