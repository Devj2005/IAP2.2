<?php
require 'ClassAutoLoad.php';


$show_popup = false;
$popup_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signin'])) {
	$email = trim($_POST['email'] ?? '');
	$password = $_POST['password'] ?? '';
	if (filter_var($email, FILTER_VALIDATE_EMAIL) && $password) {
		try {
			$pdo = new PDO('mysql:host=localhost;dbname=hello', 'root', 'devyan2005');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $pdo->prepare('SELECT id, name, password, verified FROM users WHERE email = ?');
			$stmt->execute([$email]);
			$user = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($user && $user['verified'] && password_verify($password, $user['password'])) {
				header('Location: dashboard.php');
				exit;
			} elseif ($user && !$user['verified']) {
				$show_popup = true;
				$popup_message = 'Please verify your email before signing in.';
			} else {
				$show_popup = true;
				$popup_message = 'Invalid email or password.';
			}
		} catch (Exception $e) {
			$show_popup = true;
			$popup_message = 'Sign in failed: ' . $e->getMessage();
		}
	} else {
		$show_popup = true;
		$popup_message = 'Please enter valid details.';
	}
}

$ObjLayout->header($conf);
$ObjLayout->navbar($conf);
$ObjLayout->banner($conf);
$ObjLayout->form_content($conf, $ObjForm);
if ($show_popup) {
	echo '<script>alert("' . addslashes($popup_message) . '");</script>';
}
$ObjLayout->footer($conf);