<?php
// Inisialisasi variabel
$username = $password = '';
$error = '';

// Cek apakah form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    // Validasi input
    if (empty($username) || empty($password)) {
        $error = 'Username dan password harus diisi!';
    } else {
        // Manual reverse string (tanpa strrev)
        $reversedUsername = '';
        for ($i = strlen($username) - 1; $i >= 0; $i--) {
            $reversedUsername .= $username[$i];
        }
        
        // Cek apakah password sama dengan username yang dibalik
        if ($password === $reversedUsername) {
            // Login berhasil
            $error = 'Login berhasil! Selamat datang, ' . htmlspecialchars($username);
        } else {
            // Login gagal
            $error = 'Login gagal! Password harus kebalikan dari username.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .error {
            color: #d9534f;
            text-align: center;
            margin: 10px 0;
        }
        .success {
            color: #5cb85c;
            text-align: center;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        
        <?php if (!empty($error)): ?>
            <div class="<?= strpos($error, 'berhasil') !== false ? 'success' : 'error' ?>">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        
        <form method="post" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit">Login</button>
        </form>
        
        <div style="margin-top: 15px; text-align: center; font-size: 12px; color: #777;">
            <p>Contoh: username = "kreators", password = "srotaerk"</p>
        </div>
    </div>
</body>
</html>