

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Index - Trang chính</title>
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
            text-align: center;
            margin-top: 20px;
        }
        table, th, td { border:1px solid black; border-collapse: collapse; padding:5px; }
        form { margin-top: 20px; }
    </style>
</head>
<body>
<div class="background">
    <!-- Header -->
    <div class="header">
        <div class="info">
            <h2>Bùi Ngọc Việt Hoàng<br>AT190523</h2>
            <img src="Bai3/Template/my.jpg" alt="ảnh cá nhân">
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
        <h2>Đăng ký</h2>
        <form method="post" action="Bai3/Yeucau/ResultRegister.php" onsubmit="return handleSubmit()">
            <table>
                <tr><td>Tên:</td><td><input type="text" name="username" id="username"></td></tr>
                <tr><td>Địa chỉ:</td><td><input type="text" name="address" id="address"></td></tr>
                <tr><td>Nghề:</td><td><input type="text" name="job" id="job"></td></tr>
                <tr><td>Ghi chú:</td><td><input type="text" name="note" id="note"></td></tr>
            </table>
            <br>
            <button type="reset">Xóa</button>
            <button type="submit">Đăng ký</button>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        <?php include "../Template/footer.php"; ?>
    </div>
</div>

<script>
function validateForm(){
    let user = document.getElementById("username").value.trim();
    let add  = document.getElementById("address").value.trim();
    let job  = document.getElementById("job").value.trim();

    if (user === "" || add === "" || job === "") {
        alert("Vui lòng nhập đầy đủ Tên, Địa chỉ, Nghề!");
        return false;
    }
    return true;
}

function handleSubmit(){
    if (validateForm()) {
        // Gửi dữ liệu bằng AJAX
        const formData = new FormData(document.querySelector('form'));
        
        fetch('Bai3/Yeucau/ResultRegister.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log('Dữ liệu đã được gửi:', data);
        })
        .catch(error => {
            console.error('Lỗi:', error);
        });
        
        alert("Đăng ký thành công");    
        return false; // Ngăn form submit, không chuyển trang
    }
    return false;
}
</script>
</body>
</html>