<?php
	$equipe = $_SESSION['EQUIPE'];
	$permissao = $equipe->permissao->lista;
	$desenvolvedor = $equipe->desenvolvedor == 1 ? true : false;

	$r = isset($_dado) ? $_dado : '';

	if(isset($r->cod)) $cod = $r->cod;
	else $cod = md5(uniqid(time()));

	$coluna = (object)$_coluna;

	$volta = PAINEL.'/app/'.$_app;
?>
<link rel="stylesheet" href="<?= LINK; ?>/app/views/painel/<?= $_app; ?>/scripts/layout.css"/>

<input type="hidden" id="form_app_geral" value="<?= $_app; ?>">
<input type="hidden" id="form_volta_geral" value="<?= $volta; ?>">

<input type="text" class="input_zero" value="">
<input type="password" class="input_zero" value="">
<?php if(isset($r->id)): ?>
<input type="hidden" name="id" value="<?= $r->id; ?>">
<?php else: ?>
<input type="hidden" name="id" data-falso="1" value="">
<?php endif; ?>
<input type="hidden" name="cod" value="<?= $cod; ?>">

<div class="center">
	<fieldset>
		<div class="legenda">TÍTULOS</div>

		<label>Título:</label>
		<input type="text" data-tamanho="" name="titulo" value="<?= P::r($r, 'titulo->titulo');?>" placeholder="Digite um título">

		<label>Sub título:</label>
		<input type="text" data-tamanho="" name="titulo_pequeno" value="<?= P::r($r, 'titulo->pequeno');?>" placeholder="Digite um título pequeno">
	</fieldset>

	<fieldset>
		<div class="legenda">VÍDEO</div>
		<?= Form::video('Vídeo', 'video', P::r($r, 'video->valor')) ?>
	</fieldset>

	<fieldset>
		<div class="legenda">DADOS</div>

		<label>CNJP:</label>
		<input type="text" name="cnpj" data-mascara="cnpj" value="<?= P::r($r, 'cnpj');?>" placeholder="Digite um CNPJ">

		<label>Endereço:</label>
		<input type="text" name="endereco" value="<?= P::r($r, 'endereco');?>" placeholder="Digite um endereço">

		<label>Mapa (Link do google):</label>
		<input type="text" name="mapa" value="<?= P::r($r, 'mapa');?>" placeholder="Digite um link para o mapa">

		<label>E-mail:</label>
		<input type="text" name="email" value="<?= P::r($r, 'email');?>" placeholder="Digite um e-mail">

		<label>Telefone celular:</label>
		<input type="text" name="celular" value="<?= P::r($r, 'celular');?>" placeholder="Digite um telefone celular">

		<label>Telefone fixo:</label>
		<input type="text" name="telefone" value="<?= P::r($r, 'telefone');?>" placeholder="Digite um telefone fixo">
	</fieldset>
</div>
