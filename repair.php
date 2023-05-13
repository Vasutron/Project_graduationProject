<?php
session_start(); // start session
if(isset($_SESSION['UserID'])){
}
if(!isset($_SESSION['Name'])){
    $_SESSION['Name'] = ""; // กำหนดค่าเริ่มต้น
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Repair Process & Warranty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
    /* Custom styles for this page */
    .form-container {
        width: 85%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    </style>
</head>
<body>
    <?php
    include 'manu_header.php'
    ?>

    <div class="container">
        <h1>Repair Process & Warranty</h1>
        <div class="row">
            <div class="col-md-5">
                <h2>ขั้นตอนการซ่อม และการรับประกัน </h2>
                <p>ที่ศูนย์ซ่อมของเรา เราเข้าใจดีว่าอุปกรณ์ของคุณมีความสำคัญต่อคุณ และคุณต้องการให้ซ่อมอย่างรวดเร็วและมีประสิทธิภาพมากที่สุด นั่นเป็นเหตุผลที่เรามีทีมช่างซ่อมโดยเฉพาะที่ได้รับการฝึกอบรมเพื่อแก้ไขปัญหาอุปกรณ์และปัญหาต่างๆ มากมาย</p>
                <p>เมื่อเราได้รับอุปกรณ์ของคุณ ทีมงานของเราจะตรวจสอบและวินิจฉัยปัญหา จากนั้นเราจะให้ค่าซ่อมโดยประมาณโดยละเอียดและวันที่แล้วเสร็จโดยประมาณแก่คุณ เมื่อคุณอนุมัติการประมาณการแล้ว ทีมงานของเราจะเริ่มกระบวนการซ่อมแซม</p>
                <p>เราใช้เฉพาะชิ้นส่วนคุณภาพสูงและการซ่อมของเรามาพร้อมกับการรับประกัน 90 วัน หากคุณมีปัญหาใดๆ กับอุปกรณ์ของคุณภายในเวลาดังกล่าว โปรดติดต่อเรา เรายินดีให้ความช่วยเหลือ</p>
                <p>นอกจากนี้ เราเข้าใจว่าการซ่อมแซมบางอย่างอาจต้องเปลี่ยนชิ้นส่วนที่สำคัญ เช่น แบตเตอรี่ของนาฬิกาหรือสายนาฬิกา เรายินดีประเมินราคาอะไหล่และอะไหล่ทดแทนให้คุณ</p>
                <p>เรามีความภูมิใจในการให้บริการที่รวดเร็วและมีประสิทธิภาพ และรับประกันว่าอุปกรณ์ของคุณได้รับการซ่อมแซมด้วยมาตรฐานสูงสุด ทีมช่างเทคนิคของเรามีความเชี่ยวชาญสูง และเรามั่นใจว่าเราสามารถซ่อมแซมอุปกรณ์ของคุณได้อย่างรวดเร็วและตามความพอใจของคุณ</p>
                <p>ในกรณีที่คุณไม่พึงพอใจกับการซ่อมแซม เรายินดีที่จะทำงานร่วมกับคุณเพื่อแก้ไขปัญหาใดๆ และทำให้แน่ใจว่าคุณพึงพอใจกับผลลัพธ์ที่ได้</p>
                <p>เราหวังว่าจะมีโอกาสให้บริการคุณและความต้องการในการซ่อมอุปกรณ์ของคุณ โปรดอย่าลังเลที่จะติดต่อเราหากคุณมีคำถามหรือข้อกังวลใดๆ</p>
            </div>
            <div class="col-md-5">
                <img src="https://images.unsplash.com/photo-1609097828576-3b620e86039e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Repair Center" class="img-fluid">
            </div>
        </div>
    </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
