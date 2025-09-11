<?php
require 'ClassAutoLoad.php';


$show_popup = false;
$popup_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
	$name = trim($_POST['name'] ?? '');
	$email = trim($_POST['email'] ?? '');
	$password = $_POST['password'] ?? '';
	if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $password) {
		try {
			$pdo = new PDO('mysql:host=localhost;dbname=hello', 'root', 'devyan2005');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$token = bin2hex(random_bytes(16));
			$stmt = $pdo->prepare('INSERT INTO users (name, email, password, token, verified) VALUES (?, ?, ?, ?, 0)');
			$stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT), $token]);
			// Send verification email
			require_once 'Global/SendMail.php';
			$verify_link = $conf['site_url'] . "/verify.php?token=" . urlencode($token);
			$mailCnt = [
				'mail_from' => 'noreply@gaminghub.org',
				'name_from' => 'Gaming Hub',
				'mail_to' => $email,
				'name_to' => $name,
				'subject' => 'Welcome to Gaming Hub! Account Verification',
				'body' => "Hello {$name},<br><br>You requested an account on Gaming Hub.<br><br>In order to use this account you need to <a href='{$verify_link}'>Click Here</a> to complete the registration process.<br><br>Regards,<br>Systems Admin<br>Gaming Hub"
			];
			$ObjSendMail = new SendMail();
			$ObjSendMail->Send_Mail($conf, $mailCnt);
			$show_popup = true;
			$popup_message = 'Verification email has been sent!';
		} catch (Exception $e) {
			$show_popup = true;
			$popup_message = 'Signup failed: ' . $e->getMessage();
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