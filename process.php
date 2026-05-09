<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

$errors = [
    'name_error' => '',
    'email_error' => '',
    'message_error' => '',
];

if ($name === '') {
    $errors['name_error'] = 'Name is required';
}

if ($email === '') {
    $errors['email_error'] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email_error'] = 'Invalid email format';
}

if ($message === '') {
    $errors['message_error'] = 'Message is required';
}

if ($errors['name_error'] !== '' || $errors['email_error'] !== '' || $errors['message_error'] !== '') {
    $params = array_merge($errors, [
        'old_name' => $name,
        'old_email' => $email,
        'old_message' => $message,
    ]);

    header('Location: index.php?' . http_build_query($params) . '#contact');
    exit;
}

header('Location: thankyou.php');
exit;
