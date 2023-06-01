<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/pfont-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-6jKb6UZBdUACO7TfcOjXsV/zjyL6+cSQqt7ThLq3h0jKZgugxZvMO0W+JhXtrgRhKyoewLJzQDYd1xNnTFjlVw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<form action="{{ route('login.post') }}" method="POST">
@csrf
<body>
<!-- partial:index.partial.html -->
<div class="box-form">
	<div class="left">
        <img src="images/backgrounds/login.jpg" alt="Image description">` 
 		<div class="overlay">
		</div>
	</div>
	
		<div class="right">
		<header>
    <h1 class="welcome">Welcome!</h1>
		</header>
    <div>
  <input id="email" class="block mt-1 w-full" type="email" name="email" 
    required autocomplete="" placeholder="Enter your email" value="Enter your email" onclick="clearEmailInputValue(this)" />
  <span class="error"></span>
</div>

<script>
  function clearEmailInputValue(input) {
    if (input.value === "Enter your email") {
      input.value = "";
    }
  }
</script>

<div>
  <input id="password" class="block mt-1 w-full" type="password" name="password" 
    required autocomplete="" placeholder="Enter your password" value="" onclick="clearPasswordInputValue(this)" />
  <span class="error"></span>
</div>

<script>
  function clearPasswordInputValue(input) {
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
    
 
</div>

<button class="login-button"> {{ __('Log in') }}</button>
<a href="{{ route('register') }}"></a>


</div>
	
</div>
<!-- partial -->
  
</body>
</form>
</html>
