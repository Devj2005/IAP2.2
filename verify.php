<?php
require 'ClassAutoLoad.php';

$verified = false;
$message = '';
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=hello', 'root', 'devyan2005');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare('SELECT id, verified FROM users WHERE token = ?');
        $stmt->execute([$token]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && !$user['verified']) {
            $update = $pdo->prepare('UPDATE users SET verified = 1 WHERE id = ?');
            $update->execute([$user['id']]);
            $verified = true;
            $message = 'Your account has been verified! You can now sign in.';
        } elseif ($user && $user['verified']) {
            $message = 'Your account is already verified.';
        } else {
            $message = 'Invalid or expired verification link.';
        }
    } catch (Exception $e) {
        $message = 'Verification failed: ' . $e->getMessage();
    }
} else {
    $message = 'No verification token provided.';
}

$ObjLayout->header($conf);
$ObjLayout->navbar($conf);
echo '<div class="container py-5"><div class="row justify-content-center"><div class="col-md-8"><div class="card card-custom p-4 shadow-lg border-0 text-center">';
echo '<h2 class="mb-4">Account Verification</h2>';
echo '<p class="lead">' . htmlspecialchars($message) . '</p>';
if ($verified) {
    echo '<a href="signin.php" class="btn btn-success">Sign In</a>';
}
echo '</div></div></div></div>';
$ObjLayout->footer($conf);
