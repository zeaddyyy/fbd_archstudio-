<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | FB Design Studio</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&family=Cormorant+Garamond:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f4f1ec;
            font-family: 'Outfit', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(0,0,0,0.02) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
        }

        .login-container {
            width: 100%;
            max-width: 500px;
            margin: 20px;
            position: relative;
            z-index: 1;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.72);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 30px;
            padding: 50px 45px;
            transition: all 0.5s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
        }

        .brand {
            text-align: center;
            margin-bottom: 45px;
        }

        .brand-icon {
            width: 90px;
            height: 90px;
            background: rgba(0, 0, 0, 0.04);
            border-radius: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
        }

        .brand-icon i {
            font-size: 48px;
            color: #1a1a1a;
        }

        .brand h1 {
            font-size: 48px;
            font-weight: 300;
            font-family: 'Cormorant Garamond', serif;
            color: #1a1a1a;
            margin-bottom: 10px;
        }

        .brand p {
            color: #777;
            font-size: 14px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .alert {
            padding: 16px 20px;
            border-radius: 20px;
            margin-bottom: 28px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 13px;
            animation: slideIn 0.4s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-error {
            background: rgba(217, 75, 75, 0.1);
            border-left: 3px solid #d94b4b;
            color: #8b3a3a;
        }

        .alert-success {
            background: rgba(100, 150, 100, 0.1);
            border-left: 3px solid #6b8c6b;
            color: #4a6b4a;
        }

        .form-group {
            margin-bottom: 28px;
        }

        .input-group {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-group i:first-child {
            position: absolute;
            left: 18px;
            color: #999;
            font-size: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 16px 18px 16px 52px;
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 20px;
            font-size: 15px;
            font-family: 'Outfit', sans-serif;
        }

        .input-group input:focus {
            outline: none;
            border-color: rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.9);
        }

        .password-toggle {
            position: absolute;
            right: 18px;
            cursor: pointer;
            color: #999;
            font-size: 20px;
        }

        .password-toggle:hover {
            color: #1a1a1a;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            font-size: 13px;
            color: #666;
        }

        .checkbox-label input {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #1a1a1a;
        }

        .forgot-link {
            color: #666;
            text-decoration: none;
            font-size: 13px;
            transition: color 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .forgot-link:hover {
            color: #1a1a1a;
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            padding: 16px;
            background: #111;
            color: white;
            border: none;
            border-radius: 100px;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.4s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .login-btn:hover {
            transform: translateY(-3px);
            background: #2a2a2a;
        }

        .login-footer {
            text-align: center;
            margin-top: 35px;
            padding-top: 30px;
            border-top: 1px solid rgba(0, 0, 0, 0.06);
        }

        .login-footer p {
            color: #888;
            font-size: 12px;
            letter-spacing: 0.1em;
        }

        @media (max-width: 550px) {
            .login-card {
                padding: 35px 25px;
            }
            .brand h1 {
                font-size: 38px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="brand">
                <div class="brand-icon">
                    <i class="ri-palette-line"></i>
                </div>
                <h1>FB Design Studio</h1>
                <p>Admin Portal</p>
            </div>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-error">
                    <i class="ri-alert-line"></i>
                    <span><?= session()->getFlashdata('error') ?></span>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <i class="ri-checkbox-circle-line"></i>
                    <span><?= session()->getFlashdata('success') ?></span>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('admin/auth') ?>">
                <?= csrf_field() ?>
                
                <div class="form-group">
                    <div class="input-group">
                        <i class="ri-user-line"></i>
                        <input type="text" name="username" placeholder="Username" required autocomplete="username" value="<?= old('username') ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <i class="ri-lock-line"></i>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <i class="ri-eye-line password-toggle" id="togglePassword"></i>
                    </div>
                </div>

                <div class="form-options">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember_me" value="1">
                        <span>Remember me</span>
                    </label>
                    
                    <!-- FORGOT PASSWORD LINK - ADDED HERE -->
                    <a href="<?= base_url('admin/forgot-password') ?>" class="forgot-link">
                        <i class="ri-question-line"></i>
                        Forgot Password?
                    </a>
                </div>

                <button type="submit" class="login-btn">
                    <i class="ri-login-circle-line"></i>
                    Sign In
                </button>
            </form>

            <div class="login-footer">
                <p><i class="ri-shield-check-line"></i> Secure Admin Access</p>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        
        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('ri-eye-line');
                this.classList.toggle('ri-eye-off-line');
            });
        }
        
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.4s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 400);
            });
        }, 5000);
    </script>
</body>
</html>