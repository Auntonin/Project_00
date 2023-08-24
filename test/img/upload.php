<?php
if(isset($_POST["submit"])) {
    $targetDir = "uploads/"; // โฟลเดอร์เก็บรูปที่อัปโหลด
    $targetFile = $targetDir . basename($_FILES["image"]["name"]); // เส้นทางไปยังไฟล์ที่อัปโหลด
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // ตรวจสอบว่าไฟล์เป็นรูปภาพที่ถูกต้องหรือไม่
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check === false) {
        echo "ไฟล์ไม่ใช่รูปภาพ.";
        $uploadOk = 0;
    }

    // ตรวจสอบว่าไฟล์มีอยู่แล้วหรือไม่
    if(file_exists($targetFile)) {
        echo "ไฟล์มีอยู่แล้ว.";
        $uploadOk = 0;
    }

    // ตรวจสอบขนาดของไฟล์ (ปรับเปลี่ยนตามความเหมาะสม)
    if($_FILES["image"]["size"] > 500000) {
        echo "ไฟล์มีขนาดใหญ่เกินไป.";
        $uploadOk = 0;
    }

    // อนุญาตเฉพาะรูปแบบไฟล์ที่กำหนด (คุณสามารถเพิ่มรูปแบบเพิ่มเติมได้)
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "อนุญาตเฉพาะไฟล์รูปภาพ JPG, JPEG, PNG และ GIF เท่านั้น.";
        $uploadOk = 0;
    }

    // ตรวจสอบว่า $uploadOk ถูกตั้งค่าเป็น 0 จากข้อผิดพลาดหรือไม่
    if($uploadOk == 0) {
        echo "ขออภัย ไม่สามารถอัปโหลดไฟล์ของคุณได้.";
    } else {
        // ย้ายไฟล์ที่อัปโหลดไปยังโฟลเดอร์ปลายทาง
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "ไฟล์ ". basename($_FILES["image"]["name"]). " ถูกอัปโหลดแล้ว.";
        } else {
            echo "ขออภัย เกิดข้อผิดพลาดในการอัปโหลดไฟล์ของคุณ.";
        }
    }
}
?>
