<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Export Excel & CSV</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5 text-center">
        <h2 class="mb-4">
            Import and Export CSV & Excel
        </h2>

        @if($message = Session::get('success'))
                 <div class="alert alert-success">
                     <p>{{ $message }}</p>
                 </div>
        @endif

        <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">

                <div class="form-group">
                    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                </div>

            </div>
            <button class="btn btn-primary" style='width:45%;'>Import data</button>
            
        </form>

        <div class=" mt-3">
            <a class="btn btn-success" href="{{ route('file-export') }}" style='width:45%;'>Export data</a>
        </div>
    </div>

</body>

</html>