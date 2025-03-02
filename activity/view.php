<?php

function render_view(string $template, array $data = []) {
    extract($data); // ✅ ทำให้สามารถใช้ตัวแปรจาก `$data` ได้ใน View
    require TEMPLATES_DIR . '/header_get.php';
    require TEMPLATES_DIR . '/' . $template . '.php';
    // require TEMPLATES_DIR . '/footer.php';
}

