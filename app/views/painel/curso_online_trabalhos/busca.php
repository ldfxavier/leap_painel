<?php Painel::busca_header($_app) ?>
<fieldset>
	<?= Form::select('status', array('' => 'Todos', 1 => 'Ativo', 2 => 'Inativo')); ?>
	<input type="text" name="busca" placeholder="Digite sua busca" value="">
</fieldset>
<?php Painel::busca_footer() ?>
