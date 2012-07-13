$(document).ready(function()
{

init();

});

var uploaded = new Array();


function FileDragHover(e)
{
	e.stopPropagation();
	e.preventDefault();
	e.target.className = (e.type == "dragover" ? "hover" : ""); 
}

function FileSelectHandler(e) {

		// cancel event and hover styling
		FileDragHover(e);

		// fetch FileList object
		var files = e.target.files || e.dataTransfer.files;
		
		// process all File objects
		for (var i = 0, f; f = files[i]; i++) {
			ParseFile(f);
			UploadFile(f);
		}

	}


function ParseFile(file) {

		Output(
			"<p>File information: <strong>" + file.name +
			"</strong> type: <strong>" + file.type +
			"</strong> size: <strong>" + file.size +
			"</strong> bytes</p>"
		);

		// Uploading a jpeg
		if (file.type.match('image.jpeg')) 
		{
			Output(
				'<div class="file_upload">'+
				"<p><strong>" + file.name + ":</strong><br />" +
				'<img src="/assets/img/icons/jpeg.png"/></p>'+
				'<div id="progress"></div>'+
				"</div>"
				);
		}


		// Uploading a jpeg
		if (file.type.match('application.pdf')) 
		{
			Output(
				'<div class="file_upload">'+
				"<p><strong>" + file.name + ":</strong><br />" +
				'<img src="/assets/img/icons/pdf.png"/></p>'+
				'<div id="progress"></div>'+
				"</div>"
				);
		}

	}


	// upload JPEG files
	function UploadFile(file) {

		var xhr = new XMLHttpRequest();
		if (xhr.upload && file.type.match('image.*||application.msword||application.pdf')) {

			//create progress bar
			var o = document.getElementById("progress");
			var progress = o.appendChild(document.createElement("p"));
			progress.appendChild(document.createTextNode("upload " + file.name));


			// progress bar
			xhr.upload.addEventListener("progress", function(e) {
			var pc = parseInt(100 - (e.loaded / e.total * 100));
			progress.style.backgroundPosition = pc + "% 0";
			}, false);

			// file received/failed
			xhr.onreadystatechange = function(e) {
			if (xhr.readyState == 4) {
				progress.className = (xhr.status == 200 ? "success" : "failure");
			}
			};

			// start upload
			xhr.open("POST", '/events/upload', true);
			xhr.setRequestHeader("X_FILENAME", file.name);
			xhr.send(file);

			uploaded.push(file.name);
			document.forms[0].elements['form_files'].value = uploaded;

		}


	}


// output information
	function Output(msg) {
		var m = document.getElementById('messages');
		m.innerHTML = msg + m.innerHTML;
	}


function init()
{
	var filedrag = document.getElementById('filedrag');
	var fileselect = document.getElementById('fileselect');
	var xhr = new XMLHttpRequest();
	if(xhr.upload)
	{
		filedrag.addEventListener("dragover", FileDragHover, false);
		filedrag.addEventListener("dragleave", FileDragHover, false);
		filedrag.addEventListener("drop", FileSelectHandler, false);
		filedrag.style.display = "block";
		fileselect.style.display = "none";
		document.forms[0].elements['drag_drop'].value = 1;

	}
}





