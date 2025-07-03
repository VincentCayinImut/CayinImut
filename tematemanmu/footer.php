<footer id="contact">
        <div class="container">
            <h3>Yuk, Terhubung!</h3>
            <p>Temukan aku di media sosial lainnya.</p>
            <div class="social-links">
                <a href="#">Instagram</a>
                <a href="#">TikTok</a>
                <a href="#">Twitter</a>
            </div>
            <p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> | Dibuat dengan ❤️</p>
        </div>
    </footer>


    <?php // ===== PERUBAHAN DIMULAI DI SINI ===== ?>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Membuat observer untuk mengamati elemen
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                // Jika elemen masuk ke dalam layar
                if (entry.isIntersecting) {
                    // Tambahkan class 'is-visible' untuk memicu animasi CSS
                    entry.target.classList.add('is-visible');
                    // Hentikan pengamatan pada elemen ini agar animasi hanya terjadi sekali
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1 // Animasi terpicu saat 10% dari elemen terlihat
        });

        // Ambil semua elemen yang ingin dianimasikan
        const elementsToAnimate = document.querySelectorAll('.animate-on-scroll');
        // Mulai amati setiap elemen
        elementsToAnimate.forEach(element => {
            observer.observe(element);
        });
    });
    </script>
    
    <?php // ===== PERUBAHAN SELESAI DI SINI ===== ?>


    <?php wp_footer(); // FUNGSI WAJIB WordPress: Untuk plugin dan skrip. HARUS ADA TEPAT SEBELUM </body> ?>

</body>
</html>