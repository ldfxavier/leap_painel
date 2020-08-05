<?php
    class BlogModel extends Model {

        public $_tabela = 'blog';

        public function montar($dados){
            $array = array();
            if($dados):
                $Status = new StatusModel;
                foreach($dados as $r):
                    $array[] = (object)array(
                        'id' => $r->id,
                        'cod' => $r->cod,
                        'titulo' => (object)array(
                            'grande' => $r->titulo_grande,
                            'pequeno' => $r->titulo_pequeno,
                            'chamada' => $r->titulo_chamada
                        ),
                        'texto' => (object)array(
                            'grande' => $r->texto_grande,
                            'pequeno' => $r->texto_pequeno
                        ),
                        'categorias' => json_decode($r->categorias),
                        'autor' => $r->autor,
                        'fonte' => $r->fonte,
                        'imagem' => (object)array(
                            'link' => !empty($r->imagem) ? ARQUIVO.'/blog/'.$r->imagem : '',
                            'valor' => $r->imagem
                        ),
                        'imagem_social' => (object)array(
                            'link' => !empty($r->imagem_social) ? ARQUIVO.'/blog/'.$r->imagem_social : '',
                            'valor' => $r->imagem_social
                        ),
                        'link' => LINK.'/noticias/detalhe/'.$r->cod,
                        'data' => (object)array(
                            'postagem_inicio' => (object)array(
                                'br' => Converter::data($r->data_postagem_inicio, 'd/m/Y'),
                                'valor' => $r->data_postagem_inicio
                            ),
                            'postagem_final' => (object)array(
                                'br' => Converter::data($r->data_postagem_final, 'd/m/Y'),
                                'valor' => $r->data_postagem_final
                            ),
                            'criacao' => (object)array(
                                'br' => Converter::data($r->data_criacao, 'd/m/Y'),
                                'valor' => $r->data_criacao
                            ),
                            'atualizacao' => (!empty($r->data_atualizacao) && $r->data_atualizacao != '0000-00-00 00:00:00') ? Converter::data($r->data_atualizacao, 'd/m/Y H:i') : ''
                        ),
                        'destaque' => (object)array(
                            'valor' => $r->destaque,
                            'texto' => $r->destaque == 1 ? 'Ativo' : 'Inativo',
                            'cor' => $r->destaque == 1 ? '#16A085' : '#E05D6F'
                        ),
                        'url' => (object)[
                            'link' => LINK.'/noticia/'.$r->url,
                            'valor' => $r->url
                        ],
                        'status' => (object)array(
                            'valor' => $r->status == 1 ? 1 : 2,
                            'texto' => $r->status == 1 ? 'Ativo' : 'Inativo',
                            'cor' => $r->status == 1 ? '#16A085' : '#E05D6F'
                        )
                    );
                endforeach;
            endif;
            return $array;
        }

        public function noticia($cod){
            $noticia = $this->montar($this->read("`cod` = '{$cod}' AND `status` = '1'"));
            return $noticia[0];
        }
    }
