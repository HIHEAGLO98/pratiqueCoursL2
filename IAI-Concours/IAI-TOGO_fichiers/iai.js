/* ============================================================= */
/* Contenu ajouté avec jQuery.sublime-text-snippet [ BSPharaon ] */
/* ============================================================= */
/* 
	==================  TODO LIST ================
	@todo:Prédiction

*/

var index = 1,
	switcherIn = $("div.switcher-in"),
	onBody=true,
	sidebarToggle = $("button#sidebar-toggle"),
	_sidebar_container = $("aside.sidebar"),
	_close_sidebar = $("i#_back"),
	pos = $(document).scrollTop(),
	walker = $("button#walker");

(function($)
{
	
	/* Après chargement de la page */
	$(document).ready(function()
	{
		// My Citation
		// _init_citation ();

		var target = $("div#_menu_pubs"), caller = $("li#_menu_pubs");
		caller.on('click' , function()
		{
			target.fadeToggle(0);
		});

		// Gallery
		_init_galery ();

		// Click sur un élément du navbar fixed-top
		_init_nav_events ();

		// Switch les blocs sur une page
		_init_switcher ();

		// Fixer le walker kan on atteint un niveau !
		if ($("body#fixWalker"))
		{
			if (pos >= $("div#presentation").height())
			{
				walker.find('div.ripple-wrapper').removeClass('shadow-z-1');
				walker.find('div.ripple-wrapper').addClass('shadow-z-0');
				walker.css({
					'position' : 'fixed',
					'top': '38px'
				});
			}
			else
			{
				walker.find('div.ripple-wrapper').addClass('shadow-z-1');
				walker.find('div.ripple-wrapper').removeClass('shadow-z-0');
				
				walker.css({
					'position' : 'absolute',
					'top' : $("div#presentation").height() + 63
				});
			}
		}

		// Initialiser le menu Publicités
		_init_pubs ();

		// Init click events
		_init_clicks ();

		/* Initialiser les evts scroll */
		_init_scroll ();
	});

}) (jQuery);

function _init_clicks ()
{
	// Le label du menu
	$("#menuLabel").on('click' , function() {
		sidebarToggle.trigger('click');
	});

	// Ouvrir le dépliant
	$(".open-depliant").on('click' , function(e)
	{
		var target = $("div#_menu_pubs");
		target.fadeIn(0);
	});

	// Click sur un élément du sidebar
	$("._side_menu").on('click' , function()
	{
		$("i#_back").trigger('click');
	});

	// Ouvrir et fermer @ AIO
	sidebarToggle.on('click' , function()
	{
		onBody = false;

		// Init @ Ramener le top du side bar à O avant de laisser scoller
		_sidebar_container.css('top','0');

		// Back face .JS @ Rendre le fond de la page sombre kan le menu s'ouvre
		$("div#_wrapper").append('<div class = "col-xs-12" id="backFace" style = "position:fixed;top:0;bottom:0;left:0;right:0;width:100%;height:100%;background-color:rgb(0,0,0);opacity:.7;z-index:99"></div>');
		_sidebar_container.addClass('_open_side_bar');
		_sidebar_container.focus();
		// _sidebar_container.scrollTop(0); // Garder en commentaires si vous voulez mémoriser la position du scroll dans le sidebar

		$("div#backFace").on('click' , function()
		{
			_close_sidebar.trigger('click');
		});

		// Fermer
		_close_sidebar.on('click' , function()
		{
			// @ Faire disparaître le div servant à rendre la page sombre
			$("div#_wrapper").find('div#backFace').remove();
			_sidebar_container.removeClass('_open_side_bar');

			// Redonner la main au document pour le scroll
			$("#_focuser").select();
			$("#_focuser").blur();
			_sidebar_container.blur();
			onBody = true;
		});
	});
}

