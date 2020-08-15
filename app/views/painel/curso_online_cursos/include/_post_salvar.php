<?php

if (isset($dados["categoria"]) && !empty($dados["categoria"])) {

	$CategoriaCurso = new CategoriaCursoModel;
	$CategoriaCurso->delete("curso", $dados["id"]);
	foreach ($dados["categoria"] as $r_c) :
		$dados_categoria = [
			"categoria" => $r_c,
			"curso" => $dados["id"]
		];
		$CategoriaCurso->insert($dados_categoria);
	endforeach;
}
