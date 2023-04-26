<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style type="text/css">

$font-primary: 'Poppins',Arial, sans-serif;
$primary: #2f89fc;

body{
	font-family: $font-primary;
	font-size: 14px;
	line-height: 1.8;
	font-weight: normal;
	background: #fff;
	color: lighten($black,50%);
}
a {
	transition: .3s all ease;
	color: $primary;
	&:hover, &:focus {
		text-decoration: none !important;
		outline: none !important;
		box-shadow: none;
	}
}
button {
	transition: .3s all ease;
	&:hover, &:focus {
		text-decoration: none !important;
		outline: none !important;
		box-shadow: none !important;
	}
}
h1, h2, h3, h4, h5,
.h1, .h2, .h3, .h4, .h5 {
	line-height: 1.5;
	font-weight: 400;
	font-family: $font-primary;
	color: $black;
}


//COVER BG
.img{
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center center;
}



//SIDEBAR
.wrapper {
  width: 100%;
}

#sidebar {
  min-width: 300px;
  max-width: 300px;
  background: #32373d;
  color: #fff;
  transition: all 0.3s;
  position: relative;
  .h6{
  	color: $white;
  }
  &.active{
  	margin-left: -300px;
  	.custom-menu{
			margin-right: -50px;
	  }
	  .btn{
			&.btn-primary{
				&:before{
					content: "\f053";
				  font-family: "FontAwesome";
				  right: 2px !important;
				}
				&:after{
					display: none;
				}
			}
		}
  }
  h1{
  	margin-bottom: 20px;
  	font-weight: 700;
  	font-size: 20px;
  	.logo{
  		color: $white;
  		display: block;
  		padding: 10px 30px;
  		background: $primary;
  	}
  }
  ul.components{
  	padding: 0;
  }
  ul{
    li{
    	font-size: 16px;
    	>ul{
    		margin-left: 10px;
    		li{
    			font-size: 14px;
    		}
    	}
    	a{
    		padding: 15px 30px;
		    display: block;
		    color: rgba(255,255,255,.6);
		    border-bottom: 1px solid rgba(255,255,255,.05);
		    span{
		    	&.notif{
		    		position: relative;
		    		small{
		    			position: absolute;
		    			top: -3px;
		    			bottom: 0;
		    			right: -3px;
		    			width: 12px;
		    			height: 12px;
		    			content: '';
		    			background: red;
		    			border-radius: 50%;
		    			font-family: $font-primary;
		    			font-size: 8px;
		    		}
		    	}
		    }
		    &:hover{
		    	color: $white;
		    	background: $primary;
		    	border-bottom: 1px solid $primary;
		    }
    	}
    	&.active{
    		> a{
    			background: transparent;
    			color: $white;
    			&:hover{
    				background: $primary;
			    	border-bottom: 1px solid $primary;
    			}
    		}
    	}
    }
  }
   

  .custom-menu{
		display: inline-block;
		position: absolute;
		top: 20px;
		right: 0;
		margin-right: -35px;
	 transition(.3s);
		.btn{
			&.btn-primary{
				background: $primary;
				border-color: transparent;
				position: relative;
				color: $black;
				width: 30px;
				height: 30px;
				&:after,&:before{
					position: absolute;
					top: 2px;
					left: 0;
					right: 0;
					bottom: 0;
					font-family: "FontAwesome";
					color: $white;
				}
				&:after{
					content: "\f054";
					left: 2px;
				}
			}
		}
  }
}


.bg-wrap{
	width: 100%;
	position: relative;
	z-index: 0;
	&:after{
		z-index: -1;
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		content: '';
		background: $black;
		opacity: .3;
	}	
	.user-logo{
		.img{
			width: 100px;
			height: 100px;
			border-radius: 50%;
			margin: 0 auto;
			margin-bottom: 10px;
		}
		h3{
			color: $white;
			font-size: 18px;
		}
	}
}



a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
  display: block;
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
}

#sidebarCollapse{
	span{
	
	    display: none;
		}
	}

#content {
  width: 100%;
  padding: 0;
  min-height: 100vh;
  transition: all 0.3s;
}


.btn{
	&.btn-primary{
		background: $primary;
		border-color: $primary;
		&:hover, &:focus{
			background: $primary !important;
			border-color: $primary !important;
		}
	}
}

.footer{
	p{
		color: rgba(255,255,255,.5);
	}
}



.form-control {
	height: 40px!important;
	background: $white;
	color: $black;
	font-size: 13px;
	border-radius: 4px;
	box-shadow: none !important;
	border: transparent;
	&:focus, &:active {
		border-color: $black;
	}
	&::-webkit-input-placeholder { /* Chrome/Opera/Safari */
	  color: rgba(255,255,255,.5);
	}
	&::-moz-placeholder { /* Firefox 19+ */
	  color: rgba(255,255,255,.5);
	}
	&:-ms-input-placeholder { /* IE 10+ */
	  color: rgba(255,255,255,.5);
	}
	&:-moz-placeholder { /* Firefox 18- */
	  color: rgba(255,255,255,.5);
	}
}


.subscribe-form{
	.form-control{
		background: lighten($primary,5%);
	}
}
    </style>
</head>
<body>


    
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
   
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                @endguest
            </ul>
  
        </div>
    </div>
</nav>
  
@yield('content')
     
</body>
</html>