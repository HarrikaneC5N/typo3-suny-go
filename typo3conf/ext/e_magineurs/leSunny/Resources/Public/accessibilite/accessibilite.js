/*!
 * a11yModule v1
 * by E-magineurs
 *
 */


(function (root, factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        // Node. Does not work with strict CommonJS, but
        // only CommonJS-like environments that support module.exports,
        // like Node.
        module.exports = factory(require('jquery'));
    } else {
        // Browser globals (root is window)
        root.a11yModule = factory(root.jQuery);
    }
}(this, function ($) {

    function a11yModule(options) {
        this.init();

        // options
        this.options = $.extend({}, this.constructor.defaults);
        this.option(options);

    }
    a11yModule.defaults = {
        element: '#bloc-a11y--content',
        modules: new Array('dyslexia', 'contraste', 'lineheight'),
        chemin:'/typo3conf/ext/e_magineurs/leSunny/Resources/Public/accessibilite/',
        position:'left'
    }
    a11yModule.prototype.option = function (options) {
        $.extend(this.options, options);
        //console.log(this.options);
    }
    a11yModule.prototype.init = function () {
        var self = this;

        $(document).ready(function () {
            self.build();
        });

    }


    /***************************
    
    Initialisation
    
    ***************************/

    a11yModule.prototype.build = function () {
        let self = this;
        this.$chemin = this.options.chemin;
        this.$element = this.options.element;
        $(this.$element).addClass('a11y-module').addClass(this.options.position);

        $(self.options.modules).each(function(){
            let accessTrigger = this;
            $('#'+this+'-adapted').on('click', function(){
                if( $(this).is(':checked') ){
                    self.btnAccessiblity(accessTrigger);
                    self.createCookie('accessibility-'+accessTrigger,'1',7);
                } else {
                    self.btnDefault(accessTrigger);
                    self.eraseCookie('accessibility-'+accessTrigger);
                }
            })
        })
    }

    /***************************
    
    Création du cookie
    
    ***************************/
    a11yModule.prototype.createCookie = function (name,value,days) {
        let self = this;
        if (days) {
            var date = new Date();
            date.setTime(date.getTime()+(days*24*60*60*1000));
            var expires = "; expires="+date.toGMTString();
        }
        else var expires = "";
        document.cookie = name+"="+value+expires+"; path=/";
    }

    /***************************
    
    Suppression du cookie
    
    ***************************/
    a11yModule.prototype.eraseCookie = function (name) {
        let self = this;
        self.createCookie(name,"",-1);
    }

    /***************************
    
    Maj du lien
    
    ***************************/
    a11yModule.prototype.btnDefault = function (name) {
        let self = this;
        if($('#'+name+'-css').length){
            $('#'+name+'-css').remove();
        }
        $('#'+name+'-adapted').prop('checked', false); 
    }


    /***************************
    
    Ajout de la feuille de syle correspondante
    
    ***************************/
    a11yModule.prototype.btnAccessiblity = function (name) {
        let self = this;
        if(!$('#'+name+'-css').length){
            $('head').append('<link rel="stylesheet" type="text/css" href="'+ self.$chemin +''+ name +'.css" id="'+name+'-css">');
        }
        $('#'+name+'-adapted').attr('checked');
        
    }

    return a11yModule;
}));

let accessibility = new a11yModule();
