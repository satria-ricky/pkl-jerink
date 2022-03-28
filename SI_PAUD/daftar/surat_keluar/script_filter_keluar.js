var keyword = document.getElementById('Kategori2');
var container = document.getElementById('container');


keyword.addEventListener('keyup', function(){
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4 && xhr.status == 200){
			container.innerHTML = xhr.responseText;
		}
	}

	xhr.open('GET', 'filter_surat_keluar.php?keyword='+keyword.value, true);
	xhr.send();

});