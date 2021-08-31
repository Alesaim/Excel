<!DOCTYPE html>
<html>
<head>
	<title> Drag & Drop </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
	  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
	  crossorigin="anonymous">
	</script>
	<script src="/js/dropzone.js"></script>
	<link rel="stylesheet" type="text/css" href="css/dropzone.css">

</head>
<body> 
	<div class="container-fluid">
		<br />
		<h3 align="center">Image Upload using Dropzone/Ajax</h3>
		<br />

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Select Image</h3>
			</div>
			<div class="panel-body">
				<form id="dropzoneForm" class="dropzone" action="{{ route('dropzone.upload') }}">
					@csrf
				</form>
				<div align="center" class="abc">
					<button type="button" class="btn btn-info" id="submit-all" >Upload</button>
				</div>
			</div>
		</div>
		<br />

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Uploaded Images</h3>
			</div>
			<div class="panel-body" id="uploaded_image">
				
				<div align="center">
										
				</div>
			</div>
		</div>
	</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>	
</body>
</html>

<script type="text/javascript">
	//Initailization of drop zone librery
	Dropzone.options.dropzoneForm = {
		autoProcessQueue : false,
		acceptedFiles : ".png, .jpg, gif, .bmp, jpeg",

		//Dropzone modification
		init:function(){
			var submitButton = document.querySelector("#submit-all");
			myDropzone = this;

			submitButton.addEventListener('click', function(){
				myDropzone.processQueue();
			});

			this.on("complete", function(){
				if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
				{
					var _this = this;
					_this.removeAllFiles();
				}
				load_images();
			});
		}
	}

	load_images();

	function load_images()
	{
		$.ajax({
			url : "{{ route('dropzone.fetch') }}",
			success : function(data)
			{
				$('#uploaded_image').html(data);
			}
		})
	}

	$(document).on('click', '.remove_image', function(){
		var name = $(this).attr('id');
		$.ajax({
			url : "{{ route('dropzone.delete')}}",
			data : {name : name},
			success : function(data){
				load_images();
			}
		});
	});


</script>