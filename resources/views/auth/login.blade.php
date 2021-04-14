
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Federal Polytechnic Ukana</title>
    <!-- Site Icons -->
    <link rel="shortcut icon" href="https://i2.wp.com/www.vanguardngr.com/wp-content/uploads/2020/12/Federal-Polytechnic-Ukana-School-Fees.jpeg?resize=1024%2C1024&ssl=1&mrf-size=m" type="image/x-icon" />
    <link rel="apple-touch-icon" href="https://i2.wp.com/www.vanguardngr.com/wp-content/uploads/2020/12/Federal-Polytechnic-Ukana-School-Fees.jpeg?resize=1024%2C1024&ssl=1&mrf-size=m">

  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/login.css')}}">
   {{-- <script src="{{ asset('js/app.js') }}" defer></script> 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="https://www.usiu.ac.ke/assets/image/apply/Step5AboutYou.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <a href="/" style="text-decoration: none">
                    <img style="width:50px;height:50px" class="rounded-circle"
                    src="https://i2.wp.com/www.vanguardngr.com/wp-content/uploads/2020/12/Federal-Polytechnic-Ukana-School-Fees.jpeg?resize=1024%2C1024&ssl=1&mrf-size=m"

                    />
                    <span class="text-secondary"><b> Fed Poly Uka</b></span></a>
              </div>
              <p class="login-card-description">Welcome Back!</p>
              <form action="/login" method="POST">
              @csrf
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password">
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                </form>
                <a href="/password/reset" class="forgot-password-link">Forgot password?</a>
                <br>
                  <a href="https://fedpolyukana.edu.ng/">Terms and Condition</a>
                  <br>
                  <a href="https://fedpolyukana.edu.ng/">Privacy policy</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
