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

	<style type="text/css">

	.clm{
		display: flex;
		float: left;
		width: 33.33%;
		padding: 5px;
	}

	.clm img{
		height: 300px;
	}
	</style>


</head>
<body> 

	<section style="pedding-top:60px;">
		<div class="container">
			<div class="row text-center">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h2> Drag & Drop </h2>
						</div>
						<div class="card-body">
							<form method="post" action="{{ route('dropzone.store')}}" enctype="multipart/form-data" class="dropzone dz-clickable" id="image-upload">
								@csrf
								<div>
									<h3 class="text-center">Upload image by click on box</h3>
								</div>
								<div class="dz-default dz-message"><span> Drop files here to upload </span></div>
								<!-- <input type="file" name="file" value="upload">
								<button type="submit"> Save </button> -->
							</form>
						</div>						
					</div>
				</div>
				<h2> Images </h2>
						
				@foreach($files as $item)
					<p> 
						<div class="row">
							<div class="clm">
								<img src="{{ asset('images/'.$item->file)}}" width="100%" alt="Image">
					        </div>
					    </div>
					</p>
				@endforeach
			</div>
		</div>		
	</section>


	

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>	
</body>
</html>