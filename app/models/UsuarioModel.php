<?php
    final class UsuarioModel extends Model {
        public $_tabela = 'usuario';

        public function montar($dados){
            $array = array();
			$quantidade = count($dados);
            if($dados):
                $Status = new StatusModel;
                foreach($dados as $r):
                    $nome = explode(' ', $r->nome);
                    $endereco = '';
                    $estado = !empty($r->estado) ? Converter::caixa($r->estado, 'A') : '';
                    $cep = !empty($r->cep) ? Converter::cep($r->cep) : '';
                    if(!empty($r->cep)):
                        $numero = !empty($r->numero) ? ', '.$r->numero : '';
                        $complemento = !empty($r->complemento) ? ', '.$r->complemento : '';
                        $endereco = $r->logradouro.$numero.$complemento.', '.$r->bairro.' - '.$r->cidade.'/'.$r->estado;
                    endif;

                    $array[] = (Object)[
                        'id' => $r->id,
                        'cod' => $r->uuid,
                        'nome' => (object)[
                            'valor' => $r->nome,
                            'primeiro' => Converter::caixa($nome[0], 'A'),
                            'ultimo' => end($nome) != $nome[0] ? Converter::caixa(end($nome), 'A') : ''
                        ],
                        'cpf' => (object)[
                            'valor' => $r->cpf,
                            'br' => Converter::documento($r->cpf)
                        ],
                        'email' => $r->email,
                        'telefone' => (object)[
                            'celular' => (object)[
                                'valor' => $r->celular,
                                'br' => Converter::telefone($r->celular)
                            ],
                            'fixo' => (object)[
                                'valor' => $r->telefone,
                                'br' => Converter::telefone($r->telefone)
                            ]
                        ],
                        'endereco' => (object)[
                            'completo' => $endereco,
                            'cep' => (object)[
                                'valor' => $r->cep,
                                'br' => $cep
                            ],
                            'logradouro' => $r->logradouro,
                            'numero' => $r->numero,
                            'complemento' => $r->complemento,
                            'bairro' => $r->bairro,
                            'cidade' => $r->cidade,
                            'estado' => $estado
                        ],
                        'data' => (object)array(
                            'nascimento' => (object)array(
                                'br' => Converter::data($r->data_nascimento, 'd/m/Y'),
                                'valor' => $r->data_nascimento
                            ),
                            'criacao' => (object)array(
                                'br' => Converter::data($r->data_criacao, 'd/m/Y'),
                                'valor' => $r->data_criacao
                            ),
                            'atualizacao' => (!empty($r->data_atualizacao) && $r->data_atualizacao != '0000-00-00 00:00:00') ? Converter::data($r->data_atualizacao, 'd/m/Y H:i') : ''
                        ),
                        'status' => $Status->valor("usuario", 'status', $r->status)
                    ];
                endforeach;
                return $array;
            endif;
        }

        public function cod($cod){
            $dado = $this->montar($this->read("`uuid` = '{$cod}'"));
            if($dado) return $dado[0];
        }

        public function id($id){
            $dado = $this->montar($this->read("`id` = '{$id}'"));
            if($dado) return $dado[0];
        }

		public function nome($id){
			$dado = $this->read("`id` = '{$id}'");
			if($dado) return $dado[0]->nome;
		}
    }
