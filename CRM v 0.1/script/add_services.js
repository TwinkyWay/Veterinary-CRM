document.addEventListener("DOMContentLoaded", function(){
	const addOptionDatalist = (answer) => {
		let option = document.createElement('option');
		let optionResult = [];
		/*for (let i=0; i<price.childNodes.length; i++){
			price.childNodes[i].remove();
		}*/
		price.innerHTML = '';
		for (i = 0; i<answer.length; i++){
			let str = answer[i].code_id+'-'+answer[i].name+'-'+answer[i].price;
			optionResult[i] = option.cloneNode(true);
			optionResult[i].value = str;
			price.insertBefore(optionResult[i],null);
		}
	};
	const check_duplicates = (answer) => {
		let code = choice.querySelectorAll('[name^=\'code_id\'');
		for (var i = 0; i < code.length; i++) {
			if (code[i].value==answer.code_id) {
				let mes = 'Имеется дублирующая запись: '+ answer.code_id + answer.name;
				alert(mes);
				return true;
			}
		}
	}
	const addSelectResult = (answer) => {
		if (check_duplicates(answer)) return;
		let div = document.createElement('div');
		div.className = 'service';
		let elem = '<input type="numeric" name="code_id[]" value="'+answer.code_id+'">';
		elem += '<input type="text" value="'+answer.name+'" readonly>';
		elem += '<input type="text" class="price" value="'+answer.price+'" readonly>';
		elem += '<input type="button" class="btn_delete" value="Удалить">';
		div.innerHTML = elem;
		choice.insertBefore(div, null);
		sum();
	};
	
	sendForm.addEventListener('click',()=>{
		reception_form.submit();
	})
	
	const priceAjax = (data) => {
		if (priceInput.value.length>1){
			let xhr = new XMLHttpRequest();
			let param = 'price='+priceInput.value;
			xhr.open('POST','add_reception.comp.php');
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.send(param);
			xhr.onreadystatechange = () => {
				if (xhr.readyState == 4 && xhr.status!=200) {
					alert('Bad' + xhr.status + ': ' + xhr.statusText );
				} else if (xhr.readyState == 4){
					if (xhr.responseText == 'false') return;
					let answer = JSON.parse(xhr.responseText);
					addOptionDatalist(answer);
				}
			}
		}
	}
	let priceInput = document.querySelector('[list=price]');
	priceInput.addEventListener('keyup',priceAjax);

	servicesCode.addEventListener('change',(data)=>{
		let num = priceInput.value.substring(0,3);
		priceInput.value = '';
		let param = 'price='+num+'&select=true';
		let xhr = new XMLHttpRequest();
		xhr.open('POST','add_reception.comp.php');
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send(param);
		xhr.onreadystatechange = () => {
			if (xhr.readyState == 4 && xhr.status!=200) {
				alert('Bad' + xhr.status + ': ' + xhr.statusText );
			} else if (xhr.readyState == 4){
				if (xhr.responseText == 'false') {
					alert('Услуги не найдено');
					return;
				};
				let answer = JSON.parse(xhr.responseText);
				addSelectResult(answer);
			}
		}
	});
});