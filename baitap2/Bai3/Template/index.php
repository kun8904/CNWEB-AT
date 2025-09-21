<?php
$page = $_GET['page'] ?? '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['page'])) {
    $page = $_GET['page'];   // giữ nguyên page khi submit form POST
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Index - Trang chính</title>
    <link rel="stylesheet" href="main.css">
    <style>
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
            text-align: center;
            margin-top: 20px;
        }
        .sidebar {
            width: 220px;
            height: 100vh;
            background: #2c3e50;
            color: white;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            overflow: auto;
        }
        .sidebar h2 {
            margin: 0 0 20px;
            font-size: 20px;
            text-align: center;
        }
        .sidebar a {
            display: block;
            padding: 10px 15px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 8px;
            transition: background 0.2s, padding-left 0.2s;
        }
        .sidebar a:hover {
            background: #34495e;
            padding-left: 20px;
        }
        #none {
            margin-left: 260px;
            margin-top: 20px;
            margin-right: 20px;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            min-height: calc(100vh - 40px);
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="background">
        <!-- Header -->
        <div class="header">
            <div class="info">
                <h2>
                    Bùi Ngọc Việt Hoàng<br>
                    AT190523
                </h2>
                <img src="Bai3/Template/my.jpg" alt="ảnh cá nhân">
            </div>
            <div class="avatar">
                <img src="Bai3/Template/ho_chi_minh_1.jpg" alt="Hình ảnh Hồ Chí Minh">
            </div>
        </div>

        <!-- Menu -->
        <div>
            <?php include "menu.php"; ?>
        </div>
        
        <div class="menu">
            <a href="#" onclick="switchPage('home')">Home</a>
            <a href="#" onclick="switchPage('drawTable')">DrawTable</a>
            <a href="#" onclick="switchPage('Register')">Register</a>
            <a href="#" onclick="switchPage('ResultRegister')">ResultRegister</a>
            <a href="#" onclick="switchPage('calculate2')">Calculate2</a>
            <a href="#" onclick="switchPage('array1')">Array1</a>
            <a href="#" onclick="switchPage('uploadform')">UploadForm</a>
            <a href="#" onclick="switchPage('array3')">Array3</a>
        </div>

        <!-- Nội dung -->
        <div class="content" id="mainContent">
        <?php
            $page = $_GET['page'] ?? 'index';
            switch ($page) {
                case 'drawTable':
                    include 'pages/drawTable.php';
                    break;
                case 'Register':
                    include '../Yeucau/Register.php';
                    break;
                case 'ResultRegister':
                    include '../Yeucau/ResultRegister.php';
                    break;
                case 'calculate2':
                    include 'pages/calculate2.php';
                    break;
                case 'array1':
                    include 'pages/array1.php';
                    break;
                case 'uploadform':
                    include 'pages/uploadform.php';
                    break;
                case 'uploadprocess':
                    include 'pages/uploadprocess.php';
                    break;
                case 'home':
                default:
                    include 'pages/home.php';
                    break;
            }
        ?>
        </div>

        <!-- Footer -->
        <div class="footer">
            <?php include "footer.php"; ?>
        </div>
    </div>

  </script>
    <script>
        function switchPage(pageName) {
            const contentDiv = document.querySelector('.content');
            if (!contentDiv) return;
            
            const url = `Bai3/Template/index.php?page=${pageName}`;
            
        fetch(url)
        .then(response => response.text())
            .then(data => {
                contentDiv.innerHTML = data;
            })
            .catch(error => {
                console.error('Lỗi khi tải trang:', error);
                contentDiv.innerHTML = '<p style="color:red">Không thể tải nội dung trang.</p>';
            });
        }
    </script>
</body>
</html>
