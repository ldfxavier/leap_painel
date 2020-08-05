<?php
    class BannerModel extends Model {

        public $_tabela = 'banner';

        public function montar($dados){
            $array = array();
            if($dados):
                $Status = new StatusModel;
                foreach($dados as $r):
                    $array[] = (object)array(
                        'id' => $r->id,
                        'cod' => $r->cod,
                        'titulo' => $r->titulo,
                        'texto' => $r->texto,
                        'link' => $r->link,
						'target' => $r->target,
                        'imagem' => (object)array(
                            'valor' => $r->imagem,
                            'link' => ARQUIVO.'/banner/'.$r->imagem
                        ),
						'data' => (object)[
							'inicio' => Converter::data($r->data_inicio, 'd/m/Y H:i'),
							'final' => Converter::data($r->data_final, 'd/m/Y H:i'),
                            'criacao' => Converter::data($r->data_criacao, 'd/m/Y H:i'),
                            'atualizacao' => Converter::data($r->data_atualizacao, 'd/m/Y H:i'),
                        ],
						'ordem' => $r->ordem,
                        'tipo' => $Status->padrao($r->tipo),
                        'status' => $Status->padrao($r->status)
                    );
                endforeach;
            endif;
            return $array;
        }
    }
