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

<div class="linha">
	<fieldset>
		<div class="legenda">DADOS</div>

		<label>Titulo:</label>
		<input type="text" data-tamanho="" name="titulo" value="<?= P::r($r, 'titulo'); ?>" placeholder="Digite um título">

		<label>Texto:</label>
		<?= Form::editor('texto', P::r($r, 'texto'), 'normal') ; ?>

	</fieldset>
</div>

<div class="linha">
	<fieldset>
		<div class="legenda">DATAS</div>

		<div class="cabecalho_data">
			<label>Data da postagem inicio:</label>
			<?= Form::data('data_postagem_inicio', P::r($r, 'data->postagem_inicio->br'), null, true);?>
		</div>

		<div class="cabecalho_data">
			<label>Data da postagem final:</label>
			<?= Form::data('data_postagem_final', P::r($r, 'data->postagem_final->br'), null, true);?>
		</div>
	</fieldset>
</div>

<div class="linha">
	<fieldset class="lista">
		<?= Form::arquivo_lista($cod, 'DOCUMENTOS DO PARCEIRO', P::r($r, 'arquivo_oculto'), 'pdf', 2) ?>
	</fieldset>
</div>

<div class="linha">
	<fieldset class="lista">
		<div class="legenda">STATUS</div>
		<?= Form::booleano('status', 'Ativar?', P::r($r, 'status->valor')); ?>
	</fieldset>
</div>
