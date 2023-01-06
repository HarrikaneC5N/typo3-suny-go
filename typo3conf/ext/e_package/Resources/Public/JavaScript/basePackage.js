(function($) {

	//KONAMI CODE
	var allowedKeys = {
	  37: 'left',
	  38: 'up',
	  39: 'right',
	  40: 'down',
	  65: 'a',
	  66: 'b'
	};
	var konamiCode = ['up', 'up', 'down', 'down', 'left', 'right', 'left', 'right', 'b', 'a'];
	var konamiCodePosition = 0;
	document.addEventListener('keydown', function(e) {
		var key = allowedKeys[e.keyCode];
		var requiredKey = konamiCode[konamiCodePosition];
		if (key == requiredKey) {
			konamiCodePosition++;
			if (konamiCodePosition == konamiCode.length)
			activateCheats();
		} else {
			konamiCodePosition = 0;
		}
	});
})(jQuery);

$(document).on('onInit.fb', function(e, instance) {
    if ($('.fancybox-toolbar').find('#rotate_button').length === 0) {
        $('.fancybox-toolbar').prepend('<button id="rotate_button" class="fancybox-button" title="Rotate Image"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M11.074,9.967a4.43,4.43,0,1,1-4.43-4.43V8.859l5.537-4.43L6.644,0V3.322a6.644,6.644,0,1,0,6.644,6.644Z" transform="translate(10.305 1) rotate(30)"/></svg></button>');
    }
    var click = 0;
    $('.fancybox-toolbar').on('click', '#rotate_button', function() {
        var n = 90 * ++click;
        $('.fancybox-content img').css('webkitTransform', 'rotate(+' + n + 'deg)');
        $('.fancybox-content img').css('mozTransform', 'rotate(+' + n + 'deg)');
    });
});
