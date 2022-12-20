<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Register | Money Save</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
     <link rel="stylesheet" href="css/style.css" type="text/css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="row justify-content-center">
            <div class="col-lg-5">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session ('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="container">
                    <main class="form-register input">
                        <div class="card shadow p-5 bg-secondary bg-opacity-25">
                            <form action="{{ route('storeRegister')}}" method="POST">
                            @csrf
                                <h1 class="h3 mb-3 fw-normal"><i class="bi bi-cash-coin" style="color: #198754; font-size: 1.4rem;"></i> Register Money Save </h1>
                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session ('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control mt-2" id="name" placeholder="Your Name" autofocus>
                                    <label for="name">Name</label>
                                </div>
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control mt-2" id="email" placeholder="Your Email">
                                    <label for="email">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control mt-2" id="password" placeholder="Your Password">
                                    <label for="password">Password</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" name="confirm-password" class="form-control mt-2" id="password" placeholder="Confirm Your Password">
                                    <label for="password">Confirm Password</label>
                                </div>

                                <button class="w-100 btn btn-lg btn-success mt-4" type="submit">Register</button>
                                
                            </form>
                            <small class="d-block text-center mt-3 ">Sudah punya akun? <a href="/login">Login</a></small>
                        </div>
                    </main>
                    </div>
                </div>
            </div>
        </div>
     </div>
</body>
</html>