function _init_scroll ()
{
	$(document).on('scroll' , function(e)
	{
		pos = $(document).scrollTop();

		if (onBody)
		{
			// Sur la page

			/* FixWalker */
			if (pos >= $("div#presentation").height())
			{
				walker.find('div.ripple-wrapper').removeClass('shadow-z-1');
				walker.find('div.ripple-wrapper').addClass('shadow-z-0');
				walker.css({
					'position' : 'fixed',
					'top': '38px'
				});
			}
			else
			{
				walker.find('div.ripple-wrapper').addClass('shadow-z-1');
				walker.find('div.ripple-wrapper').removeClass('shadow-z-0');
				
				walker.css({
					'position' : 'absolute',
					'top' : $("div#presentation").height() + 63
				});
			}

			// Cacher le menu publicités kan on scolle
			if ($("div#_menu_pubs").css('display') != 'none')
			{
				$("li#_menu_pubs").trigger('click');
			}

			// Donner le focus au champ fixé sur la page --> la page a alors le focus
			$("#_focuser").select();
			$("#_focuser").blur();

			// Donner l'active au menu HOME
			if (!$("li#__home").hasClass('active_li') && $("li#_menu_pubs").hasClass('active_li'))
			{
				$("li.navbar_li").removeClass('active_li');
				$("li#__home").addClass('active_li');
			}
		}
		else
		{
			// Sur le sidebar
			$(document).scrollTop(pos); // Refuser le scroll sur la page même
			_sidebar_container.focus();
			$("#content_wrapper").blur();
		}
	});
}

function _init_pubs ()
{
	var target = $("div#_menu_pubs"), caller = $("li#_menu_pubs");
	caller.on('click' , function()
	{
		// target.fadeToggle(0);
	});
}

function _init_switcher ()
{
	switcherIn.on('mouseover' , function()
	{
		var self = $(this), title = self.attr('data-switcher-title'), title_template = '<div id="switcher_title">' + title + '</div>';
		// title_template.remove();
		$("#content_wrapper").append(title_template),
		$("#switcher_title").css({
			'background-color' : '#6AB344',
			'color' : 'white',
			'font-family' : 'Roboto',
			'font-size' : '22px',
			'padding' : '18px',
			'position' : 'fixed',
			'z-index': '1',
			'top' : '47.5%',
			'right' : '35px',
			'border-radius' : '2px 0 0 2px',
			'text-align' : 'center'
		}), $("#switcher_title").animate({
			'right' : '55px'
		} , 'fast' , 'swing' , function()
		{
			$(this).css({
				'right' : '55px'
			});
		});

		switcherIn.on('mouseout' , function()
		{
			$("#switcher_title").remove();
		});
	});
}

function _init_nav_events ()
{
	var navbar_li = $("li.navbar_li");
	navbar_li.on('click' , function()
	{
		navbar_li.removeClass('active_li');
		$(this).addClass('active_li');
	});
}

