function addNote(id){
	var url = 'add.php';
	var message = document.getElementById("message").value;
	var params = 'message=' + encodeURIComponent(message);
	ajaxPost(url, params).then(function(resolve){
		if(resolve == "error")
			alert("Такой пункт уже существует!");
		else
			document.querySelector('#allNote').innerHTML += resolve;
	}).catch(function(reject){
		document.querySelector('#allNote').innerHTML = reject;
	});
		document.getElementById("message").value = '';
}
function deleteNote(id){
	var url = 'delete.php';
	var params = 'message=' + id;
	ajaxPost(url, params).then(function(resolve){
		document.querySelector('#allNote').innerHTML = resolve; 
	}).catch(function(reject){
		document.querySelector('#allNote').innerHTML = reject;
	});
}
function ajaxPost(url, params){
	return new Promise(function(resolve, reject){
		var request = new XMLHttpRequest;
		request.open('POST', url, true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		request.addEventListener("load", () => {
			if(request.readyState == 4 && request.status == 200)
				resolve(request.responseText);
			else
				reject(Error("Error"));
		});
		request.send(params);
	});
}
