<?php
    class ProfessoresModel extends Model {

        public $_tabela = 'professores';

        public function montar($dados){
            $array = [];
            $Status = new StatusModel;
            if($dados):
                foreach($dados as $r):
                    $array[] = (object)[
                        'id' => $r->id,
                        'cod' => $r->cod,
                        'nome' => $r->nome,
                        'cursos' => json_decode($r->cursos),
                        'portifolio' => $r->portifolio,
                        'imagem' => (object)[
                            'valor' => $r->imagem,
                            'link' => (isset($r->imagem) && !empty($r->imagem)) ? ARQUIVO.'/professores/'.$r->imagem : ''
                        ],
                        'descricao' => $r->descricao,
                        'data' => (object)array(
                            'criacao' => (object)array(
                                'br' => Converter::data($r->data_criacao, 'd/m/Y'),
                                'valor' => $r->data_criacao
                            ),
                            'atualizacao' => (!empty($r->data_atualizacao) && $r->data_atualizacao != '0000-00-00 00:00:00') ? Converter::data($r->data_atualizacao, 'd/m/Y H:i') : ''
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

        public function cursos($cursos){
            $retorno = $this->montar($this->read("`area` LIKE '{$area}'"));
            return $retorno;
        }

        public function cod($cod){
            $retorno = $this->montar($this->read("`cod` = '{$cod}'"));
            if(isset($retorno[0]) && !empty($retorno[0])):
                return $retorno[0];
            else:
                exit();
            endif;
        }
    }
