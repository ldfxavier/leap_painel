<?php
	$equipe = $_SESSION['EQUIPE'];
	$permissao = $equipe->permissao->lista;
	$desenvolvedor = $equipe->desenvolvedor == 1 ? true : false;

	$r = $_dado;
	$cod = $r->cod;
?>
<script src="<?= LINK ?>/app/views/painel/<?= $_app ?>/scripts/all.js" type="text/javascript"></script>
<div id="bloco_visualizar_<?= $_app ?>" class="app_geral_visualizar">
    <header class="header_principal volta header_principal_animacao header_principal_absolute">
		<a class="voltar" href="<?= PAINEL ?>/app/<?= $_app ?>"></a>
        <h1>VISUALIZAR</h1>
		<?php if($desenvolvedor || in_array(Permissao::nome($_app).'_editar', $permissao)): ?>
		<div data-href="<?= PAINEL ?>/editar/<?= $_app ?>/<?= $cod ?>" data-width="500" data-ajuda="Editar dados" class="but_bloco_ajax editar"></div>
		<?php endif; ?>
    </header>
	<div class="header_principal_false"></div>

	<input type="hidden" id="input_galeria_id" value="<?= $r->id ?>">
	<input type="hidden" id="input_galeria_cod" value="<?= $cod ?>">

	<div class="album">
		<div class="add imagem" id="but_galeria_upload">
			<i data-font="&#xf0ee;"></i>
			<p>ADICIONAR<br>IMAGEM</p>
			<span></span>
			<input data-cod="<?= $cod ?>" type="file" value="">
		</div>
		<div class="lista">
			<figure class="imagem"></figure>
			<?php
				if($r->lista):
					foreach($r->lista as $foto_r):
			?>
			<figure style="background-image:url(<?php echo $foto_r->imagem->link ?>)" data-imagem="<?php echo $foto_r->imagem->valor ?>" data-id="<?php echo $foto_r->id ?>" class="but_editar_foto imagem"><i class="editar but_bloco_ajax" data-href="<?= PAINEL ?>/incorporar/<?= $_app ?>/editar/par/<?php echo $foto_r->id ?>" data-width="400" data-font="&#xe807;" data-ajuda="Editar imagem"></i><i class="capa" data-font="&#xe80b;" data-ajuda="Colocar como capa"></i><i class="deletar" data-font="&#xe808;" data-ajuda="Deletar imagem"></i></figure>
			<?php
					endforeach;
				endif;
			?>
		</div>
	</div>

</div>
