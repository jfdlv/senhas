	function valor(val){
	var valor = val;
	Caman(valor, function () {
		// width, height, x, y
	var h = this.height;
	var w = this.width;
	if(h<150 && w<150){
	this.crop(150,150,30,0);
		// Still have to call render!
	this.render();
	}
	else
	{
	this.crop(150,150,0,0);
		// Still have to call render!
	this.render();
	}	
	});
	}