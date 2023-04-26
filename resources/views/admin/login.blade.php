@section('content')
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/pfont-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./style.css">

</head>
<form action="{{ route('login.post') }}" method="POST">
@csrf
<body>
<!-- partial:index.partial.html -->
<div class="box-form">
	<div class="left">
        <img src="images/backgrounds/bg3.jpg" alt="Image description">
		<div class="overlay">
		</div>
	</div>
	
		<div class="right">
		<header>
  		<h1>Hello Admin</h1>
		</header>
		<div>

    <div>
  <input id="email" class="block mt-1 w-full" type="email" name="email" 
  required autocomplete="username" placeholder="Enter your email" value="Enter your email" onclick="clearInputValue(this)" />
  <span class="error"></span>
</div>

<script>
  function clearInputValue(input) {
    if (input.value === "Enter your email") {
      input.value = "";
    }
  }
</script>

<!-- Password -->
<div>
  <input id="password" class="block mt-1 w-full" type="password" name="password" 
  required autocomplete="current-password" placeholder="Enter your password" value="Enter your password" onclick="clearInputValue(this)" />
  <span class="error"></span>
</div>

<script>
  function clearInputValue(input) {
    if (input.value === "Enter your password") {
      input.value = "";
    }
  }
</script>


<!-- Remember Me and Forgot Password -->
<div class="flex items-center justify-between mt-4">
  <div class="flex items-center">
    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
    <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
    
  
  @if (Route::has('password.request'))
  <a href="{{ route('password.request') }}">
    {{ __('Forgot your password?') }}
  </a>


  @endif
</div>

<button class="login-button"> {{ __('Log in') }}</button>
<a href="{{ route('register') }}"></a>

<div class="text center-end mt-4">
<p class="text-center ">
                Don't have an account? 
                <a href="{{ route('register') }}">Register</a>
            </p>
        </div>
</div>
	
</div>
<!-- partial -->
  
</body>
</form>
</html>
@endsection