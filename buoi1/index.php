<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buoi 1 PHP</title>
</head>
<body>
    <?php 
        //1. in ra màn hình
        echo "Hello World! <br>";
        echo "Hi ";
    
        //2. Biến
        //Cú pháp: $ + tên biến = giá trị của biến
        $ten = "The Huy";
        $tuoi = 20;

        echo $ten . " " . $tuoi . " tuổi <br>";

        //3. Hằng
        define("soPi", "3.14 <br>");
        echo soPi;

        //4. Phân biệt ' ' và " "
        echo '$ten' . "<br>";
        echo "$ten" . "<br>";
        
        //5. Chuỗi
        #5.1 Kiểm tra độ dài của chuỗi
        echo strlen($ten) . "<br>";
        #5.2 Đếm số từ
        echo str_word_count($ten) . "<br>";
        #5.3 Tìm kiếm kí tự trong chuỗi
        echo strpos ($ten, "H") . "<br>";
        #5.4 Thay thế kí tự trong chuỗi
        echo str_replace("Huy", "Hung", $ten) . "<br>";

        //Toán tử
        $soThuNhat = 10;
        $soThuHai = 5;
        #Phép + - * /
        # += -= *= /= %=
        //echo $soThuNhat %= $soThuHai . "<br>";
        #So sánh == != > < >= <= ===
        echo $soThuNhat < $soThuHai . "<br>";

        //7. Câu điều kiện
        $tong = $soThuNhat + $soThuHai;
        if($tong < 15){
            echo "Nhỏ hơn 15";
        }elseif($tong == 15){
            echo "Bằng 15";
        }else{
            echo "Lớn hơn 15";
        }

        //8. Switch case
        $color = "red";
        switch($color){
            case "red":
                echo "is red";
                break;
            case "blue":
                echo "is blue";
                break;
            default:
                echo "no color";
                break;
        }

        //9. for
        for($i=0; $i<100; $i++){
            echo $i . " ";
        }
        echo "<br>";
        //10. Mảng
        $mang = ["Huy", "Kien", "Loc"];

        //11. Đếm phần tử 
        echo count($mang) . "<br>";
        echo $mang[1];
        print_r($mang);
        $mang[0] = "Khoi";
        print_r($mang);
        $mang[] = "Huy";
        print_r($mang);
        #Xóa
        unset($mang[3]);
        print_r($mang);

        



    ?>
</body>
</html>