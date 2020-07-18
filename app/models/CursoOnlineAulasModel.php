<?php
    class CursoOnlineAulasModel extends Model {

        public $_tabela = 'curso_online_aulas';

        public function montar($dados){
            $array = [];
            if($dados):
                $Status = new StatusModel;
                foreach($dados as $r):
                    $array[] = (Object)[
                        'id' => $r->id,
                        'cod' => $r->cod,
                        'zoom' => $r->zoom,
                        'titulo' => $r->titulo,
                        'conteudo' => $r->conteudo,
                        'dica' => $r->dica,
                        'bibliografia' => $r->bibliografia,
                        'curso' => $r->curso,
                        'aula' => $r->aula,
                        'url' => (object)[
                            'link' => $r->url,
                            'valor' => $r->url
                        ],
                        'video' => (object)array(
                            'iframe' => !empty($r->video) ? Converter::video($r->video) : '',
                            'valor' => $r->video
                        ),
                        'data' => (object)[
                            'criacao' => (object)[
                                'valor' => $r->data_criacao,
                                'data' => Converter::data($r->data_criacao, 'd/m/Y'),
                                'hora' => Converter::data($r->data_criacao, 'H:i'),
                            ],
                            'atualizacao' => (object)[
                                'valor' => $r->data_atualizacao,
                                'data' => Converter::data($r->data_atualizacao, 'd/m/Y'),
                                'hora' => Converter::data($r->data_atualizacao, 'H:i'),
                            ]
                        ],
                        'status' => $Status->padrao($r->status)
                    ];
                endforeach;
            endif;
            return $array;
        }
    }
