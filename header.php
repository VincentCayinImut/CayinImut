<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); // FUNGSI WAJIB: Untuk plugin dan fungsi inti WordPress ?>
</head>
<body <?php body_class(); ?>>

    <header id="main-header">
        <div class="container">
            <div class="logo"><?php bloginfo('name'); // Mengambil nama situs dari pengaturan WordPress ?></div>
            <nav>
                <?php
                // Kita bisa membuat menu dinamis nanti, untuk sekarang biarkan statis
                wp_nav_menu( array(
                    'theme_location' => 'primary-menu',
                    'fallback_cb'    => false, // Jangan tampilkan apa-apa jika menu belum dibuat
                    'container'      => '',
                    'items_wrap'     => '<ul>%3$s</ul>',
                ));
                ?>
                 <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">Tentang Aku</a></li>
                    <li><a href="#gallery">Galeri</a></li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>