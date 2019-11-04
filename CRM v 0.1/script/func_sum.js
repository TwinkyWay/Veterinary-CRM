const sum = () => {
	if (!document.querySelector('.sum')){
		let div = document.createElement('div');
		div.className = 'sum';
		div.innerHTML = '<span>Сумма: </span><input type="text" readonly>';
		servicesCode.insertBefore(div, null);
		//document.querySelector('.reception fieldset').insertBefore(div, document.querySelector('[value=add_reception]'));
	}
	let price = document.querySelectorAll('.price');
	let sumMoney = 0;
	for (var i = price.length - 1; i >= 0; i--) {
		sumMoney += +price[i].value;
	}
	document.querySelector('.sum input').value = sumMoney;
}