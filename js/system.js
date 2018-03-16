function wait_preloader(value){
	value.parent('ul').append(
	'<div class="text-center"><div class="preloader pl-size-xs">'+
	    '<div class="spinner-layer pl-indigo">'+
	        '<div class="circle-clipper left">'+
	            '<div class="circle"></div>'+
	        '</div>'+
	        '<div class="circle-clipper right">'+
	            '<div class="circle"></div>'+
	        '</div>'+
	    '</div>'+
	'</div></div>'
	);
}