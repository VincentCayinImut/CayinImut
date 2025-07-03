<?php get_header(); // Memanggil semua kode dari header.php ?>

<main>
    <?php
    // The WordPress Loop - Logika untuk menampilkan post atau halaman
    if (have_posts()) :
        while (have_posts()) : the_post();
            // Di sini kita akan menampilkan konten dari editor WordPress
            the_content();
        endwhile;
    else :
        // Jika TIDAK ada post/halaman, tampilkan konten statis di bawah ini sebagai fallback.
        // Ini adalah konten dari file HTML kita sebelumnya.
    ?>
    
        <section id="hero">
            <div class="hero-background"></div>
            <div class="hero-content">
                <h1>Halo! Ini Dunia Kecil Milik [Nama Temanmu]</h1>
                <p>Seorang pemimpi, pencinta matcha, dan penjelajah momen-momen kecil.</p>
                <a href="#about" class="cta-button">Kenali Lebih Jauh</a>
            </div>
        </section>

<section id="about" class="container">
    <div class="biodata-grid">

        <div class="biodata-card main-card animate-on-scroll">
            <img src="https://via.placeholder.com/300x300.png?text=Foto+Profil" alt="Foto Profil" class="biodata-profile-pic">
            <h2 class="biodata-name"><?php the_field('nama_lengkap'); ?></h2>
            <p class="biodata-motto"><?php the_field('motto_hidup'); ?></p>
        </div>

        <div class="biodata-card info-card animate-on-scroll">
            <h3><i class="icon">🎂</i> Info Dasar</h3>
            <ul>
                <li>
                    <strong>Lahir:</strong> 
                    <?php the_field('tempat_lahir'); ?>, <?php 
                        $tanggal_lahir_formatted = get_field('tanggal_lahir');
                        if($tanggal_lahir_formatted) {
                            $date = DateTime::createFromFormat('Ymd', $tanggal_lahir_formatted);
                            echo $date->format('d F Y');
                        }
                    ?>
                </li>
                <li>
                    <strong>Umur:</strong> 
                    <?php
                        // --- KODE OTOMATIS HITUNG UMUR ---
                        $tanggal_lahir = get_field('tanggal_lahir');
                        if($tanggal_lahir) {
                            $birthDate = new DateTime($tanggal_lahir);
                            $today = new DateTime('today');
                            $age = $birthDate->diff($today)->y;
                            echo $age . ' Tahun';
                        } else {
                            echo 'Data belum diisi';
                        }
                    ?>
                </li>
            </ul>
        </div>

        <div class="biodata-card list-card animate-on-scroll">
            <h3><i class="icon">🎨</i> Hobi</h3>
            <div class="list-items">
                <?php
                $hobi_string = get_field('hobi');
                if($hobi_string) {
                    $hobi_array = explode(',', $hobi_string);
                    foreach($hobi_array as $hobi_item) {
                        echo '<span class="list-item">' . trim($hobi_item) . '</span>';
                    }
                }
                ?>
            </div>
        </div>

        <div class="biodata-card list-card animate-on-scroll">
            <h3><i class="icon">🍔</i> Makanan Favorit</h3>
            <div class="list-items">
                <?php
                $makanan_string = get_field('makanan_favorit');
                if($makanan_string) {
                    $makanan_array = explode(',', $makanan_string);
                    foreach($makanan_array as $makanan_item) {
                        echo '<span class="list-item">' . trim($makanan_item) . '</span>';
                    }
                }
                ?>
            </div>
        </div>
        
    </div>
</section>

        <section id="gallery" class="container">
            <h2>Galeri Momen</h2>
            <p class="subtitle">Kumpulan kenangan yang berhasil tertangkap kamera.</p>
            <div class="gallery-grid">
                <div class="gallery-item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery1.jpg" alt="Foto jalan-jalan"></div>
                <div class="gallery-item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery2.jpg" alt="Foto kuliner"></div>
                <div class="gallery-item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery3.jpg" alt="Foto hobi"></div>
            </div>
        </section>

    <?php
    endif;
    ?>
</main>

<?php get_footer(); // Memanggil semua kode dari footer.php ?>