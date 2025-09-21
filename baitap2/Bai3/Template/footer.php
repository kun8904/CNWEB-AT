<?php
$rows = [
    ["blue", "red", "magenta"],
    ["yellow", "lime", "gray"],
    ["deepskyblue", "lightgray", "orangered"]
];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Footer.php</title>
    <style>
        .row { display:flex; }
        .cell { flex:1; height:50px; border:1px solid #fff; }
    </style>
</head>
<body>
    <div class="footer">
        <?php
        foreach ($rows as $row) {
            echo "<div class='row'>";
            foreach ($row as $color) {
                echo "<div class='cell' style='background:$color'></div>";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
