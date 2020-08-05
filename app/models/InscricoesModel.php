<?php
    class InscricoesModel extends Model {

        public $_tabela = 'inscricoes';

        public function montar($dados){
            $array = array();
            if($dados):
                $Cursos = new CursosModel;
                $Status = new StatusModel;
                foreach($dados as $r):
                    $array[] = (object)array(
                        'id' => $r->id,
                        'cod' => $r->cod,
                        'nome' => $r->nome,
                        'telefone' => (object)array(
                            'valor' => $r->telefone,
                            'texto' => Converter::telefone($r->telefone)
                        ),
                        'email' => $r->email,
                        'curso' => (object)[
                            'valor' => $r->curso,
                            'dados' => $Cursos->id($r->curso),
                            ],
                        'turma' => $r->turma,
                        'data' => (object)array(
                            'criacao' => Converter::data($r->data_criacao, 'd/m/Y H:i'),
                            'atualizacao' => Converter::data($r->data_atualizacao, 'd/m/Y H:i')
                        ),
                        'status' => $Status->valor('inscricoes', 'status', $r->status)
                    );
                endforeach;
            endif;
            return $array;
        }

    }
