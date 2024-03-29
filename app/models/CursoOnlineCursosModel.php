<?php
class CursoOnlineCursosModel extends Model
{

    public $_tabela = 'curso_online_cursos';

    public function montar($dados)
    {
        $array = [];
        $Status = new StatusModel;
        if ($dados) :
            foreach ($dados as $r) :
                $array[] = (object)[
                    'id' => $r->id,
                    'cod' => $r->cod,
                    'categoria' => json_decode($r->categoria),
                    'titulo' => $r->titulo,
                    'texto' => $r->texto,
                    'professor' => $r->professor,
                    'chamada' => $r->chamada,
                    'galeria' => $r->galeria,
                    'imagem' => (object)[
                        'valor' => $r->imagem,
                        'link' => (isset($r->imagem) && !empty($r->imagem)) ? ARQUIVO . '/online_cursos/' . $r->imagem : ''
                    ],
                    'data' => (object)array(
                        'criacao' => (object)array(
                            'br' => Converter::data($r->data_criacao, 'd/m/Y'),
                            'valor' => $r->data_criacao
                        ),
                        'atualizacao' => (!empty($r->data_atualizacao) && $r->data_atualizacao != '0000-00-00 00:00:00') ? Converter::data($r->data_atualizacao, 'd/m/Y H:i') : ''
                    ),
                    'url' => (object)[
                        'link' => LINK . '/blog/' . $r->url,
                        'valor' => $r->url
                    ],
                    'gratuito' => (object)array(
                        'valor' => $r->gratuito,
                        'texto' => $r->gratuito == 1 ? 'Sim' : 'Não',
                        'cor' => $r->gratuito == 1 ? '#16A085' : '#E05D6F'
                    ),
                    'status' => (object)array(
                        'valor' => $r->status,
                        'texto' => $r->status == 1 ? 'Ativo' : 'Inativo',
                        'cor' => $r->status == 1 ? '#16A085' : '#E05D6F'
                    )
                ];
            endforeach;
        endif;
        return $array;
    }

    public function cod($cod)
    {
        $retorno = $this->montar($this->read("`cod` = '{$cod}'"));
        if (isset($retorno[0]) && !empty($retorno[0])) :
            return $retorno[0];
        else :
            exit();
        endif;
    }

    public function id($id)
    {
        $retorno = $this->montar($this->read("`id` = '{$id}'"));
        if (isset($retorno[0]) && !empty($retorno[0])) :
            return $retorno[0];
        else :
            exit();
        endif;
    }
}
