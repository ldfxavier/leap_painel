<?php
	class Permissao {
		private static $_lista = array(
			'interno_foto' => array(
				'tabela' => 'foto',
				'model' => 'FotoModel'
			),
			'foto' => array(
				'tabela' => 'foto',
				'model' => 'FotoModel'
			),
			'usuario_equipe' => array(
				'titulo' => 'Equipe',
				'tabela' => 'equipe',
				'model' => 'EquipeModel',
				'permissao' => 'per_usuario_equipe',
				'lista' => array(
					'per_usuario_equipe_visualizar' => 'Visualizar lista',
					'per_usuario_equipe_detalhe' => 'Detalhe da equipe',
					'per_usuario_equipe_add' => 'Adicionar equipe',
					'per_usuario_equipe_editar' => 'Editar equipe',
					'per_usuario_equipe_deletar' => 'Deletar equipe'
				)
			),
			'usuario_usuario' => array(
				'titulo' => 'Usuário',
				'tabela' => 'usuario',
				'model' => 'UsuarioModel',
				'permissao' => 'per_usuario_usuario',
				'lista' => array(
					'per_usuario_usuario_visualizar' => 'Visualizar lista',
					'per_usuario_usuario_detalhe' => 'Detalhe do usuário',
					'per_usuario_usuario_add' => 'Adicionar usuário',
					'per_usuario_usuario_editar' => 'Editar usuário',
					'per_usuario_usuario_deletar' => 'Deletar usuário'
				)
			),
			'blog' => array(
				'titulo' => 'Blog',
				'tabela' => 'blog',
				'model' => 'BlogModel',
				'permissao' => 'per_blog',
				'lista' => array(
					'per_blog_visualizar' => 'Visualizar lista',
					'per_blog_detalhe' => 'Detalhe do blog',
					'per_blog_add' => 'Adicionar blog',
					'per_blog_editar' => 'Editar blog',
					'per_blog_deletar' => 'Deletar blog'
				)
			),
			'administrativo_status' => array(
				'titulo' => 'Status',
				'tabela' => 'status_novo',
				'model' => 'StatusModel',
				'permissao' => 'per_administrativo_status',
				'lista' => array(
					'per_administrativo_status_visualizar' => 'Visualizar lista',
					'per_administrativo_status_add' => 'Adicionar área',
					'per_administrativo_status_editar' => 'Editar área',
					'per_administrativo_status_deletar' => 'Deletar área'
				)
			),
			'administrativo_site' => array(
				'titulo' => 'Site',
				'tabela' => 'site',
				'model' => 'SiteModel',
				'permissao' => 'per_administrativo_site',
				'lista' => array(
					'per_administrativo_site_detalhe' => 'Detalhe dos dados',
					'per_administrativo_site_visualizar' => 'Visualizar lista',
					'per_administrativo_site_add' => 'Adicionar dados',
					'per_administrativo_site_editar' => 'Editar dados',
					'per_administrativo_site_deletar' => 'Deletar dados'
				)
			),
			'publicidade_banner' => array(
				'titulo' => 'Banner',
				'tabela' => 'banner',
				'model' => 'BannerModel',
				'permissao' => 'per_publicidade_banner',
				'lista' => array(
					'per_publicidade_banner_visualizar' => 'Visualizar lista',
					'per_publicidade_banner_detalhe' => 'Detalhe do banner',
					'per_publicidade_banner_add' => 'Adicionar banner',
					'per_publicidade_banner_editar' => 'Editar banner',
					'per_publicidade_banner_deletar' => 'Deletar banner'
				)
			),
			'mensagem' => array(
				'titulo' => 'Mensagem',
				'tabela' => 'mensagem',
				'model' => 'MensagemModel',
				'permissao' => 'per_mensagem',
				'lista' => array(
					'per_mensagem_visualizar' => 'Visualizar lista',
					'per_mensagem_detalhe' => 'Detalhe da mensagem',
					'per_mensagem_editar' => 'Editar mensagem',
					'per_mensagem_deletar' => 'Deletar mensagem'
				)
			),
			'mensagem_mensagem' => array(
				'titulo' => 'Mensagem',
				'tabela' => 'mensagem',
				'model' => 'MensagemModel',
				'permissao' => 'per_mensagem_mensagem',
				'lista' => array(
					'per_mensagem_mensagem_visualizar' => 'Visualizar lista',
					'per_mensagem_mensagem_detalhe' => 'Detalhe da mensagem',
					'per_mensagem_mensagem_editar' => 'Editar mensagem',
					'per_mensagem_mensagem_deletar' => 'Deletar mensagem'
				)
			),
			'mensagem_inscricoes' => array(
				'titulo' => 'Inscrições',
				'tabela' => 'inscricoes',
				'model' => 'InscricoesModel',
				'permissao' => 'per_mensagem_inscricoes',
				'lista' => array(
					'per_mensagem_inscricoes_visualizar' => 'Visualizar lista',
					'per_mensagem_inscricoes_detalhe' => 'Detalhe da inscrição',
					'per_mensagem_inscricoes_editar' => 'Editar inscrição',
					'per_mensagem_inscricoes_deletar' => 'Deletar inscrição'
				)
			),
			'institucional_professores' => array(
				'titulo' => 'Professores',
				'tabela' => 'professores',
				'model' => 'ProfessoresModel',
				'permissao' => 'per_institucional_professores',
				'lista' => array(
					'per_institucional_professores_visualizar' => 'Visualizar',
					'per_institucional_professores_detalhe' => 'Detalhe do professores',
					'per_institucional_professores_add' => 'Adicionar professores',
					'per_institucional_professores_editar' => 'Editar professores',
					'per_institucional_professores_deletar' => 'Deletar professores'
				)
			),
			'institucional_cursos' => array(
				'titulo' => 'Cursos',
				'tabela' => 'cursos',
				'model' => 'CursosModel',
				'permissao' => 'per_institucional_cursos',
				'lista' => array(
					'per_institucional_cursos_visualizar' => 'Visualizar curso',
					'per_institucional_cursos_detalhe' => 'Detalhe do curso',
					'per_institucional_cursos_editar' => 'Editar curso',
					'per_institucional_cursos_add' => 'Adicionar curso',
					'per_institucional_cursos_deletar' => 'Deletar curso'
				)
			),
			'institucional_mundos' => array(
				'titulo' => 'Mundos',
				'tabela' => 'mundos',
				'model' => 'MundosModel',
				'permissao' => 'per_institucional_mundos',
				'lista' => array(
					'per_institucional_mundos_visualizar' => 'Visualizar mundo',
					'per_institucional_mundos_detalhe' => 'Detalhe do mundo',
					'per_institucional_mundos_editar' => 'Editar mundo',
					'per_institucional_mundos_add' => 'Adicionar mundo',
					'per_institucional_mundos_deletar' => 'Deletar mundo'
				)
			),
			'publicacao_album' => array(
				'titulo' => 'Álbum',
				'tabela' => 'album',
				'model' => 'AlbumModel',
				'permissao' => 'per_publicacao_album',
				'lista' => array(
					'per_publicacao_album_visualizar' => 'Visualizar',
					'per_publicacao_album_detalhe' => 'Detalhe da álbum',
					'per_publicacao_album_add' => 'Adicionar álbum',
					'per_publicacao_album_editar' => 'Editar álbum',
					'per_publicacao_album_deletar' => 'Deletar álbum'
				)
			),
			'curso_online_categorias' => array(
				'titulo' => 'Categorias',
				'tabela' => 'curso_online_categorias',
				'model' => 'CursoOnlineCategoriasModel',
				'permissao' => 'per_curso_online_categorias',
				'lista' => array(
					'per_curso_online_categorias_visualizar' => 'Visualizar categoria',
					'per_curso_online_categorias_detalhe' => 'Detalhe da categoria',
					'per_curso_online_categorias_editar' => 'Editar categoria',
					'per_curso_online_categorias_add' => 'Adicionar categoria',
					'per_curso_online_categorias_deletar' => 'Deletar categoria'
				)
			),
			'curso_online_cursos' => array(
				'titulo' => 'Cursos online',
				'tabela' => 'curso_online_cursos',
				'model' => 'CursoOnlineCursosModel',
				'permissao' => 'per_curso_online_cursos',
				'lista' => array(
					'per_curso_online_cursos_visualizar' => 'Visualizar curso',
					'per_curso_online_cursos_detalhe' => 'Detalhe do curso',
					'per_curso_online_cursos_editar' => 'Editar curso',
					'per_curso_online_cursos_add' => 'Adicionar curso',
					'per_curso_online_cursos_deletar' => 'Deletar curso'
				)
			),
			'curso_online_aulas' => array(
				'titulo' => 'Aulas online',
				'tabela' => 'curso_online_aulas',
				'model' => 'CursoOnlineAulasModel',
				'permissao' => 'per_curso_online_aulas',
				'lista' => array(
					'per_curso_online_aulas_visualizar' => 'Visualizar aula',
					'per_curso_online_aulas_detalhe' => 'Detalhe do aula',
					'per_curso_online_aulas_editar' => 'Editar aula',
					'per_curso_online_aulas_add' => 'Adicionar aula',
					'per_curso_online_aulas_deletar' => 'Deletar aula'
				)
			),
			'curso_online_trabalhos' => array(
				'titulo' => 'Trabalhos online',
				'tabela' => 'curso_online_trabalhos',
				'model' => 'CursoOnlineTrabalhosModel',
				'permissao' => 'per_curso_online_trabalhos',
				'lista' => array(
					'per_curso_online_trabalhos_visualizar' => 'Visualizar trabalho',
					'per_curso_online_trabalhos_detalhe' => 'Detalhe do trabalho',
					'per_curso_online_trabalhos_editar' => 'Editar trabalho',
					'per_curso_online_trabalhos_deletar' => 'Deletar trabalho'
				)
			),
			'arquivo' => array(
				'tabela' => 'arquivo',
				'model' => 'ArquivoModel'
			),
			'historico' => array(
				'tabela' => 'historico_novo',
				'model' => 'HistoricoModel'
			)
		);

		public static function lista($linha = false, $associacao = false){
			$array = array();
			foreach(self::$_lista as $r):
				if(isset($r['lista'])):
					if($associacao && strstr($r['titulo'], 'Associação - ')):
						$array[] = (object)array(
							'titulo' => $r['titulo'],
							'lista' => (object)$r['lista']
						);
					elseif(!$associacao):
						$array[] = (object)array(
							'titulo' => $r['titulo'],
							'lista' => (object)$r['lista']
						);
					endif;
				endif;
			endforeach;

			if($linha):
				$array = array();
				foreach(self::$_lista as $lista_r) if(isset($lista_r['lista'])) foreach($lista_r['lista'] as $ind => $val) $array[$ind] = $val;
			endif;
			return $array;
		}

		public static function titulo($titulo){
			return isset(self::$_lista[$titulo]['titulo']) ? self::$_lista[$titulo]['titulo'] : '';
		}

		public static function model($app){
			return isset(self::$_lista[$app]['model']) ? self::$_lista[$app]['model'] : '';
		}

		public static function tabela($app){
			return isset(self::$_lista[$app]['tabela']) ? self::$_lista[$app]['tabela'] : '';
		}

		public static function nome($app){
			return isset(self::$_lista[$app]['permissao']) ? self::$_lista[$app]['permissao'] : '';
		}
		public static function validar($app, $acao = null){
			if(!isset($_SESSION['EQUIPE'])) return false;
			$equipe = $_SESSION['EQUIPE'];

			if(!isset(self::$_lista[$app]['permissao']) && $equipe->desenvolvedor == 2) return false;

			$acao = ($acao != null) ? '_'.$acao : '';
			$permissao = isset(self::$_lista[$app]['permissao']) ? self::$_lista[$app]['permissao'].$acao : 'sem_permissao';
			return (in_array($permissao, $equipe->permissao->lista) || $equipe->desenvolvedor == 1) ? true : false;
		}
	}
