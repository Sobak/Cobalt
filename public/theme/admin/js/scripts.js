var buttons = document.querySelectorAll('span[data-dismiss="notification"]');
for (var i = 0; i < buttons.length; i++) {
	buttons[i].addEventListener('click', function() {
		this.parentNode.parentNode.removeChild(this.parentNode); 
	});
}