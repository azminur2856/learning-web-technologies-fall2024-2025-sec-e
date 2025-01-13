<?php
define('ENCRYPTION_KEY', '87886ef6674262c0bc56a235f80ee738df6a6f85418683ccea7b96d432ac7fd4'); // Secure key
define('ENCRYPTION_IV', '1234567890123456'); // 16-byte IV for AES-256-CBC

function encryptData($data) {
    return openssl_encrypt($data, 'AES-256-CBC', ENCRYPTION_KEY, 0, ENCRYPTION_IV);
}

function decryptData($data) {
    return openssl_decrypt($data, 'AES-256-CBC', ENCRYPTION_KEY, 0, ENCRYPTION_IV);
}
?>