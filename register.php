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

// معالجة بيانات النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $birth_date = $_POST['birth_date'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // معالجة تحميل الملفات
    $id_card_front = addslashes(file_get_contents($_FILES['id_card_front']['tmp_name']));
    $id_card_back = addslashes(file_get_contents($_FILES['id_card_back']['tmp_name']));

    $sql = "INSERT INTO students (full_name, birth_date, email, password, id_card_front, id_card_back) 
            VALUES ('$full_name', '$birth_date', '$email', '$password', '$id_card_front', '$id_card_back')";

    if ($conn->query($sql) === TRUE) {
        echo "تم تسجيل الطالب بنجاح";
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
