<!DOCTYPE html>
<html>
<head>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-q5h5uSf/kwhmvOXspzYm98ccQHvz8WmXBlTUaEucOKoepb7vTH8Wp6xE7UBDwiyT6ZIv6A1U6e9iiafMrGQfCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style type="text/css">
        @import url("https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500");
        @import '~@fortawesome/fontawesome-free/css/all.css';
        @import '~@fortawesome/fontawesome-free/css/all.min.css';     
body {
  background-color: #DCDCDC	;
  overflow-x: hidden;
  font-family: "Roboto", sans-serif;
  font-size: 16px;
}
/* Toggle Styles */
#viewport {
  padding-left: 250px;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}
#content {
  width: 100%;
  position: relative;
  margin-right: 0;
}

/* Sidebar Styles */
#sidebar {
  z-index: 1000;
  position: fixed;
  left: 250px;
  width: 250px;
  height: 100%;
  margin-left: -250px;
  overflow-y: auto;
  background: white; 
}

#sidebar header {
  background-image: url('images/backgrounds/Bg2.jpg');
  background-size: cover;
  font-size: 20px;
  line-height: 150px;
  text-align: center;
}

#sidebar header a {
  display: block;
  background-image: url('images/backgrounds/logo1.png');
  background-position: center;
  background-repeat: no-repeat;
}

#sidebar nav ul li {
  display: inline-block;
  width: 100%;
  margin-bottom: 10px;
  padding-bottom: 10px;
}

#sidebar nav ul li:first-child {
  margin-top: 20px;
}

#sidebar nav ul li a {
  color: #000000; /* change this to your desired text color */
}

#sidebar nav ul li a:hover {
  font-weight: bold;
  color: #1486B0;
}
/* Dropdown button */
.btn:focus {
  box-shadow: none;
  outline: none;
}
#sidebar ul.sidebar li {
        padding: 1px;
    }
.dropdown-item {
  padding-top: 0px;
  padding-bottom: 10px;
}
.my-list li {
  padding: 1px 1px;
}
#sidebar nav ul li a:hover {
  font-weight: bold;
  color: #1486B0;
  text-decoration: none; /* Add this line */
}
/*navbar*/
.nav-item.dropdown .dropdown-menu {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 9999;
  min-width: 10rem;
  
  font-size: 1rem;
  color: #212529;
  text-align: left;
  list-style: none;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid rgba(0,0,0,.15);
  border-radius: 0.25rem;
  box-shadow: 0 0.5rem 1rem rgba(0,0,0,.175);
}
.nav-item.dropdown .dropdown-menu {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 9999;
  min-width: 10rem;
  font-size: 1rem;
  color: #212529;
  text-align: left;
  list-style: none;
  background-color: #fff;
  background-clip: padding-box;
  border-radius: 0.25rem;
  box-shadow: 0 0.5rem 1rem rgba(0,0,0,.175);
}
.nav-item.dropdown .dropdown-menu a:hover {
  background-color: #f8f9fa;
}
.nav-item.dropdown:hover .dropdown-menu {
  display: block;
}

/* FOOTER */
footer {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 14.7%;
  height: 50px;
  background-image: url('images/backgrounds/Bg2.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  
}

/* NAV BAR */
/* public/css/custom.css */

.navbar-nav .nav-link {
    color: #ffffff; /* change this to the color you want */
}

.navbar-nav .nav-link:hover {
    color: #aaaaaa; /* change this to the color you want */
}
.navbar-nav {
    margin-left: auto;
}

</style>

<!-- Sidebar -->
<div id="viewport">
  <div id="sidebar">
    <header>
    <img src="images/backgrounds/logo1.png" alt="Logo" width="90" height="90">
    </header>
    <nav>
    <ul class="sidebar">
    <li><a href="{{ route('dashboard') }}" type="button" class="btn btn-link"><i class="fas fa-tachometer-alt" style="margin-right: 8px;"></i>Dashboard</a></li>
    <li><a class="btn btn-link" href="{{ route('account.index') }}"><i class="fas fa-list-alt mr-1"></i> Chart of Accounts</a></li>
    <li><a class="btn btn-link" href="{{ route('fund.index') }}"><i class="fas fa-money-bill-wave mr-1"></i> Funds</a></li>
    <li><a class="btn btn-link" href="{{ route('bank.index') }}"><i class="fas fa-university mr-1"></i> Bank</a></li>
    <li><a class="btn btn-link" href="{{ route('accform.index') }}"><i class="fas fa-folder mr-1"></i> Accountable Forms</a></li>
    <li>
    <a class="btn" data-bs-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">
  <i class="fas fa-exchange-alt mr-1"></i> Transaction<i class="fas fa-caret-down ml-1"></i>
  </a>
  <div class="collapse" id="collapse1">
    <ul>
    <li><a href="{{ route('collection.index') }}" type="button" class="btn btn-link"><i class="fas fa-folder mr-1"></i> Collection</a></li>
    <li><a href="{{ route('deposit.index') }}"type="button" class="btn btn-link"><i class="fas fa-money-check mr-1"></i> Deposit</a></li>
    <li><a href="{{ route('expense.index') }}"type="button" class="btn btn-link"><i class="fas fa-chart-pie mr-1"></i> Expense</a></li>
    <li><a href="{{ route('withdraw.index') }}" type="button" class="btn btn-link"><i class="fas fa-money-bill-alt"></i> Withdraw</a></li>
    </ul>
  </div>
  </li>
  <li><a class="btn btn-link" href="{{ route('reports.index') }}"><i class="fas fa-money-bill-wave mr-1"></i> Reports</a></li>
<li>
  <a class="btn btn-link" data-bs-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapse2">
  <i class="fas fa-cog"></i> Settings <i class="fas fa-caret-down ml-1"></i>
  </a>
    <div class="collapse" id="collapse2">
      <ul>
      <a href="{{ route('users.index') }}" class="btn">Manage Users</a>
      </ul>
    </div>
  </li>
</ul>

<footer>
</footer>
  </ul>
  </div>

 <!-- nav bar -->
 <ul class="navbar-nav">
  <nav class="navbar navbar-expand-lg" style="background-image: linear-gradient(to bottom,#0D98BA, #074C5D);">
  <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>

<li class="nav-item">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             {{ Auth::user()->name }}
              </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
              </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
               </form>
               </div>
              </div> </nav>
</div>

<main class="py-4">
      <div class="container">
        @yield('content')
      </div>
   </main>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>