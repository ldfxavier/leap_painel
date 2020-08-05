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
<input type="hidden" name="url" value="<?= P::r($r, 'url->valor');?>">

<div class="center">
	<fieldset>
		<div class="legenda">TÍTULOS</div>

		<label>Título grande:</label>
		<input type="text" data-tamanho="" name="titulo_grande" value="<?= P::r($r, 'titulo->grande');?>" placeholder="Digite um título">

		<label>Título pequeno:</label>
		<input type="text" data-tamanho="" name="titulo_pequeno" value="<?= P::r($r, 'titulo->pequeno');?>" placeholder="Digite um título pequeno">
		<label>Sub Título:</label>
		<input type="text" data-tamanho="" name="titulo_chamada" value="<?= P::r($r, 'titulo->chamada');?>" placeholder="Digite um sub título">
	</fieldset>

	<fieldset>
		<div class="legenda">CABEÇALHO</div>

		<div class="cabecalho_data">
			<label>Data da postagem inicio:</label>
			<?= Form::datahora('data_postagem_inicio', P::r($r, 'data->postagem_inicio->br'), null, true);?>
		</div>

		<div class="cabecalho_data">
			<label>Data da postagem final:</label>
			<?= Form::datahora('data_postagem_final', P::r($r, 'data->postagem_final->br'), null, true);?>
		</div>

		<div class="cabecalho_data">
			<label>Data do início do evento:</label>
			<?= Form::data('data_evento_inicio', P::r($r, 'data->evento_inicio->br'), null, true);?>
		</div>

		<div class="cabecalho_data">
			<label>Data do final do evento:</label>
			<?= Form::data('data_evento_final', P::r($r, 'data->evento_final->br'), null, true);?>
		</div>
	</fieldset>

	<fieldset>
		<div class="legenda">IMAGEM PRINCIPAL</div>
		<?= Form::imagem('ENVIAR IMAGEM PRINCIPAL <span>(Será redirecionada para 650px)</span>', 'imagem', P::r($r, 'imagem->valor'), 'eventos', 'jpg/jpeg/png', 650, '30000', 'redimencionar', 'img');?>
	</fieldset>

	<fieldset>
		<div class="legenda">IMAGEM PARA REDE SOCIAL</div>
		<div class="imagem_social">
			<?= Form::imagem('IMAGEM REDE SOCIAL<span>(476x249 pixels)</span>', 'imagem_social', P::r($r, 'imagem_social->valor'), 'eventos', 'jpg/jpeg/png', 476, 249, 'cortar', 'img');?>
			<div class="dados">
				<div class="titulo_sub">Título de exemplo para rede social.</div>
				<div class="texto">Texto de exemplo para rede social...</div>
				<div class="dominio">DOMINIO.COM.BR</div>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<div class="legenda">TEXTOS</div>

		<label>Texto pequeno:</label>
		<input type="text" data-tamanho="" name="texto_pequeno" value="<?= P::r($r, 'texto->pequeno');?>" placeholder="Digite um texto pequeno">

		<label>Texto grande:</label>
		<?= Form::editor('texto_grande', P::r($r, 'texto->grande'), 'normal');?>
	</fieldset>

	<fieldset>
		<div class="legenda">PERMISSÕES</div>
		<?= Form::booleano('destaque', 'Evento em destaque?', P::r($r, 'destaque->valor')); ?>
		<?= Form::booleano('status', 'Ativar evento?', P::r($r, 'status->valor'));?>
	</fieldset>
</div>
