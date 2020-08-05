<?php
	$r = isset($_dado) ? $_dado : '';

	if(isset($r->cod)) $cod = $r->cod;
	else $cod = md5(uniqid(time()));
?>

<input type="hidden" id="form_app_geral" value="<?= $_app ?>">
<input type="hidden" id="form_volta_geral" value="<?= PAINEL ?>/visualizar/<?= $_app ?>/<?= $cod ?>">

<?php if(isset($r->id)): ?>
<input type="hidden" name="id" value="<?= $r->id ?>">
<?php endif; ?>
<input type="hidden" name="cod" value="<?= $cod ?>">
<input type="hidden" name="url" value="<?= P::r($r, 'url') ?>">

<fieldset>
	<label>Titulo:</label>
	<input type="text" name="titulo" value="<?= P::r($r, 'titulo') ?>" placeholder="Digite um nome">
	<label>Descrição:</label>
	<textarea name="texto" placeholder="Digite uma descrição"><?= P::r($r, 'texto') ?></textarea>

	<?= Form::booleano('status', 'Ativar?', P::r($r, 'status->valor')); ?>
</fieldset>

<button id="but_add_geral" data-historico="0"><i data-font="&#xf0ee;"></i><span>SALVAR</span></button>
