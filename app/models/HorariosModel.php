<?php
    class HorariosModel extends Model {

        public $_tabela = 'horarios';

        public function montar($dados){
            $array = [];
            $Status = new StatusModel;
            if($dados):
                foreach($dados as $r):
                    $array[] = (object)[
                        'id' => $r->id,
                        'cod' => $r->cod,
                        'vinculo' => $r->vinculo,
                        'semana' => (object)[
                            'valor' => $r->semana,
                            'lista' => json_decode($r->semana),
                        ],
                        'hora_de' => (object)[
                            'valor' => $r->hora_de,
                            'br' => Converter::data($r->hora_de, 'H:i')
                        ],
                        'hora_ate' => (object)[
                            'valor' => $r->hora_ate,
                            'br' => Converter::data($r->hora_ate, 'H:i')
                        ],
                        'data_inicio' => (object)[
                            'valor' => $r->data_inicio,
                            'br' => Converter::data($r->data_inicio, 'd/m/Y')
                        ],
                        'data_criacao' => (object)[
                            'valor' => $r->data_criacao,
                            'br' => Converter::data($r->data_criacao, 'd/m/Y H:i')
                        ],
                    ];
                endforeach;
            endif;
            return $array;
        }

        public function lista($vinculo){
            $dados = $this->montar($this->read("`vinculo` = '{$vinculo}'", "id DESC"));
            return $dados;
        }

        public function salvar($dados){
            $dados['cod'] = md5(uniqid(time()));
            $dados['data_criacao'] = date("Y-m-d H:i:s");
            $insert = $this->insert($dados);
            return $insert;
        }
        public function remover($cod){
            return $this->delete("cod", $cod);
        }
    }
