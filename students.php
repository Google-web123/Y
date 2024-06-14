<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "university_management";

// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

$sql = "SELECT id, full_name, birth_date, email FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>الاسم الكامل</th><th>تاريخ الازدياد</th><th>البريد الإلكتروني</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["full_name"]. "</td><td>" . $row["birth_date"]. "</td><td>" . $row["email"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "لا يوجد طلاب مسجلين";
}

$conn->close();
?>
