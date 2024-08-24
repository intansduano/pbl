<?php

$config['protocol'] = $_ENV['PROTOCOL_MAILER'];
$config['smtp_host'] = $_ENV['HOST_MAILER'];
$config['smtp_port'] = $_ENV['PORT_MAILER']; // Gunakan port 587 untuk STARTTLS
$config['smtp_crypto'] = 'tls'; // Konfigurasi STARTTLS
$config['smtp_user'] = $_ENV['EMAIL_MAILER'];
$config['smtp_pass'] = $_ENV['PASS_MAILER'];
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
