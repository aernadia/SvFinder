<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
      <title>Main layout page </title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/w3.css') }}" rel="stylesheet">
	<style>
		body {
		  margin: 0;
		  font-family: Arial, Helvetica, sans-serif;
      background-color: lavender;
		}
    body {margin:0;}

		.topnav {
		  overflow: hidden;
		  background-color: #87CEFA;
		}

		.topnav a {
			float: left;
			color: #0f0f0f;
			text-align: center;
			padding: 20px 30px;
			text-decoration: none;
			font-size: 20px;
		}
		
	

		.topnav a:hover {
		  background-color: #ddd;
		  color: black;
		}

		.topnav a.active {
		  background-color: #4CAF50;
		  color: white;
		}
		.container {
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 100px;
		}
		
		.material-icons {vertical-align:-14%}

		.welcome{
			float : right;
			color : white;
			text-align:center;
			padding:14px 16px;
			text-decoration:none;
			font-size:17px;
		}

    table {
  		border-collapse: collapse;
  		width: 100%;
	 
    }

    th, td {
    text-align: center;
    padding: 8px;
    }

    tr:nth-child(odd){background-color: white}

    th {
    background-color: #87CEFA;
    color: white;
    }
		</style>
    
  </head>
  <body>
        <div class="topnav">
            <a href="{{ url('/admin')}}"><i class="fa fa-male">&nbsp; SFAS</i></a>	
            <div class="topnav text-center">
              <h1>LIST OF LECTURERS </h1>
              
            </div>
        </div>
        
    
        <div class="container">
            @yield('content')
        </div>
        <div class="jumbotron text-center" style="margin-bottom:0">
          <p>Footer</p>
        </div>
        
     
  </body>
</html>