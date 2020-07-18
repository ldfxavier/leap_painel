$(function(){
	var APP = 'publicacao_album';

	var galeria = function(resposta){
		if(resposta.erro == false){
			var PAINEL = $('#PAINEL').val();

			$('#but_galeria_upload').val('');
			$('#but_galeria_upload').removeClass('hover');

			$('.album .lista').append('<figure style="background-image:url('+resposta.link+')" data-id="'+resposta.id+'" data-imagem="'+resposta.arquivo+'" class="but_imagem_acao imagem"><i class="editar but_bloco_ajax" data-href="'+PAINEL+'/incorporar/'+APP+'/editar/par/'+resposta.id+'" data-width="400" data-font="&#xe807;" data-ajuda="Editar imagem"></i><i class="capa" data-font="&#xe80b;" data-ajuda="Colocar como capa"></i><i class="deletar" data-font="&#xe808;" data-ajuda="Deletar imagem"></i></figure>');

			$('.but_imagem_acao[data-id='+resposta.id+'] .editar').trigger('click');
		}else {
			$.alerta({
				titulo:resposta.titulo,
				texto:resposta.texto
			});
		}
		$('#but_galeria_upload input').val('');

		$.loading('hide');
	}
	$('#but_galeria_upload input').change(function(){
		var link = $('#PAINEL').val()+'/incorporar/'+APP+'/post_upload';
		var dados = new FormData();
		dados.append('imagem', $('#but_galeria_upload input').prop('files')[0]);
		dados.append('cod', $(this).attr('data-cod'));

		$('#but_galeria_upload').addClass('hover');

		$.loading('show');
		$.ajax({
			url: link,
			data: dados,
			type: 'post',
			dataType : 'json',
			success: function(resposta){
				galeria(resposta);
			},
			error: function(resposta){
				galeria(resposta);
			},
			processData: false,
			cache: false,
			contentType: false
		});
	});

	var imagem_id;
	$('.album').on('click', '.deletar', function(){
		imagem_id = $(this).closest('figure').attr('data-id');
		$.alerta({
			titulo:'Deletar foto!',
			texto:'Tem certeza que deseja deletar essa foto? Essa ação não poderá ser desfeita.',
			confirmar:'but_deletar_confirmado'
		});
		return false;
	});
	$('body').on('click', '#but_deletar_confirmado', function(){
		$.loading('show');
		$.post($('#PAINEL').val()+'/incorporar/'+APP+'/post_deletar', {
			id:imagem_id
		}, function(){
			$.alerta({notificacao:'Foto deletada com sucesso!'});
			$('figure[data-id='+imagem_id+']').remove();
			$.loading('hide');
			imagem_id = '';
		});
	});

	$('.album').on('click', '.capa', function(){
		imagem_id = $(this).closest('figure').attr('data-id');
		$.alerta({
			titulo:'Confirmar capa!',
			texto:'Tem certeza que deseja colocar essa imagem como capa?',
			confirmar:'but_capa_confirmado'
		});
	});
	$('body').on('click', '#but_capa_confirmado', function(){

		$.post($('#PAINEL').val()+'/incorporar/'+APP+'/post_capa', {
			id:imagem_id,
			cod:$('#input_galeria_cod').val()
		}, function(resposta){
			if(resposta.erro == false){
				$.alerta({notificacao:'Capa cadastrada com sucesso!'});
			}else {
				$.alerta({
					titulo:resposta.titulo,
					texto:resposta.texto
				});
			}
			imagem_id = '';
		}, 'json');
	});
});
