<?php
	$arquivo = $_FILES['imagem'];
	$vinculo = $_POST['cod'];
	$Imagem = new Imagem;
	$imagem = $Imagem->upload($arquivo, 'album', 'redimencionar', ['png', 'jpg', 'jpeg'], 1200, 1200);
	$imagem = json_decode($imagem, true);

	if(!isset($imagem['erro'])):
		echo json_encode(array('Erro!', 'Ocorreu um erro no envio da sua imagem.'));
	elseif($imagem['erro'] == true):
		echo json_encode($imagem);
		exit();
	endif;

	$Foto = new FotoModel;
	$update = $Foto->salvar([
		'cod' => md5(uniqid(time())),
		'vinculo' => $vinculo,
		'imagem' => $imagem['arquivo'],
		'data_criacao' => date('Y-m-d H:i:s'),
		'status' => 1
	]);
	if($update['erro'] == true):
		echo json_encode($update);
		exit();
	elseif($update['erro'] == false):
		echo json_encode(array(
			'erro' => false,
			'id' => $update['id'],
			'arquivo' => $imagem['arquivo'],
			'link' => $imagem['link']
		));
		exit();
	endif;
