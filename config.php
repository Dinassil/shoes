<?php

try {
	$pdo = new PDO('mysql:dbname=mydb; host=localhost', 'root', '');
} catch (PDOException $e) {
	die($e->getMessage());
}