/***********************************************

Global Variables

************************************************/

let screenSizeWidth = $(window).width();
let screenSizeHeight = $(window).height();

let isPortrait = window.matchMedia("(orientation: portrait)").matches;
let isLandscape = window.matchMedia("(orientation: landscape)").matches;

let scroll = $(window).scrollTop();
let body = $('body');


/***************************************************

Fonction d'intitialisation des sliders
Gestion des paramètres du slider avec des data-attributes

Ex: <div class="slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'></div>
	

***************************************************/
function initSliders() {
    if ($(".slider").length) {
        $(".slider").slick({
			titleSlider: "Carrousel des actualités"
        });
    }    

    $(".play_pause_button").on('click', function() {
        if ($(this).hasClass("pause")) {
            $(this).parent()
                .slick('slickPause') // le slider se met en pause
                .slick('slickSetOption', 'autoplay', false); // l'autoplay est désactivé
            $(this).removeClass("pause");
            $(this).addClass("play");
            $(this).html("Lecture");
            $(this).attr("title", "Activer la lecture automatique");
        } 
        else {
            $(this).parent()
                .slick('slickPlay') // le slider se met en marche
                .slick('slickSetOption', 'autoplay', true); // l'autoplay est activé
            $(this).removeClass("play");
            $(this).addClass("pause");
            $(this).html("Pause");
            $(this).attr("title", "Mettre en pause la lecture automatique");
        }
    });
}

/***************************************************

Fonction d'intitialisation de la fancybox

***************************************************/
function initFancybox() {
    $("[data-fancybox], .fancybox").fancybox({
        // Options will go here
    });
}

/***************************************************

Fonction d'intitialisation de la fancybox

***************************************************/
function shareSocial() {
    let shareBtn = $('.btn-share');
    //Partage social
    let titre = $('title').text();
    let description = '';
	let keywords = '';
	if ($('meta[name=description]').length) {
		description = $('meta[name=description]').attr("content");
	}
	if ($('meta[name=keywords]').length) {
		keywords = $('meta[name=keywords]').attr("content");
	}



    shareBtn.on('click', function(e) {

        let media = $(this).attr('id');

        if (media == "social-facebook") {
            let facebookUrl = encodeURI("https://www.facebook.com/sharer/sharer.php?u=" + window.location.href);
            	window.open(facebookUrl, '_blank');
            	e.preventDefault();
        }

        if (media == "social-twitter") {
            let twitterUrl = encodeURI("https://twitter.com/intent/tweet?&url=" + window.location.href + "&text=" + titre + "&hashtags=" + keywords);
            	window.open(twitterUrl, '_blank');
    			e.preventDefault();
        }

        if (media == "social-linkedin") {
            let linkedinUrl = encodeURI("https://www.linkedin.com/shareArticle?mini=true&url=" + window.location.href + "&title=" + document.title + "&summary=" + description);
            	window.open(linkedinUrl, '_blank');
				e.preventDefault();
        }

        if (media == "social-pinterest") {
            let pinterestUrl = encodeURI("https://www.pinterest.com/pin/create/button/?url=" + window.location.href + "&description=" + description);
            	window.open(pinterestUrl, '_blank');
    			e.preventDefault();
        }
    })



}

/***************************************************

Fonction de gestion des liens externes du RTE

***************************************************/
function externalLinkHandler() {

    /*Surcharge title si target blank dans RTE*/
    if ($('.ce-bodytext').length) {
        $('.ce-bodytext a[target="_blank"]').each(function() {
            var attr = $(this).attr('title');
            var contentA = $(this).text()
            if (typeof attr !== typeof undefined && attr !== false) {
                $(this).attr('title', attr + ' (nouvelle fenêtre)');
            } else {
                $(this).attr('title', contentA + ' (nouvelle fenêtre)');
            }
        });
    }

    if ($('.ce-media').length) {
        $('.ce-media a[target="_blank"]').each(function() {
            var mediaTitle = $(this).children().attr('title');
            var mediaAlt = $(this).children().attr('alt')
            if (typeof mediaTitle !== typeof undefined && mediaTitle !== false) {
                $(this).attr('title', mediaTitle + ' (nouvelle fenêtre)');
            } else {
                $(this).attr('title', mediaAlt + ' (nouvelle fenêtre)');
            }
        });
    }
}

