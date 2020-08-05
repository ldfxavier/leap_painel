<?php
	$equipe = $_SESSION['EQUIPE'];
	$permissao = $equipe->permissao->lista;
	$desenvolvedor = $equipe->desenvolvedor == 1 ? true : false;
	$pre_visualizacao = isset($_pre_visualizacao) ? true : false;

	$r = $_dado;

	$cod = $r->cod;
?>
<div id="bloco_visualizar_{{$_app}}" class="app_visualizar_noticia">
	<?php if(!$pre_visualizacao): ?>
    <header class="header_principal volta header_principal_animacao header_principal_absolute">
		<a class="voltar" href="{{PAINEL}}/app/{{$_app}}"></a>
        <h1>VISUALIZAR</h1>
		<?php if($desenvolvedor || in_array(Permissao::nome($_app).'_editar', $permissao)): ?>
		<a class="editar" href="{{PAINEL}}/editar/{{$_app}}/{{$r->cod}}" data-ajuda="Editar dados"></a>
		<?php endif; ?>
    </header>
	<div class="header_principal_false"></div>
	<?php endif; ?>

	<div class="center">
		<div class="header">
			<h1>{{!empty($r->nome) ? $r->nome : 'Sem nome cadastrado'}}</h1>
		</div>
		<div class="topo">
			<div class="data">
				<?php
					$data = explode('/', !empty($r->data->criacao->br) ? $r->data->criacao->br : date('d/m/Y'));
				?>
				<span class="dia">{{$data[0]}}</span>
				<span class="mes">{{Converter::caixa(Converter::mes($data[1]), 'A')}}</span>
				<span class="ano">{{$data[2]}}</span>
			</div>
			<div class="dados">
				<?php if(!empty($r->data->atualizacao)): ?>
				<p class="atualizacao">Atualizado em {{$r->data->atualizacao}}</p>
				<?php endif; ?>
			</div>
		</div>

		<div class="conteudo_centralizado">
			<div class="linha_topo">
				<span></span>
				<p>NOTÍCIA</p>
			</div>
			<?php if(!empty($r->imagem->link)): ?>
			<figure><img src="{{$r->imagem->link}}"></figure>
			<?php endif; ?>

			<div class="materia">
				{{str_replace('style="padding-left: 30px;"', 'class="destaque"', !empty($r->texto) ? $r->texto : '<p>Sem texto da materia</p>')}}
			</div>
		</div>
	</div>

</div>
