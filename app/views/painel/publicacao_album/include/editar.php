<?php
	$id = $_par;
	$Foto = new FotoModel;
	$r = $Foto->id($id);
	if(!$r) exit();

	$_app = 'foto';
?>
<div id="bloco_foto_editar" class="app_geral_add app_geral_ajax">
    <header class="header_principal volta">
		<a class="voltar but_fechar_ajax" href="#voltar"></a>
		<h1>EDITAR</h1>
    </header>

	<form class="form_geral" id="form_geral" action="<?= PAINEL ?>/post-salvar" method="post">

		<input type="hidden" id="form_app_geral" value="<?= $_app ?>">
		<input type="hidden" id="form_volta_geral" value="">

		<input type="hidden" name="id" value="<?= $r->id ?>">

		<fieldset>
			<label>Titulo:</label>
			<input type="text" name="foto_titulo" value="<?= $r->foto_titulo ?>" placeholder="Digite um nome">
		</fieldset>

		<button id="but_add_geral" data-historico="0"><i data-font="&#xf0ee;"></i><span>SALVAR</span></button>

	</form>
</div>
