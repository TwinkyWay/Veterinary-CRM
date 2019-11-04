<?php
$host = 'localhost';
$dbName = 'vetklinikatest';
$userName = 'root';
$pass = '';
try {
	$pdo = new PDO("mysql:host=$host;dbname=$dbName",$userName,$pass);
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo -> exec('SET NAMES "utf8"');
} catch (PDOException $e) {
	errorMessage('Ошибка соединения с БД');
}