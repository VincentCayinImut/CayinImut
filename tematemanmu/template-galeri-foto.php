<?php
/*
 * Template Name: Galeri Foto Template
 * Description: Template khusus untuk menampilkan semua postingan dari kategori foto.
 */

get_header(); // Memanggil kode dari header.php
?>

<main id="main-content" class="container">

    <header class="page-header">
        <h1 class="page-title"><?php the_title(); // Menampilkan judul halaman yang kita buat di WordPress ?></h1>
        <p class="subtitle">Kumpulan momen dan cerita yang terekam dalam gambar.</p>
    </header>

    <div class="photo-gallery-container">
        <?php
        // Persiapan untuk mengambil postingan khusus
        $args = array(
            'post_type'      => 'post',        // Kita mau ambil 'postingan'
            'category_name'  => 'momenku',     // HANYA dari kategori dengan slug 'momenku'
            'posts_per_page' => -1,            // Tampilkan semua postingan (-1) atau batasi jumlahnya (misal: 9)
        );

        // Menjalankan query ke database
        $photo_query = new WP_Query($args);

        // The Loop: Memeriksa apakah ada postingan yang ditemukan
        if ($photo_query->have_posts()) :
            while ($photo_query->have_posts()) : $photo_query->the_post();
                ?>
                
                <article id="post-<?php the_ID(); ?>" class="photo-gallery-item">
                    <a href="<?php the_permalink(); ?>" class="photo-link">
                        <?php if (has_post_thumbnail()) : // Cek jika ada Gambar Unggulan ?>
                            <div class="photo-thumbnail">
                                <?php the_post_thumbnail('large'); // Tampilkan Gambar Unggulan ukuran besar ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="photo-overlay">
                            <h3 class="photo-title"><?php the_title(); ?></h3>
                            <div class="photo-excerpt">
                                <?php the_excerpt(); // Tampilkan ringkasan/caption singkat ?>
                            </div>
                        </div>
                    </a>
                </article>

                <?php
            endwhile;
        else :
            // Jika tidak ada postingan di kategori 'momenku'
            echo '<p>Belum ada foto yang diposting di sini. Yuk, posting sesuatu!</p>';
        endif;

        // Reset query agar tidak mengganggu query WordPress lainnya
        wp_reset_postdata();
        ?>
    </div></main><?php
get_footer(); // Memanggil kode dari footer.php
?>