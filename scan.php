<?php
session_start();
date_default_timezone_set('Asia/Bangkok');//ตั้งค่าเวลา Timezone ให้เป็นของไทย
require 'connect.php'; //เรียกใช้ข้อมูลการตั้งค่าฐานข้อมูล MySQL จาก connect.php 

// ฟังก์ชันสำหรับส่งข้อความไปยัง LINE
function notifyLine($message, $token) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "message=$message");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $headers = [
        "Content-type: application/x-www-form-urlencoded",
        "Authorization: Bearer $token",
    ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stu_code = $_POST['stu_code'];

    // คำสั่ง SQL สำหรับค้นหาข้อมูลนักเรียน
    $stmt = $pdo->prepare("SELECT * FROM students WHERE student_code = :stu_code");
    $stmt->execute(['stu_code' => $stu_code]);
    $student = $stmt->fetch();

    if ($student) { 
        $stu_name = $student['student_name']; // ดึงรายชื่อจากฐานข้อมูล
        $scan_time = date('Y-m-d H:i:s'); // เวลาที่สแกนบัตร

        // บันทึกเวลาที่สแกนบัตร
        $stmt = $pdo->prepare("INSERT INTO scan_logs (std_barcode, stu_name, scan_time) VALUES (:stu_code, :stu_name, :scan_time)");
        $stmt->execute(['stu_code' => $stu_code, 'stu_name' => $stu_name, 'scan_time' => $scan_time]);

        // ส่งแจ้งเตือนไปยัง LINE
        $message = "รหัสนักศึกษาเลขที่ : $stu_code \nชื่อ: $stu_name \nได้ทำการสแกนบัตรเข้าระบบเมื่อ: $scan_time"; //ข้อความที่แสดงในไลน์เมื่อแจ้งเตือน
        $lineToken = "Your Token"; //ใส่ Token Line Notify
        notifyLine($message, $lineToken);
        //catch
        $_SESSION['success'] = 'บันทึกเวลาสำเร็จ';
    } else {
        $_SESSION['error'] = 'ไม่พบข้อมูล';
    }

    header("Location: index.php");
    exit();
}
?>
