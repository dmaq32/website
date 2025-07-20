<?php
if (isset($_POST['send'])) {
    $host = "localhost";  
    $user = "root";       
    $pass = "";     
    $db = "feedback_db"; 
    
    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Ошибка подключения: " . $conn->connect_error);
    }
    
    $name = $conn->real_escape_string($_POST['name']);    
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Сообщение успешно отправлено!";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close(); 
}
header("Location: feedback_final.html");
exit;
?>