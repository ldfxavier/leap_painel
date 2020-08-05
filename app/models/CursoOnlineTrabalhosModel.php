<?php
    class CursoOnlineTrabalhosModel extends Model {

        public $_tabela = 'curso_online_trabalhos';

        public function montar($dados){
            $array = [];
            $Status = new StatusModel;
            $Usuario = new UsuarioModel;
            $Arquivo = new ArquivoModel;
            if($dados):
                foreach($dados as $r):
                    $arquivo = '';
                    $arquivo = $Arquivo->lista($r->cod);

                    $array[] = (object)[
                        'id' => $r->id,
                        'cod' => $r->cod,
                        'usuario' => $Usuario->id($r->usuario),
                        'arquivo' => $arquivo,
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

        public function cod($cod){
            $retorno = $this->montar($this->read("`cod` = '{$cod}'"));
            if(isset($retorno[0]) && !empty($retorno[0])):
                return $retorno[0];
            else:
                exit();
            endif;
        }
    }
