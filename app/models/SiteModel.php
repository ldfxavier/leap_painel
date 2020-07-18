<?php
    class SiteModel extends Model {

        public $_tabela = 'site';

        public function montar($dados){
            $array = array();
            if($dados):
                $Status = new StatusModel;
                foreach($dados as $r):
                    $array[] = (object)array(
                        'id' => $r->id,
                        'cod' => $r->cod,
                        'titulo' => (object)array(
                            'titulo' => $r->titulo,
                            'pequeno' => $r->titulo_pequeno,
                        ),
                        'endereco' => $r->endereco,
                        'telefone' => $r->telefone,
                        'celular' => $r->celular,
                        'email' => $r->email,
                        'mapa' => $r->mapa,
                        'cnpj' => Converter::documento($r->cnpj),
                        'video' => (object)array(
                            'iframe' => !empty($r->video) ? Converter::video($r->video) : '',
                            'valor' => $r->video
                        ),
                        'data' => (object)array(
                            'atualizacao' => (!empty($r->data_atualizacao) && $r->data_atualizacao != '0000-00-00 00:00:00') ? Converter::data($r->data_atualizacao, 'd/m/Y H:i') : ''
                        ),
                    );
                endforeach;
            endif;
            return $array;
        }
    }
