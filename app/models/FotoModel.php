<?php
    class FotoModel extends Model {

        public $_tabela = 'foto';

        public function capa($cod){
            $dado = $this->read("`vinculo` = '{$cod}' AND `status` = 1 AND `destaque` = 1");
            return $dado ? ARQUIVO.'/album/'.$dado[0]->imagem : PAINEL.'/images/painel/imagem_padrao.png';
        }

        public function lista($cod){
            $dado = $this->read("`vinculo` = '{$cod}' AND `status` = 1");

            $array = [];
            if($dado):
                foreach($dado as $r):
                    $array[] = (object)[
                        'id' => $r->id,
                        'foto_titulo' => $r->foto_titulo,
                        'imagem' => (object)[
                            'link' => ARQUIVO.'/album/'.$r->imagem,
                            'valor' => $r->imagem
                        ]
                    ];
                endforeach;
            endif;
            return $array;
        }

        public function atualizar_capa($id, $cod){
            $this->update(['destaque' => 2], "`vinculo` = '{$cod}'");
            return $this->update(['destaque' => 1], "`id` = '{$id}'");
        }
        public function deletar($id){
            return $this->delete('id', $id);
        }

        public function salvar($dados){
            return $this->insert($dados, true);
        }

        public function id($id){
            $dado = $this->read("`id` = '{$id}'");
            if($dado):
                return $dado[0];
            endif;
            return false;
        }
    }
