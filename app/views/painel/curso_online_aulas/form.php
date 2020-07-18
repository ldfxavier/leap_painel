<?php
	$equipe = $_SESSION['EQUIPE'];
	$permissao = $equipe->permissao->lista;
	$desenvolvedor = $equipe->desenvolvedor == 1 ? true : false;

	$r = isset($_dado) ? $_dado : '';

	$Painel = new PainelModel;

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
		<div class="legenda">VÍDEO</div>
		<?= Form::video('Vídeo', 'video', P::r($r, 'video->valor')) ?>
	</fieldset>
	<fieldset>
		<label>Link Zoom:</label>
		<input type="text" name="zoom" value="<?= P::r($r, 'zoom'); ?>" placeholder="Digite um link para aula ao vivo">
	</fieldset>
	<fieldset>
		<div class="legenda">DADOS</div>

		<label>Título:</label>
		<input type="text" data-tamanho="" name="titulo" value="<?= P::r($r, 'titulo'); ?>" placeholder="Digite um título">

		<label>Conteúdo:</label>
		<?= Form::editor('conteudo', P::r($r, 'conteudo'), 'normal'); ?>

		<label>Dicas:</label>
		<?= Form::editor('dica', P::r($r, 'dica'), 'normal'); ?>

		<label>Conteúdo:</label>
		<?= Form::editor('bibliografia', P::r($r, 'bibliografia'), 'normal'); ?>

		<label>Curso:</label>
		<?php
		$galeria = $Painel->p_select("curso_online_cursos", "id", "titulo", ["" => "Selecione um curso"]);
		echo Form::select('curso', $galeria, P::r($r, 'curso'));
		?>

		<label>Aula:</label>
		<input type="number" name="aula" value="<?= P::r($r, 'aula'); ?>" placeholder="Digite o número da aula">
	</fieldset>

	<fieldset>
		<div class="legenda">PERMISSÕES</div>
		<?= Form::booleano('status', 'Ativar?', P::r($r, 'status->valor')); ?>
	</fieldset>
</div>
