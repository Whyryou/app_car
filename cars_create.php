<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>เพิ่มข้อมูลรถ</title>

    <link rel="stylesheet" type="text/css" href="css/style_menuber.css">

</head>
<body>
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <h1>เพิ่มข้อมูลรถ</h1>
            <div>
            <a href="cars.php" class="btn btn-primary">กลับ</a>
            </div>
        </header>

       
        <form action="cars_process.php" method="post" enctype="multipart/form-data" onsubmit="return checkEmpty()">

        <div class="form-elemnt my-4">
                <select name="brand" class="form-control">
                <i class="bx bx-chevron-down icon"></i>
                    <option value="">กรุณาเลือกยี่ห้อรถ</option>
                    <option value="Honda">Honda</option>
                    <option value="Isuzu">Isuzu</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Suzuki">Suzuki</option>
                    <option value="Mitsubishi">Mitsubishi</option>
                    <option value="Nissan">Nissan</option>
                    <option value="Mazda">Mazda</option>
                    <option value="Ford">Ford</option>
                </select>
               

            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="modelcar" placeholder="รุ่นรถ">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="registercar" placeholder="ทะเบียนรถ">
            </div>
            <div class="form-elemnt my-4">
                <select name="typecar" class="form-control">
                <i class="bx bx-chevron-down icon"></i>
                    <option value="">ประเภทรถ</option>
                    <option value="รถเก๋ง">รถเก๋ง</option>
                    <option value="รถยนต์">รถยนต์</option>
                    <option value="รถตู้">รถตู้</option>
                    <option value="รถมอเตอร์ไซต์">รถมอเตอร์ไซต์</option>                
                </select>
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="colorcar" placeholder="สีรถ">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="capacity" placeholder="ความจุ(คน)">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="price" placeholder="ราคาเช่าต่อวัน(บาท)">
            </div>
                        
            <div class="form-elemnt my-4">
                <input type="file" class="form-control" name="image" placeholder="รูปภาพ" id="">
            </div>

            <div class="form-element my-4">
                <input type="submit" name="create" value="บันทึก" class="btn btn-primary">
            </div>
           
        </form>
       
        
    </div>
    <script>
        function checkEmpty() {
            var brand = document.getElementsByName('brand')[0].value;
            var modelcar = document.getElementsByName('modelcar')[0].value;
            var registercar = document.getElementsByName('registercar')[0].value;
            var typecar = document.getElementsByName('typecar')[0].value;
            var colorcar = document.getElementsByName('colorcar')[0].value;
            var capacity = document.getElementsByName('capacity')[0].value;
            var price = document.getElementsByName('price')[0].value;
            var image = document.getElementsByName('image')[0].value;

            if (brand === "" || modelcar === "" || registercar === "" || typecar === "" || colorcar === "" || capacity === "" || price === "" || image === "") {
                alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>