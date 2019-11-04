document.addEventListener("DOMContentLoaded", function(){
	function ajax(func, param) {
		let xhr = new XMLHttpRequest();
		xhr.open('POST','delete_service.comp.php');
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send(param);
		xhr.onreadystatechange = () => {
			if (xhr.readyState == 4 && xhr.status!=200) {
				alert('Bad' + xhr.status + ': ' + xhr.statusText );
			} else if (xhr.readyState == 4){
				func(xhr.responseText);
			}
		}
	}
	const del_ser = (element) => {
		if (element.srcElement.className != 'btn_delete') return;
		let result = document.location.search.match(/recept=([0-9].)/i );
		if (result === null) {
			alert('Заполните любое поле и сохраните, после этого возможно удалять.');
			return;
		}
		let div_ser = element.srcElement.parentNode
		let code_id = div_ser.querySelector('[name^=\'code_id\']');
		let param = 'ajax=delete&code='+code_id.value+'&recept='+result[1];
		ajax(alert, param);
		div_ser.remove();
		sum();
	}
	choice.addEventListener('click', del_ser);
});