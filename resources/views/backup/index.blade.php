<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>FPOP Record Management System</title>

  <link rel="stylesheet" href="assets/css/loading.css" />


  <!-- CSS -->
  @include('assets.css')
  <!--  END CSS -->


  <style>
        body {
            background-image: url('../assets/img/bg/bg-2.jpg');
            background-size: 100%;
            overflow: hidden;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .logo {
            display: flex;
            right: 0;
            left: 0;
            margin: auto;
        }

        .logo img {
            max-width: 300px;
        }
        .btn_1 {
            background-color: #2E4374;
            color:  white;
        }
       .btn_1:hover {
        background-color: #213555;
        }
        @keyframes typing {
        from { width: 0; }
        to { width: 100%; }
    }

    .typewriter {
        overflow: hidden;
        display: inline-block;
        animation: typing 2s steps(20, end) infinite;
    }
    </style>
    <link rel="preload" as="image" href="../assets/img/bg/bg-2.jpg">

</head>

<body>
    <div id="loading-overlay">
        <div class="loader"></div>
      </div>
    
    <div class="container mt-5 mb-5">
      <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5 col-xl-4">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header text-center bg-light">
                          <div class="logo">
                            <img src="assets/img/logo.png" alt="Logo" class="img-fluid">
                          </div>
                      </div>
                      <div class="modal-body">
                          @if (session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                          @endif

                          <x-auth-session-status class="mb-2" :status="session('status')" />

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                            
                            <div class="form-group">
                                <label for="login" :value="__('Email/Username/Phone')" class="small">{{ __('Email/Username/Phone') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input id="login" class="form-control" type="text" name="login" value="{{ old('login') }}" required autofocus autocomplete="username" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="password" :value="__('Password')" class="small">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </div>
                                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                            
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>
                            

                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                </label>
                            </div>


                            <!---
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div> --->

                            <div class="mt-3 text-center">
                                <button class="btn_1 btn-sm btn-block" type="submit">{{ __('Log in') }}</button>
                            </div>

                            
                            <p class="text-center mt-3">
                                @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                            </p>
                        </form>

                      </div>
                    </div>
                </div>
            </div>
      </div>
    </div>

    <!-- SCRIPT SECTIONS -->
        @include('assets.script')
    <!-- END SCRIPT SECTIONS -->
        <script src="assets/js/loading.js"></script>

</body>
</html>