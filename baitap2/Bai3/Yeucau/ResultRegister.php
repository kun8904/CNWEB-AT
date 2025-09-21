<?php
session_start();


// xử lý khi submit form
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'] ?? '';
    $address  = $_POST['address'] ?? '';
    $job      = $_POST['job'] ?? '';
    $note     = $_POST['note'] ?? '';

    if (!empty($username)) {
        // Thêm user mới vào mảng users
        $msg = "Đăng ký thành công cho user: $username";
    } else {
        $msg = "Vui lòng nhập tên!";
    }
}

/* Khởi tạo và “nắn” lại session nếu lỡ sai shape từ lần trước */
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
} else {
    if (!is_array($_SESSION['users'])) {
        $_SESSION['users'] = [];
    } else {
        $first = reset($_SESSION['users']);
        if ($first !== false && !is_array($first)) {
            $_SESSION['users'] = [];
        }
    }
}

/* Nhận dữ liệu từ Register.php (POST) và thêm vào danh sách */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $address  = $_POST['address'] ?? '';
    $job      = $_POST['job'] ?? '';
    $note     = $_POST['note'] ?? '';

    if ($username !== '') {
        $_SESSION['users'][] = [
            'username' => $username,
            'address'  => $address,
            'job'      => $job,
            'note'     => $note
        ];
        $msg = "✅ Đăng ký thành công cho user: " . htmlspecialchars($username);
    } else {
        $msg = "❌ Vui lòng nhập tên!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả đăng ký</title>
    <link rel="stylesheet" href="main.css">
    <style>
        .background {
            margin-left: auto;
            margin-right: auto;
        }
        body {
            margin-left: 350px;
            margin-right: 200px;
        }
        .background {
            margin-left: auto;
            margin-right: auto;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px; 
            padding: 10px;
        }
        .info {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .info h2 {
            margin: 0 0 10px 0;
            text-align: center;
        }
        .info img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }
        .avatar img {
            max-height: 150px;
            width: auto;
            display: block;
        }
        .footer { 
            text-align:center; margin-top:20px; 
        }
        table { 
            border-collapse:collapse; margin-top:15px; width:100%; 
        }
        th, td { 
            border:1px solid #000; padding:6px 10px; text-align:left; 
        }
        th { 
            background:#eee; 
        }
        .msg { 
            margin:10px 0; 
        }
    </style>
</head>
<body>
<div class="background">

    <!-- Header -->
    <div class="header">
        <div class="info">
            <h2>Bùi Ngọc Việt Hoàng<br>AT190523</h2>
            <img src="Bai3/Template/my.jpg" alt="Ảnh cá nhân">
        </div>
        <div class="avatar">
            <img src="Bai3/Template/ho_chi_minh_1.jpg" alt="Hình ảnh Hồ Chí Minh">
        </div>
    </div>

    <!-- Menu -->
    <div>
        <?php include "../Template/menu.php"; ?>
    </div>

    <!-- Nội dung -->
    <div>
        <h2>Kết quả đăng ký</h2>
        <?php if (!empty($msg)) echo "<p class='msg'>$msg</p>"; ?>

        <?php if (!empty($_SESSION['users'])): ?>
            <h3>Danh sách người dùng đã đăng ký:</h3>
            <table>
                <tr>
                    <th>STT</th><th>Tên</th><th>Địa chỉ</th><th>Nghề</th><th>Ghi chú</th>
                </tr>
                <?php $i=1; foreach ($_SESSION['users'] as $u): ?>
                    <?php if (!is_array($u)) continue; ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= htmlspecialchars($u['username'] ?? '') ?></td>
                        <td><?= htmlspecialchars($u['address']  ?? '') ?></td>
                        <td><?= htmlspecialchars($u['job']      ?? '') ?></td>
                        <td><?= htmlspecialchars($u['note']     ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Chưa có ai đăng ký.</p>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <div class="footer">
        <?php include "../Template/footer.php"; ?>
    </div>
</div>
</body>
</html>
