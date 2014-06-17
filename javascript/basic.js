$('#photo').mouseover(function () {
	document.getElementById("photod").style.display = "block";
});

jQuery(function ($) {
	
	$('#basic-opcao').click(function (e) {
		//Carregar Ajax uma pagina
		$('<div></div>').load('./pags_logon/opcao.php').modal({
			//Fechar ao clickar na tela
			overlayClose:true,
			//Opacidade do fundo.
			opacity:80,
			//Tamanhos
			minHeight:400,
			//Cor da Opacidade de fundo
			overlayCss: {backgroundColor:"#000"},
			//Animação ao Abrir
			onOpen: function (dialog) {
				dialog.overlay.fadeIn('slow', function () {
					dialog.data.hide();
					dialog.container.fadeIn('slow', function () {
						dialog.data.slideDown('slow');	 
					});
				});
			},
			//Animacao ao fechar.
			onClose: function (dialog) {
				dialog.data.fadeOut('slow', function () {
					dialog.container.hide('slow', function () {
						dialog.overlay.slideUp('fast', function () {
							$.modal.close();
						});
					});
				});
			}
		});

		return false;
	});
	
	$('#basic-foto').click(function (e) {
		//Carregar Ajax uma pagina
		$('<div></div>').load('./pags_logon/foto.php').modal({
			//Fechar ao clickar na tela
			overlayClose:true,
			//Opacidade do fundo.
			opacity:80,
			//Cor da Opacidade de fundo
			overlayCss: {backgroundColor:"#000"},
			//Animação ao Abrir
			onOpen: function (dialog) {
				dialog.overlay.fadeIn('slow', function () {
					dialog.data.hide();
					dialog.container.fadeIn('slow', function () {
						dialog.data.slideDown('slow');	 
					});
				});
			},
			//Animacao ao fechar.
			onClose: function (dialog) {
				dialog.data.fadeOut('slow', function () {
					dialog.container.hide('slow', function () {
						dialog.overlay.slideUp('fast', function () {
							$.modal.close();
						});
					});
				});
			}
		});

		return false;
	});
	
});