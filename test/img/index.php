<!DOCTYPE html>
<html>
<head>
    <title>แบบฟอร์มอัปโหลดรูปภาพ</title>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="image">เลือกรูปภาพ:</label>
        <input type="file" name="image" id="image">
        <input type="submit" value="อัปโหลดรูปภาพ" name="submit">
    </form>
</body>
</html>
