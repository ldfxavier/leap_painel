<?php
class CategoriaCursoModel extends Model
{

    public $_tabela = 'categoria_curso';

    public function montar($dados)
    {
        $array = [];
        if ($dados) :
            foreach ($dados as $r) :
                $array[] = (object)[
                    'id' => $r->id,
                    'categoria' => $r->categoria,
                    'curso' => $r->curso,
                ];
            endforeach;
        endif;
        return $array;
    }
}
