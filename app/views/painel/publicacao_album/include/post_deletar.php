<?php
	$id = $_post['id'];
	$Foto = new FotoModel;
	echo $Foto->deletar($id);
