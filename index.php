<?php
include('connect.php');
if(empty($_POST['submit'])){
	$sql = "SELECT * FROM user";
	$stmt = $conn->prepare($sql);
	$query = $stmt->execute();
	$result = array();
	if($query){
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
	}
}
else{
	if(isset($_POST['timkiem'])){
		$timkiem = $_POST['timkiem'];
		$sql = "SELECT * FROM user WHERE hoten LIKE '%$timkiem%'";
		$stmt = $conn->prepare($sql);
		$query = $stmt->execute();
		$result = array();
		if($query){
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$result[] = $row;
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>SINH VIEN PDO</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>THÊM/SỬA/XÓA/TÌM KIẾM SINH VIÊN PDO</header>
	<div class="container">
	<content>
		<ul>
			<li><a href="index.php">TRANG CHỦ</a></li>
			<li><a href="addsv.php">THÊM SINH VIÊN</a></li>
		</ul>
		<form method="post">
			<label>TÌM KIẾM</label>
			<input type="text" name="timkiem" placeholder="Nhập tên để tìm kiếm !">
			<input type="submit" name="submit" value="TÌM KIẾM">
		</form>
		<table class="table table-inverse">
			<thead>
				<tr>
					<th>ID</th>
					<th>Họ tên</th>
					<th>Mã SV</th>
					<th>Điểm</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($result as $items):?>
				<tr>
					<td><?php echo $items['ID'];?></td>
					<td><?php echo $items['hoten'];?></td>
					<td><?php echo $items['masv'];?></td>
					<td><?php echo $items['diem'];?></td>
					<td>
						<span><a href="editsv.php?ID=<?php echo $items['ID'];?>">SỬA</a></span>
						<span><a href="deletesv.php?ID=<?php echo $items['ID'];?>">XÓA</a></span>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</content>
	</div>
	<footer>Ngô Trung Kiên - 74458 - CNT58DH</footer>
</body>
</html>