<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - SIMDIK IMPORTER</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body{
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #0f172a, #1e293b, #334155);
            position: relative;
        }

        /* Background Glow */

        .bg-glow1{
            position: absolute;
            width: 350px;
            height: 350px;
            background: #3b82f6;
            border-radius: 50%;
            filter: blur(120px);
            top: -100px;
            left: -100px;
            opacity: 0.5;
        }

        .bg-glow2{
            position: absolute;
            width: 350px;
            height: 350px;
            background: #8b5cf6;
            border-radius: 50%;
            filter: blur(120px);
            bottom: -100px;
            right: -100px;
            opacity: 0.5;
        }

        .login-container{
            width: 100%;
            max-width: 430px;
            padding: 20px;
            position: relative;
            z-index: 10;
        }

        .login-card{
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.1);
            backdrop-filter: blur(18px);
            border-radius: 30px;
            padding: 45px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.35);
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn{
            from{
                opacity: 0;
                transform: translateY(30px);
            }

            to{
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo{
            width: 95px;
            height: 95px;
            margin: auto;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 38px;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(59,130,246,0.5);
        }

        .title{
            text-align: center;
            color: white;
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .subtitle{
            text-align: center;
            color: #cbd5e1;
            font-size: 14px;
            margin-bottom: 35px;
        }

        .form-label{
            color: white;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .input-group{
            margin-bottom: 20px;
        }

        .input-group-text{
            background: rgba(255,255,255,0.15);
            border: none;
            color: white;
            border-radius: 14px 0 0 14px;
        }

        .form-control{
            height: 52px;
            border: none;
            background: rgba(255,255,255,0.15);
            color: white;
            border-radius: 0 14px 14px 0;
        }

        .form-control:focus{
            box-shadow: none;
            background: rgba(255,255,255,0.20);
            color: white;
        }

        .form-control::placeholder{
            color: #cbd5e1;
        }

        .btn-login{
            width: 100%;
            height: 52px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white;
            font-size: 16px;
            font-weight: 600;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-login:hover{
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(59,130,246,0.5);
        }

        .footer{
            text-align: center;
            color: #cbd5e1;
            margin-top: 25px;
            font-size: 13px;
        }

    </style>

</head>
<body>

    <!-- Glow Background -->
    <div class="bg-glow1"></div>
    <div class="bg-glow2"></div>

    <div class="login-container">

        <div class="login-card">

            <div class="logo">
                <i class="bi bi-mortarboard-fill"></i>
            </div>

            <div class="title">
                SIMDIK IMPORTER
            </div>

            <div class="subtitle">
                Sistem Import Data Siswa SMK Makarya 1
            </div>

            <form action="proses_login.php" method="POST">

                <label class="form-label">
                    Username
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-person-fill"></i>
                    </span>

                    <input type="text"
                           name="username"
                           class="form-control"
                           placeholder="Masukkan username"
                           required>

                </div>

                <label class="form-label">
                    Password
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-lock-fill"></i>
                    </span>

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Masukkan password"
                           required>

                </div>

                <button type="submit" class="btn-login">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Login Sekarang
                </button>

            </form>

            <div class="footer">
                © 2026 SIMDIK IMPORTER | SMK Makarya 1
            </div>

        </div>

    </div>

</body>
</html>