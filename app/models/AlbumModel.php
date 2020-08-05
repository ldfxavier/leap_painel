<?php
    class AlbumModel extends Model {

        public $_tabela = 'album';

        public function montar($dados){
            $array = [];
            if($dados):
                $Foto = new FotoModel;
                $Status = new StatusModel;
                foreach($dados as $r):
                    $array[] = (Object)[
                        'id' => $r->id,
                        'cod' => $r->cod,
                        'titulo' => $r->titulo,
                        'texto' => $r->texto,
                        'url' => $r->url,
                        'lista' => $Foto->lista($r->cod),
                        'status' => $Status->padrao($r->status)
                    ];
                endforeach;
            endif;
            return $array;
        }

        public function cod($cod){
            $dados = $this->montar($this->read("`cod` = '{$cod}' AND `status` = 1"));
            if(!$dados) return false;

            $Foto = new Foto;
            $dados[0]->lista = $Foto->lista($dados[0]->cod);

            return $dados[0];
        }
        public function lista(){
            $dados = $this->montar($this->read());
            if(!$dados) return false;

            $Foto = new FotoModel;
            $array = [];
            foreach($dados as $r):
                $r->capa = $Foto->capa($r->cod);
                $array[] = $r;
            endforeach;

            return $array;
        }
    }
