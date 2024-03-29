<?php
$equipe = $_SESSION['EQUIPE'];
$permissao = $equipe->permissao->lista;
$desenvolvedor = $equipe->desenvolvedor == 1 ? true : false;

$r = isset($_dado) ? $_dado : '';

if (isset($r->cod)) {
    $cod = $r->cod;
} else {
    $cod = md5(uniqid(time()));
}

$coluna = (object) $_coluna;

$volta = PAINEL . '/app/' . $_app;
?>
<link rel="stylesheet" href="<?=LINK;?>/app/views/painel/<?=$_app;?>/scripts/layout.css"/>

<input type="hidden" id="form_app_geral" value="<?=$_app;?>">
<input type="hidden" id="form_volta_geral" value="<?=$volta;?>">

<input type="text" class="input_zero" value="">
<input type="password" class="input_zero" value="">
<?php if (isset($r->id)): ?>
<input type="hidden" name="id" value="<?=$r->id;?>">
<input type="hidden" name="url" data-falso="1" value="">
<?php else: ?>
<input type="hidden" name="id" data-falso="1" value="">
<input type="hidden" name="url" value="titulo_grande">
<?php endif;?>
<input type="hidden" name="cod" value="<?=$cod;?>">
<input type="hidden" name="url" value="<?=P::r($r, 'url->valor');?>">

<div class="center">
	<fieldset>
		<div class="legenda">IMAGEM PRINCIPAL</div>
		<?=Form::imagem('ENVIAR IMAGEM PRINCIPAL <span>(Será redirecionada para 650px)</span>', 'imagem', P::r($r, 'imagem->valor'), 'cursos', 'jpg/jpeg/png/svg', 650, '30000', 'redimencionar', 'img');?>
	</fieldset>
	<fieldset>
		<div class="legenda">DADOS</div>

		<label>Título:</label>
		<input type="text" data-tamanho="" name="titulo" value="<?=P::r($r, 'titulo');?>" placeholder="Digite um título">

		<label>Chamada:</label>
		<input type="text" data-tamanho="200" name="chamada" value="<?=P::r($r, 'chamada');?>" placeholder="Digite uma chamada">

		<label>Texto:</label>
		<?=Form::editor('texto', P::r($r, 'texto'), 'normal');?>

		<label>Ordem</label>
		<input type="number" name="ordem" value="<?=P::r($r, 'ordem');?>">
	</fieldset>
	<fieldset>
		<div class="legenda">PERMISSÕES</div>
		<?=Form::booleano('status', 'Ativar?', P::r($r, 'status->valor'));?>
	</fieldset>
</div>
