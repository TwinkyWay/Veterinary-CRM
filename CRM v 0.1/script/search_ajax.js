window.onload = function() {
	function add_option(answer){
		let option = document.createElement('option');
		let optionResult = [];
		this.nextElementSibling.innerHTML = '';
		for (i = 0; i<answer.length; i++){
			let str = answer[i].name;
			optionResult[i] = option.cloneNode(true);
			optionResult[i].value = str;
			this.nextElementSibling.insertBefore(optionResult[i],null);
		}
	}
	function ajax(func, param) {
		let xhr = new XMLHttpRequest();
		xhr.onreadystatechange = () => {
			if (xhr.readyState == 4 && xhr.status!=200) {
				alert('Bad' + xhr.status + ': ' + xhr.statusText );
			} else if (xhr.readyState == 4){
				let answer = JSON.parse(xhr.responseText);			
				func.call(this,answer);
			}
		}
		xhr.open('POST','search.comp.php');
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send(param);
	}
	function list_owner(argument) {
		if (this.value.length<2) return;
		let param = 'ajax=owner&str='+this.value;
		ajax.call(this,add_option,param)
	}
	function list_animal(argument) {
		if (this.value.length<2) return;
		let param = 'ajax=animal&str='+this.value;
		ajax.call(this,add_option,param)
	}
	let input_owner = document.querySelector(".by_owner input[name$='owner']");
	input_owner.addEventListener('keyup',list_owner);
	let input_animal = document.querySelector(".by_animal input[name$='animal']");
	input_animal.addEventListener('keyup',list_animal);

}