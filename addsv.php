<?php
include('connect.php');
if(!empty($_POST['submit'])){
	if(isset($_POST['hoten'])&&isset($_POST['masv'])&&isset($_POST['diem'])){
		$hoten = $_POST['hoten'];
		$masv = $_POST['masv'];
		$diem = $_POST['diem'];
		$sql = "INSERT INTO user(hoten,masv,diem)VALUES('$hoten','$masv','$diem')";
		$stmt = $conn->prepare($sql);
		$query = $stmt->execute();
		if($query){
			header('location:index.php');
		}
		else{
			echo "Them that bai!";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>THÊM SINH VIÊN</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>THÊM SINH VIÊN</h1>
	<form method="post" id="formadd">
		<div>
			<label>Họ tên</label>
			<input type="text" name="hoten" placeholder="Nhập họ tên" id="hoten">
		</div>

		<div>
			<label>Má SV</label>
			<input type="text" name="masv" placeholder="Nhập mã sinh viên" id="masv">
		</div>

		<div>
			<label>Điểm</label>
			<input type="text" name="diem" placeholder="Nhập điểm" id=diem>
		</div>
		<input type="submit" name="submit" value="LƯU">
	</form>
	<button><a href="index.php">QUAY VỀ TRANG CHỦ</a></button>
</body>
</html>

<script type="text/javascript">
	 $(function(){
        $('#formadd').submit(function(){
            var hoten= $('#hoten').val();
            var masv = $('#masv').val();
            var diem = $('#diem').val();

            if(hoten == ""){
                alert("Vui lòng nhập họ tên!");
                return false;
            }
            else if(masv == ""){
                alert("Vui lòng nhập mã sinh viên!");
                return false;
            }
            else if(diem == ""){
            	alert("Vui lòng nhập điểm!");
                return false;
            }
        });
    });
</script>