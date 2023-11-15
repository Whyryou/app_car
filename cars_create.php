<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>เพิ่มข้อมูลรถ</title>
    <link rel="stylesheet" type="text/css" href="css/styles_menubar.css">
</head>

<body>
    <div class="container">
      <div class="text-center my-5">
         <h3>เพิ่มข้อมูลรถ</h3>
         
      </div>

      <div class="container d-flex justify-content-center">
         <form action="cars_process.php" method="post" style="width:50vw; min-width:300px;" enctype="multipart/form-data" onsubmit="return checkEmpty()">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">ยี่ห้อรถ :</label>
                  <select name="brand" class="form-control" required>
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

               <div class="col">
                  <label class="form-label">รุ่นรถ :</label>
                  <input type="text" class="form-control" name="modelcar" placeholder="รุ่นรถ"  required>
               </div>

                
            </div>
             <div class="row mb-3">
                <div class="col">
                  <label class="form-label">ทะเบียนรถ :</label>
                  <input type="text" class="form-control" name="registercar" placeholder="ทะเบียนรถ"  required>
               </div>

               <div class="col">
                  <label class="form-label">ประเภทรถ :</label>
                   <select name="typecar" class="form-control" required>
                    <i class="bx bx-chevron-down icon"></i>
                    <option value="">ประเภทรถ</option>
                    <option value="รถเก๋ง">รถเก๋ง</option>
                    <option value="รถยนต์">รถยนต์</option>
                    <option value="รถตู้">รถตู้</option>
                    <option value="รถมอเตอร์ไซต์">รถมอเตอร์ไซต์</option>
                </select>
               </div>

            </div>

             <div class="row mb-3">
                <div class="col">
                  <label class="form-label">สีรถ :</label>
                  <input type="text" class="form-control" name="colorcar" placeholder="สีรถ"  required>
               </div>

                <div class="col">
                  <label class="form-label">ความจุ(คน) :</label>
                  <input type="text" class="form-control" name="capacity" placeholder="ความจุ"  required>
               </div>

                <div class="col">
                  <label class="form-label">ราคาเช่าต่อวัน(บาท) :</label>
                  <input type="text" class="form-control" name="price" placeholder="ราคาเช่าต่อวัน"  required>
               </div>


            </div>

            <div class="mb-3">
               <label class="form-label">รูปภาพ 1 :</label>
               <input type="file" class="form-control" name="image" placeholder="รูปภาพ" id="" required>

            </div>

             <div class="mb-3">
               <label class="form-label">รูปภาพ 2 :</label>
               <input type="file" class="form-control" name="image_1" placeholder="รูปภาพ" id="" required>

            </div>

             <div class="mb-3">
               <label class="form-label">รูปภาพ 2 :</label>
               <input type="file" class="form-control" name="image_2" placeholder="รูปภาพ" id="" required>

            </div>
            

            
            <div>
               <button type="submit" class="btn btn-success" name="create">บันทึก</button>
               <a href="cars.php" class="btn btn-danger">ยกเลิก</a>
            </div>
         </form>
      </div>
   </div>

</body>

</html>
