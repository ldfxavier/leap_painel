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

		<label>Nome:</label>
		<input type="text" data-tamanho="" name="nome" value="<?= P::r($r, 'nome'); ?>" placeholder="Digite um nome">

		<label>Portifólio:</label>
		<input type="text" data-tamanho="" name="portifolio" value="<?= P::r($r, 'portifolio'); ?>" placeholder="Digite um link para o portifólio">

		<label>Texto:</label>
		<?= Form::editor('descricao', P::r($r, 'descricao'), 'normal'); ?>

	</fieldset>
</div>


<div class="linha_grande">
	<fieldset class="bloco_checkbox_todos">
		<?php
			$Painel = new PainelModel;
			$cursos = $Painel->p_select('institucional_cursos', 'id', 'titulo');
		?>
		<div class="checkbox">
			<div class="legenda">CURSOS</div>
			<?php
				foreach($cursos as $ind => $val):
					$valor = (isset($r->cursos) && in_array($ind, $r->cursos)) ? true : false;
					echo Form::checkbox('cursos', $ind, $val, $valor, array('data-valor' => $valor));
				endforeach;
			?>
		</div>
	</fieldset>
</div>

<div class="linha_grande">
	<fieldset>
		<div class="legenda">IMAGENS PRINCIPAL</div>
		<?= Form::imagem('ENVIAR IMAGEM PRINCIPAL <span>(Será redirecionada para 200 x 280)</span>', 'imagem', P::r($r, 'imagem->valor'), 'professores', 'jpg/jpeg/png', 300, '280', 'cortar', 'img'); ?>
	</fieldset>
</div>
<div class="linha">
	<fieldset>
		<div class="legenda">PERMISSÕES</div>
		<?= Form::booleano('status', 'Ativar?', P::r($r, 'status->valor')); ?>
	</fieldset>
</div>