function _init_galery ()
{
	var _left = $("div#_left"), _right = $("div#_right"), imgIndex = 1, _galery_container = $("div#slide_wrapper"), _indicator = $("div.slide_indicator");
	
	// Init
	_galery_container.find('img').attr('src' , 'images/boolspan/' + imgIndex + '.png'), $("div.slide_indicator#1").addClass('actif_indicator'), _slide_desc = $("div#_slide_desc");

	// Listen
	_right.on('click' , function()
	{
		imgIndex = (imgIndex === 5) ? 0 : imgIndex;
		_galery_container.find('img').fadeOut(0), _galery_container.find('img').attr('src' , 'images/boolspan/' + (++imgIndex) + '.png'), _galery_container.find('img').fadeIn(0);
		$("div.slide_indicator#" + imgIndex).trigger('click');
	});

	_left.on('click' , function()
	{
		imgIndex = (imgIndex === 1) ? 6 : imgIndex;
		_galery_container.find('img').fadeOut(0), _galery_container.find('img').attr('src' , 'images/boolspan/' + (--imgIndex) + '.png'), _galery_container.find('img').fadeIn(0);
		$("div.slide_indicator#" + imgIndex).trigger('click');
	});

	_indicator.on('click' , function()
	{
		_galery_container.find('img').fadeOut(0), _galery_container.find('img').attr('src' , 'images/boolspan/' + parseInt($(this).attr('id')) + '.png'), _galery_container.find('img').fadeIn(0);
		_indicator.removeClass('actif_indicator');
		$(this).addClass('actif_indicator'), imgIndex = parseInt($(this).attr('id'));

		// And append description
		var _title = _slide_desc.find('h3'), _desc = _slide_desc.find('p'), _linkTo = _slide_desc.find('a');

		switch (imgIndex)
		{
			case 1:
				_title.text('Titre 1'), _desc.text('lorem ipsum dolor si amet'), _linkTo.attr('href', "#");
				break;

			case 2:
				_title.text('Titre 2'), _desc.text('consectetur adipisicing elit, sed do eiusmod'), _linkTo.attr('href', "google.tg");
				break;

			case 3:
				_title.text('Titre 3'), _desc.text('tempor incididunt ut labore et dolore magna aliqua.'), _linkTo.attr('href', "#");
				break;

			case 4:
				_title.text('Titre 4'), _desc.text('Ut enim ad minim veniam, quis nostrud exercitation'), _linkTo.attr('href', "#");
				break;

			case 5:
				_title.text('Titre 5'), _desc.text('ullamco laboris nisi ut aliquip ex ea commodo.'), _linkTo.attr('href', "#");
				break;

			default:
				break;
		}
	});
}

function _init_citation ()
{
	var _citation = $("div#toChange"), newTexte = "", thisWidth = '0';

	setTimeout(function()
	{
		switch (index)
		{
			case 1:
				newTexte = "développement d'applications";
				thisWidth = "345px";
				index = 2;
				break;

			case 2:
				newTexte = "systèmes et réseaux";
				thisWidth = "240px";
				index = 3;
				break;

			case 3:
				newTexte = "multimédia et infographie";
				thisWidth = "300px";
				index = 1;
				break;

			default:
				alert("Erreur Backspace");
				break;
		}

		_citation.animate({
			width : 0
		} , 'slow' , 'swing' , function()
		{
			$(this).text(newTexte);
			$(this).animate({
				width : thisWidth
			} , 'slow' , 'swing');
		});

		_init_citation ();

	}, 4000);
}

function goto(dest) {
	var validDest = ['alternance','modulaire','continue','certifiante'];
	if (dest && validDest.indexOf(dest) > -1) {
		window.location.href = "formations.php?sender=" + dest;
	}
}

function switchTo (dest) {
	if ($('body').attr('role') == "INDEX") {
		scrol(dest);
	} else {
		window.location.href = "index.php?sender=" + dest;
	}
}

function scrol(idDiv) {
    $('html, body').animate({
        scrollTop: $("#"+idDiv).offset().top-72
    }, 500);
}

function testDiv(idDiv) {
	offset= $('#'+idDiv).offset();
    var posY = offset.top - $(window).scrollTop();
    var posX = offset.left - $(window).scrollLeft(); 
            
    if ( (posY>-100) && (posY<600) ){
        return idDiv;
    }
    return null;
}

function testDivJquery(idDiv) {
    if ( $('#'+idDiv).visible('partial') ){
        return idDiv;
    }
    return null;
}

function detectDiv() {
    var retour=0;
    $(".thk").each(function() {
        if (testDiv( $(this).attr("id") ) ) {    
           retour= testDiv( $(this).attr("id") ) 
        };
    });
    
    if (retour==0) {
        $(".thk").each(function() {
            if (testDivJquery( $(this).attr("id") ) ) {
            	retour= testDivJquery( $(this).attr("id") ) 
           	};
        }); 
    }
    return retour;
}

function suiv(thkX) {
	var nbre=parseInt(thkX), modulo=$(".thk").length;
	thkX=(nbre)%(modulo);
	thkX+=1;
	return thkX;
}
