<?php
    class MensagemModel extends Model {

        public $_tabela = 'mensagem';

        public function montar($dados){
            $array = array();
            if($dados):
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
                        'texto' => $r->mensagem,
                        'data' => (object)array(
                            'criacao' => Converter::data($r->data_criacao, 'd/m/Y H:i'),
                            'atualizacao' => Converter::data($r->data_atualizacao, 'd/m/Y H:i')
                        ),
                        'status' => $Status->valor('mensagem', 'status', $r->status)
                    );
                endforeach;
            endif;
            return $array;
        }

    }
