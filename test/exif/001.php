<?php

// ที่อยู่ของไฟล์รูปภาพ
$imagePath = '20230817_122647.jpg';

// อ่านข้อมูล EXIF ด้วยฟังก์ชัน exif_read_data
$exif = exif_read_data($imagePath);

// ตรวจสอบว่ามีข้อมูล GPS หรือไม่
if (isset($exif['GPSLatitude']) && isset($exif['GPSLongitude'])) {
    $latitude = $exif['GPSLatitude'];
    $longitude = $exif['GPSLongitude'];

    // แปลงรูปแบบของ latitude และ longitude
    $latitude = convertToDecimal($latitude);
    $longitude = convertToDecimal($longitude);

    // แสดงผลพิกัด
    echo "ละติจูด: $latitude<br>";
    echo "ลองจิจูด: $longitude<br>";
} else {
    echo "ไม่พบข้อมูลพิกัด GPS ในเมตาดาต้าของรูปภาพ.";
}

// ฟังก์ชันสำหรับแปลงพิกัด GPS เป็นรูปแบบทศนิยม
function convertToDecimal($coordinates) {
    return $coordinates[0] + $coordinates[1] / 60 + $coordinates[2] / 3600;
}
