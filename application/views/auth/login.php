<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - PT MAJU JAYA</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css');?>" rel="stylesheet">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fc; }
        .login-card { 
            border-radius: 20px; 
            border: none; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.05); 
            padding: 40px;
        }
        .form-control-user { border-radius: 50px; padding: 25px 20px; }
        .btn-user { border-radius: 50px; padding: 12px; font-weight: 600; font-size: 1rem; }
    </style>
</head>

<body class="d-flex align-items-center min-vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="card login-card">
                    <div class="text-center mb-4">
                        <h2 class="font-weight-bold text-dark">PT MAJU JAYA</h2>
                        <p class="text-muted">Silakan login untuk melanjutkan</p>
                    </div>

                    <?= $this->session->flashdata('message'); ?>

                    <form class="user" method="post" action="<?= base_url('auth/proses'); ?>">
                        <div class="form-group mb-3">
                            <input type="text" name="username" class="form-control form-control-user" 
                                   placeholder="Username" required autofocus>
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" name="password" class="form-control form-control-user" 
                                   placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>