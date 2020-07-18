<?php
	$equipe = $_SESSION['EQUIPE'];
	$permissao = $equipe->permissao->lista;
	$desenvolvedor = $equipe->desenvolvedor == 1 ? true : false;

	// Título
	$_titulo = 'GALERIAS';

	// Controller
	$controller = 'postagem';

	// Botões
	$add = true;
	$relatorio = false;
	$download = false;
	$deletar = true;
	$selecao = true;

	// READ
	$where = $_where;

	$Model = new AlbumModel;
	$lista = $Model->lista();
?>

<link rel="stylesheet" href="{{LINK}}/app/views/painel/{{$_app}}/scripts/layout.css"/>

<div id="bloco_{{$_app}}" class="app_geral_imagem">
    <header class="header_principal header_principal_animacao header_principal_absolute">
        <h1 class="linha" style="flex-grow: 0">{{$_titulo}}</h1>
		<?php if($add && ($desenvolvedor || in_array(Permissao::nome($_app).'_add', $permissao))): ?>
		<div data-href="{{PAINEL}}/add/{{$_app}}" data-width="500" data-ajuda="Adicionar registro" class="but_bloco_ajax add"><i data-font="&#xe809;"></i><span>ADD</span></div>
		<?php endif; ?>
		<?php if($deletar && ($desenvolvedor || in_array(Permissao::nome($_app).'_deletar', $permissao))): ?>
		<div data-ajuda="Deletar registro" class="deletar but_deletar_lista bloco_selecionado hide"><i data-font="&#xe808;"></i><span>DELETAR</span></div>
		<?php endif; ?>
    </header>
	<div class="header_principal_false"></div>

	<ul class="lista_dados" id="bloco_lista_geral" data-app="{{$_app}}">
		<?php
			if($lista):
				foreach($lista as $r):
		?>
		<li class="bloco li <?php echo ($selecao == true) ? 'but_visualizar_geral' : '' ?>" data-id="<?php echo $r->id ?>">
			<figure style="background-image: url(<?php echo $r->capa ?>)"></figure>
			<a href="{{PAINEL}}/visualizar/{{$_app}}/<?php echo $r->cod ?>"></a>
			<span><?php echo Converter::caixa($r->titulo, 'A') ?></span>
		</li>
		<?php
				endforeach;
			else:
		?>
		<div class="zero">
			<i data-font="&#xe801;"></i>
			<span>SEM DADOS NO MOMENTO</span>
		</div>
		<?php
			endif;
		?>
	</ul>

	<i id="voltar_topo" class="hide" data-font="&#xf106;"></i>
</div>