/***************************************************

Fonction d'appel du datepicker
Utiliser la classe datepicker

***************************************************/
function datepickers() {
    // $.datepicker.setDefaults({
    //     buttonImage: document.location.origin + "/typo3conf/ext/e_magineurs/leSunny/Resources/Public/Images/calendar.svg"
    // });

    // $(".datepicker").datepicker({
    //     changeMonth: true, //this option for allowing user to select month
    //     changeYear: true, //this option for allowing user to select from year range
    //     dateFormat: "dd/mm/yy"
    // });


var $button_start_stop = $( '.btn-datepicker' ),
    $input_start_stop = $( '.datepicker' );

$button_start_stop.on( 'click', function( event ) {
    event.preventDefault();
    var text = $button_start_stop.text()
    if ( $button_start_stop.hasClass("start") ) {
        $button_start_stop.removeClass( 'start' )
        $button_start_stop.addClass( 'stop' )
        $button_start_stop.text( 'Désactiver le calendrier' )
        $button_start_stop.attr('title', 'Désactiver le calendrier')
        $input_start_stop.pickadate({
            labelMonthNext: 'Mois suivant',
            labelMonthPrev: 'Mois précédent',
            labelMonthSelect: 'Choisir un mois',
            labelYearSelect: 'Choisir une année',
            selectMonths: 12,
            selectYears: 100,
            max: new Date(((new Date()).getFullYear()), 12, 31), // Set it max to next year last day
            format: 'dd/mm/yyyy',
            formatSubmit: 'dd/mm/yyyy',
            monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
            today: 'aujourd\'hui',
            clear: 'effacer',

        })
    }
    else {
        $button_start_stop.removeClass( 'stop' )
        $button_start_stop.addClass( 'start' )
        $button_start_stop.text( 'Activer le calendrier' )
        $button_start_stop.attr('title', 'Désactiver le calendrier (non accessible au clavier)')
        $input_start_stop.pickadate( 'picker' ).stop()
    }
    event.stopPropagation()
})

}

/***************************************************

Fonction de gestion des formulaires

***************************************************/

function formsHandlers() {
    // Surcharge input file
    $('.custom-file-input').on('change', function() {
        //get the file name
        var fileName = $(this).val();
        var finalName = fileName.replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(finalName);
    })

    /*--- formulaire title --- */
    if ($('.tx-powermail').length > 0) {
        title_page = document.title;
        //title_page = document.title;
        var boucle;

        function changetitle() {
            if ($('.parsley-errors-list li').length > 0) {
                document.title = 'Erreur(s) sur le formulaire - ' + title_page;
            } else {
                document.title = title_page;
            }
            boucle = setTimeout(changetitle, 1000);
        }
        changetitle();
    }
}


/***********************************************

Menu burger : systeme de base de l'ouverture et fermeture du menu de navigation en burger
Activation / desactivation dans initSite();


************************************************/
/*
function openMenu(navigation) {
    navigation.addClass('open');
    body.addClass('open-menu');
    closeSearchbar();
    closeEspaces();
    $('#toggle-menu').attr('aria-expanded', 'true');
}

function closeMenu(navigation) {
    navigation.removeClass('open');
    body.removeClass('open-menu');
    $('#toggle-menu').attr('aria-expanded', 'false');
}

function isMenuOpen() {
    if (body.hasClass('open-menu')) {
        return true;
    } else {
        return false;
    }
}

function initiateMenu() {
    let navigation = $('nav.nav');

    $('#toggle-menu').click(function(e) {

        if (isMenuOpen()) {

            closeMenu(navigation);
        } else {

            openMenu(navigation);
        }
    })
    $("#toggle-menu").click(function() {
        closeMenu(navigation);
    })
}
*/
/***********************************************
        

Bouton de scroll Top


************************************************/
function scrollToTop() {

    var speed = 750; // Durée de l'animation (en ms)
    $('html, body').animate({
        scrollTop: 0
    }, speed);
    $("#mainContent").focus();
}


function initScrollTop() {
    let scrollTopBtn = $('#backToTop');
    scrollTopBtn.click(function() {
        scrollToTop();
    })
}

/**************************************************

Fonction d'appel global
Pour désactiver une fonctionnalité, commenter une des fonction

**************************************************/
function initSite() {
    initSliders();
    initFancybox();
    datepickers();
    externalLinkHandler();
    //initiateSearchbar();
    //initiateMenu();
    formsHandlers();
    initScrollTop();
    shareSocial();
}

/***********************************************
        

Event trigger functions


************************************************/

$(window).resize(function() {

    /* Width and height screen update */

    screenSizeWidth = $(window).width();
    screenSizeHeight = $(window).height();

    isPortrait = window.matchMedia("(orientation: portrait)").matches;
    isLandscape = window.matchMedia("(orientation: landscape)").matches;

});

$(window).scroll(function() {

    if (scroll > 80) {
        $('body').addClass('scrolled');
    } else {
        $('body').removeClass('scrolled');
    }
    if ($(window).scrollTop() > scroll) {
        $('body').addClass('scrolled-top');
        $('body').removeClass('scrolled-bottom');
    } else {
        $('body').addClass('scrolled-bottom');
        $('body').removeClass('scrolled-top');
    }
    scroll = $(window).scrollTop();


});



/**************************************************
	
Initiliatisation du site

**************************************************/
initSite();

//Konami Code ! Have Fun !
function activateCheats() {
    $.fancybox.open({
        width: '60%',
        type: 'iframe',
        autoPlay: true,
        src: 'https://www.youtube.com/watch?v=u5Ho1trvlro?autoplay=1'
    });
}

//Email webPage
function emailCurrentPage() {
    window.location.href = "mailto:?subject=" + document.title + "&body=" + encodeURI(window.location.href);
}