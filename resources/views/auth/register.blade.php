<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration form</title>
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-image:  url('images/backgrounds/registration.png');
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-attachment: fixed;
    font-family: "Open Sans", sans-serif;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: 250px;
    top: -100px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -450px;
    bottom: -100px;
}
form{
    margin-left: 350px;
    height: 520px;
    width: 400px;
    background:linear-gradient( #010101,#555555);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: black;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}

label{
    display: block;
    margin-top: 10px;
    margin-bottom: 10px;
    font-size: 16px;
    color:whitesmoke;
    font-weight: 450;
}
input{
    display: block;
    width: 100%;
  padding: 10px;
  border-radius: 11px;
  border: 3px solid #27C2DA;
  margin-bottom: 15px;
  box-sizing: border-box;
}


button{
    width: 50%;
    display: block; 
    margin: 0 auto; 
    margin-top: 30px;
    background-color: #1486B0; 
    color: white; 
    border-radius: 11px;
    border: 2px solid  #27C2DA;;
    padding: 8px 30px; 
    font-size: 16px; 
    cursor: pointer; 
}
a:hover {
  color: #27C2DA;
}

.text-center-end {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.text-center {
  text-align: center;
  color:whitesmoke;
  margin-top: 15px;
}

.text-center a {
  color: White;
  font-size: 16px;
  margin-left: 10px;
  text-decoration: underline;
}
.text-center a:hover {
  color: #27C2DA; 
}

    </style>

</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-8 col-form-label text-md-right">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-8 col-form-label text-md-right">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-8 col-form-label text-md-right">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8 col-form-label text-md-right">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                          <div class="col-md-8 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Register
                              </button>
                          </div>

                            <div class="text center-end mt-4">
                        <p class="text-center ">
                         Already have an account? 
                         <a href="{{ route('login') }}">Login</a>
                         </p>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

