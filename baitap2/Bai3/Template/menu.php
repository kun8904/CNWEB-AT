<?php
$menu = [
    "Bài tập 3.1" => "#",
    "Tạo template" => "#",
    "4.1. Lấy và gửi dữ liệu" => "#",
    "4.2. Form tính toán" => "#",
    "4.3. Mảng" => "#"
];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Menu.php</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .menu {
            background: #333;
            display: flex;
            justify-content: space-around; /* 👈 trải đều các mục trên thanh */
            width: 100%;
        }
        .menu a {
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            display: block;
        }
        .menu a:hover {
            background: #666;
        }
        .menu a.active {
            background: #444;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="menu">
        <?php
        foreach ($menu as $label => $link) {
            echo "<a href='$link'>$label</a>";
        }
        ?>
    </div>
</body>
</html>
