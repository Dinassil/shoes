<?php
include 'config.php';

$name = $_POST['name'];

// Create

if (isset($_POST['submit'])) {
	$sql = ("INSERT INTO `season`(`name`) VALUES(?)");
	$query = $pdo->prepare($sql);
	$query->execute([$name]);
	$success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	
}

// Read

$sql = $pdo->prepare("SELECT * FROM `season`");
$sql->execute();
$result = $sql->fetchAll();

// Update
$edit_name = $_POST['edit_name'];
$get_id = $_GET['id'];
if (isset($_POST['edit-submit'])) {
	$sqll = "UPDATE season SET name=? WHERE id=?";
	$querys = $pdo->prepare($sqll);
	$querys->execute([$edit_name, $get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}

// DELETE
if (isset($_POST['delete_submit'])) {
	$sql = "DELETE FROM season WHERE id=?";
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}