<?php

function tematemanmu_enqueue_styles() {
    // Me-load file style.css utama dari tema
    wp_enqueue_style(
        'tematemanmu-style', // nama handle
        get_stylesheet_uri() // fungsi ini otomatis mencari style.css di folder tema
    );
}

// Menjalankan fungsi di atas saat WordPress menyiapkan aset
add_action('wp_enqueue_scripts', 'tematemanmu_enqueue_styles');

?>