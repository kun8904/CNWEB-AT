
<style>
    body {
        margin-left: 350px;
        margin-right: 200px;
    }
    .draw-table-container {
        padding: 20px;
        background: #f9f9f9;
        border-radius: 8px;
        margin: 20px 0;
    }
    
    .form-table {
        border-collapse: collapse;
        margin: 15px 0;
    }
    
    .form-table td {
        padding: 8px 12px;
        border: 1px solid #ddd;
    }
    
    .form-table td:first-child {
        background: #e9ecef;
        font-weight: bold;
        width: 120px;
    }
    
    .form-table input[type="number"] {
        width: 80px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    
    .btn {
        padding: 8px 16px;
        margin: 5px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }
    
    .btn-primary {
        background: #007bff;
        color: white;
    }
    
    .btn-primary:hover {
        background: #0056b3;
    }
    
    .btn-secondary {
        background: #6c757d;
        color: white;
    }
    
    .btn-secondary:hover {
        background: #545b62;
    }
    
    #tableResult {
        margin-top: 20px;
        padding: 15px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .result-table {
        border-collapse: collapse;
        margin: 10px 0;
    }
    
    .result-table td {
        border: 1px solid #333;
        padding: 10px;
        text-align: center;
        min-width: 40px;
        min-height: 40px;
    }
    
    .result-table td:not(:empty) {
        background: #e3f2fd;
        font-weight: bold;
    }
            .header {
            display: flex;
            align-items: center;       /* căn giữa theo chiều dọc */
            justify-content: space-between; /* chữ/avatar bên trái, ảnh nền bên phải */
            gap: 20px; 
            padding: 10px;
        }

        .info {
            display: flex;
            flex-direction: column;
            align-items: center;       /* căn giữa chữ + ảnh cá nhân */
        }

        .info h2 {
            margin: 0 0 10px 0;        /* bỏ khoảng trắng dư */
            text-align: center;
        }

        /* Ảnh cá nhân */
        .info img {
            width: 100px;              /* chỉnh kích thước avatar */
            height: 100px;
            border-radius: 50%;        /* bo tròn avatar */
            object-fit: cover;         /* không méo ảnh */
            
        }

        /* Ảnh nền Hồ Chí Minh */
        .avatar img {
            max-height: 150px;         /* chỉnh chiều cao tối đa */
            width: auto;
            display: block;
        }
        .background {
            margin-left: auto;
            margin-right: auto;
        }
        .header {
            display: flex;
            align-items: center;       /* căn giữa theo chiều dọc */
            justify-content: space-between; /* chữ/avatar bên trái, ảnh nền bên phải */
            gap: 20px; 
            padding: 10px;
        }
</style>
<div class="draw-table-container">
    <h3>Trang DrawTable</h3>
    <p><em>Mỗi page được chạy trên nền trang index.php</em></p>
    
    <form id="drawTableForm">
        <table class="form-table">
            <tr>
                <td>Số dòng:</td>
                <td><input type="number" name="row" id="row" min="1" max="20" placeholder="Nhập số dòng"></td>
            </tr>
            <tr>
                <td>Số cột:</td>
                <td><input type="number" name="column" id="column" min="1" max="20" placeholder="Nhập số cột"></td>
            </tr>
        </table>
        
        <div style="margin-top: 15px;">
            <button type="reset" class="btn btn-secondary">Nhập lại</button>
            <button type="button" onclick="drawTable()" class="btn btn-primary">
                Vẽ bảng (Click để hiển thị bảng ở dưới)
            </button>
        </div>
    </form>
    
    <div id="tableResult" style="display: none;">
        <h4>Kết quả:</h4>
        <div id="tableContent"></div>
    </div>
</div>

<script>
function drawTable() {
    const rowInput = document.getElementById('row');
    const colInput = document.getElementById('column');
    const resultDiv = document.getElementById('tableResult');
    const tableContentDiv = document.getElementById('tableContent');

    const rows = parseInt(rowInput.value);
    const cols = parseInt(colInput.value);

    if (isNaN(rows) || isNaN(cols) || rows <= 0 || cols <= 0) {
        alert('Vui lòng nhập số dòng và số cột hợp lệ (từ 1 đến 20)');
        return;
    }

    if (rows > 20 || cols > 20) {
        alert('Số dòng và số cột không được vượt quá 20');
        return;
    }

    let tableHTML = "<table class='result-table'>";
    for (let i = 1; i <= rows; i++) {
        tableHTML += "<tr>";
        for (let j = 1; j <= cols; j++) {
            tableHTML += (j <= i) ? `<td>${j}</td>` : "<td></td>";
        }
        tableHTML += "</tr>";
    }
    tableHTML += "</table>";

    tableContentDiv.innerHTML = tableHTML;
    resultDiv.style.display = 'block';
    resultDiv.scrollIntoView({ behavior: 'smooth' });
}
</script>
