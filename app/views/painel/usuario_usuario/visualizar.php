<?php
	$equipe = $_SESSION['EQUIPE'];
	$permissao = $equipe->permissao->lista;
	$desenvolvedor = $equipe->desenvolvedor == 1 ? true : false;
	$pre_visualizacao = isset($_pre_visualizacao) ? true : false;

	$r = $_dado;
	$cod = $r->cod;
?>
<div class="app_geral_visualizar">
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

		<div class="dados_direita">
			<article class="bloco">
				<header><h1>DADOS PESSOAIS</h1></header>
				<p><span class="bold">Nome:</span> <?php echo P::filtro($r->nome->valor, 'Sem nome') ?></p>
				<p><span class="bold">CPF:</span> <?php echo P::filtro($r->documento->br, 'Sem documento') ?></p>
				<p><span class="bold">Nascimento:</span> <?php echo P::filtro($r->data->nascimento->br, 'Sem data') ?></p>
			</article>

			<article class="bloco">
				<header><h1>CONTATO</h1></header>
				<p><span class="bold">Telefone fixo:</span> <?php echo $r->telefone->fixo->br ?></p>
				<p><span class="bold">Celular:</span> <?php echo $r->telefone->celular->br ?></p>
				<p><span class="bold">E-mail pessoal:</span> <?php echo $r->email ?></p>
			</article>

			<article class="bloco">
				<header><h1>ENDEREÇO</h1></header>
				<p><span class="bold">CEP:</span> <?php echo $r->endereco->cep->br ?></p>
				<p><span class="bold">Estado:</span> <?php echo $r->endereco->estado ?></p>
				<p><span class="bold">Cidade:</span> <?php echo $r->endereco->cidade ?></p>
				<p><span class="bold">Endereço:</span> <?php echo $r->endereco->logradouro ?></p>
				<p><span class="bold">Número:</span> <?php echo $r->endereco->numero ?></p>
			</article>

			<article class="bloco">
				<header><h1>STATUS</h1></header>
				<p class="status_texto"><span class="bold">Status:</span> <span><?php echo $r->status->texto ?></span></p>
			</article>
		</div>
	</div>

</div>
