<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Laravel</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!-- CSS и JavaScript -->
  </head>

  <body>
    <div class="container">
      <nav class="navbar navbar-default">
	  <a href="{{url('/')}}">Home</a>
      </nav>
    </div>
    @yield('content')
  </body>
</html>