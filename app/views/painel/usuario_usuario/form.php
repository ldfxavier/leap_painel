<?php
	$equipe = $_SESSION['EQUIPE'];

	$r = isset($_dado) ? $_dado : '';

	if(isset($r->cod)) $cod = $r->cod;
	else $cod = md5(uniqid(time()));

	$volta = in_array(Permissao::nome($_app).'_visualizar', $equipe->permissao->lista) ? PAINEL.'/visualizar/'.$_app.'/'.$cod : PAINEL.'/app/'.$_app;
?>

<input type="hidden" id="form_app_geral" value="<?= $_app; ?>">
<input type="hidden" id="form_volta_geral" value="<?= $volta; ?>">

<input type="text" class="input_zero" value="">
<input type="password" class="input_zero" value="">
<?php if(isset($r->id)): ?>
<input type="hidden" name="id" value="<?= $r->id; ?>">
<?php endif; ?>
<input type="hidden" name="uuid" value="<?= $cod; ?>">

<div class="linha">
	<fieldset>
		<div class="legenda">DADOS PESSOAIS</div>
		<label>Nome:</label>
		<input type="text" name="nome" value="<?= P::r($r, 'nome->valor'); ?>" placeholder="Digite um nome">

		<label>Telefone:</label>
		<input type="text" data-mascara="celular" name="telefone" value="<?= P::r($r, 'telefone->fixo->br'); ?>" placeholder="Digite um telefone">

		<label>Celular:</label>
		<input type="text" data-mascara="celular" name="celular" value="<?= P::r($r, 'telefone->celular->br'); ?>" placeholder="Digite um celular">

	</fieldset>
</div>

<div class="linha">
	<fieldset>
		<div class="legenda">ACESSO</div>

		<label>CPF:</label>
		<?= Form::cpf('cpf', P::r($r, 'cpf->br')); ?>

		<label>E-mail:</label>
		<input type="text" name="email" value="<?= P::r($r, 'email'); ?>" placeholder="Digite um e-mail">

		<label>Senha:</label>
		<input type="password" name="salt" value="" placeholder="Digite uma senha">
	</fieldset>
</div>

<div class="linha">
	<fieldset>
		<div class="legenda">OUTROS DADOS</div>
		<label>CEP:</label>
		<input type="text" name="cep" value="<?= P::r($r, 'endereco->cep->br'); ?>" placeholder="Digite um CEP">

		<label>Estado:</label>
		<?= Form::select('estado', Lista::estado(['' => 'Escolha uma opção']), P::r($r, 'endereco->estado')) ?>

		<label>Cidade:</label>
		<input type="text" name="cidade" value="<?= P::r($r, 'endereco->cidade'); ?>" placeholder="Digite uma cidade">

		<label>Status:</label>
		<?= Form::select('status', ['' => 'Escolha uma opção', 1 => 'Ativo', 2 => 'Inativo', 3 => 'Bloqueado'],  P::r($r, 'status->valor')) ?>
	</fieldset>
</div>
