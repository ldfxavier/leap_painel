<?php
$equipe = $_SESSION['EQUIPE'];
$permissao = $equipe->permissao->lista;
$desenvolvedor = $equipe->desenvolvedor == 1 ? true : false;

$r = isset($_dado) ? $_dado : '';

$Painel = new PainelModel;

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
		<?=Form::imagem('ENVIAR IMAGEM PRINCIPAL <span>(Será redirecionada para 650px)</span>', 'imagem', P::r($r, 'imagem->valor'), 'cursos', 'jpg/jpeg/png', 650, '30000', 'redimencionar', 'img');?>
	</fieldset>
	<fieldset>
		<div class="legenda">DADOS</div>

		<label>Título:</label>
		<input type="text" data-tamanho="" name="titulo" value="<?=P::r($r, 'titulo');?>" placeholder="Digite um título">

		<label>Duração:</label>
		<input type="number" name="duracao" value="<?=P::r($r, 'duracao');?>" placeholder="Digite uma duracao">

		<label>Chamada:</label>
		<input type="text" data-tamanho="200" name="chamada" value="<?=P::r($r, 'chamada');?>" placeholder="Digite uma chamada">

		<label>Investimento:</label>
		<?=Form::editor('investimento', P::r($r, 'investimento'), 'normal');?>

		<label>Horarios do curso:</label>
		<div class="bloco_especificacoes_curso">
			<div class="bloco_adicionado">
				<div class="bloco_dias">
					<div class="bloco_check">
						<input type="checkbox" id="segunda" class="semana" value="segunda">
						<label for="segunda">Segunda-feira</label>
					</div>
					<div class="bloco_check">
						<input type="checkbox" id="terca" class="semana" value="terça">
						<label for="terca">Terça-feira</label>
					</div>
					<div class="bloco_check">
						<input type="checkbox" id="quarta" class="semana" value="quarta">
						<label for="quarta">Quarta-feira</label>
					</div>
					<div class="bloco_check">
						<input type="checkbox" id="quinta" class="semana" value="quinta">
						<label for="quinta">Quinta-feira</label>
					</div>
					<div class="bloco_check">
						<input type="checkbox" id="sexta" class="semana" value="sexta">
						<label for="sexta">Sexta-feira</label>
					</div>
					<div class="bloco_check">
						<input type="checkbox" id="sabado" class="semana" value="sábado">
						<label for="sabado">Sabado</label>
					</div>
					<div class="bloco_check">
						<input type="checkbox" id="domingo" class="semana" value="domingo">
						<label for="domingo">Domingo</label>
					</div>
				</div>
				<div class="bloco_hora">
					<div class="bloco_de">
						<label for="">De:</label>
						<?=form::hora("", null, ["class" => "hora_de_horario"]);?>
					</div>
					<div class="bloco_de">
						<label for="">Até:</label>
						<?=form::hora("", null, ["class" => "hora_ate_horario"]);?>
					</div>
				</div>
				<div class="bloco_inicio">
					<label for="">Início:</label>
					<?=form::data("", null, ["class" => "data_horario"]);?>
				</div>
				<div data-vinculo="<?=$cod;?>" class="adicionar adicionar_horarios">+ adicionar horário</div>
			</div>
		</div>
		<?php
$Horarios = new HorariosModel;
$horarios = $Horarios->lista($cod);
?>
			<label>Horarios adicionados:</label>
			<div class="bloco_horarios_criados">
			<?php
if (isset($horarios) && !empty($horarios)):
    foreach ($horarios as $r_h):
    ?>
					<div class="bloco">
						<div class="remover remover_horario" data-cod="<?=$r_h->cod;?>">X Excluir</div>
						<p class="texto"><span>dias:</span>
						<?php
    if (isset($r_h->semana->lista) && !empty($r_h->semana->lista)):
        $count_semana = count($r_h->semana->lista);
        if ($count_semana <= 1):
            echo $r_h->semana->lista[0];
        elseif ($count_semana > 1):
            echo implode($r_h->semana->lista, " e ");
        endif;
    endif;
    ?>
						</p>
						<p class="texto"><span>horário:</span><?=$r_h->hora_de->br;?> às <?=$r_h->hora_ate->br;?></p>
						<p class="texto inicio"><span>Início:</span> <?=$r_h->data_inicio->br;?></p>
					</div>
				<?php
endforeach;
endif;
?>
			</div>
		<label>Texto:</label>
		<?=Form::editor('texto', P::r($r, 'texto'), 'normal');?>

		<label>Materiais:</label>
		<?=Form::editor('materiais', P::r($r, 'materiais'), 'normal');?>

		<label>Requisitos:</label>
		<input type="text" name="requisitos" value="<?=P::r($r, 'requisitos');?>" placeholder="Digite os requisitos">
		<?php
$galeria = $Painel->p_select("publicacao_album", "id", "titulo", ["" => "Selecione uma galeria"]);
echo Form::select('galeria', $galeria, P::r($r, 'galeria'));
?>
	</fieldset>

	<fieldset class="bloco_checkbox_todos">
		<div class="checkbox">
			<div class="legenda">TECNOLOGIAS</div>
			<?php
$tecnologias = $Painel->p_select('institucional_tecnologia', 'id', 'titulo');
foreach ($tecnologias as $ind => $val):
    $valor = (isset($r->mundos) && in_array($ind, $r->mundos)) ? true : false;
    echo Form::checkbox('mundos', $ind, $val, $valor, array('data-valor' => $valor));
endforeach;
?>
		</div>
	</fieldset>

	<fieldset class="bloco_checkbox_todos">
		<div class="checkbox">
			<div class="legenda">PROFESSORES</div>
			<?php
$professores = $Painel->p_select('institucional_professores', 'id', 'nome');
foreach ($professores as $ind => $val):
    $valor = (isset($r->professores) && in_array($ind, $r->professores)) ? true : false;
    echo Form::checkbox('professores', $ind, $val, $valor, array('data-valor' => $valor));
endforeach;
?>
		</div>
	</fieldset>

	<fieldset>
		<div class="legenda">PERMISSÕES</div>
		<?=Form::booleano('status', 'Ativar?', P::r($r, 'status->valor'));?>
	</fieldset>
</div>
