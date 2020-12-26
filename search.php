<?php
include 'connect.php';
if(!empty($_POST['submit'])){
	if(isset($_POST['timkiem'])){
		$timkiem = $_POST['timkiem'];
		$sql = "SELECT * FROM user WHERE hoten LIKE '%$timkiem%'";
		$stmt = $conn->prepare($sql);
		$query = $stmt->execute();
		$result = array();
		if($query){
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				$result[] = $row;
			}
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>TÌM KIẾM SINH VIÊN</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<form method="post">
		<div>
			<label>TÌM KIẾM</label>
			<input type="text" name="timkiem" placeholder="Nhập họ tên để tìm kiếm">
			<input type="submit" name="submit" value="TÌM KIẾM">
		</div>
	</form>
	<br>
	<table class="table table-inverse">
			<thead>
				<tr>
					<th>ID</th>
					<th>Họ tên</th>
					<th>Mã SV</th>
					<th>Điểm</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($result as $items):?>
				<tr>
					<td><?php echo $items['ID'];?></td>
					<td><?php echo $items['hoten'];?></td>
					<td><?php echo $items['masv'];?></td>
					<td><?php echo $items['diem'];?></td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
		<button><a href="index.php">QUAY VỀ TRANG CHỦ</a></button>
</body>
</html>