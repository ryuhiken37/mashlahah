<?php get_header(); ?>

<main class="container mx-auto px-6 py-12">

<section id="overview" class="text-center mb-24">
    <h1 class="text-5xl md:text-6xl font-bold mb-4">Showcase Tema WordPress Mashlahah.id</h1>
    <p class="text-lg md:text-xl text-brand-blue max-w-3xl mx-auto">
        Sebuah eksplorasi interaktif dari tema starter Mashlahah.id. Aplikasi ini membedah setiap komponen tema, mulai dari filosofi desain hingga struktur file teknisnya, memberikan gambaran lengkap tentang bagaimana brand guideline diwujudkan dalam sebuah tema WordPress yang fungsional.
    </p>
</section>

<section id="identity" class="mb-24">
    <h2 class="text-4xl font-bold text-center mb-12">Identitas Visual & Tone</h2>
    <div class="text-center mb-12 bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-2xl font-playfair mb-2">Filosofi Desain</h3>
        <p class="text-brand-blue">Tone yang diusung adalah Islami moderat, profesional, dan kredibel, mencerminkan misi Mashlahah.id sebagai media untuk umat dan bangsa.</p>
    </div>
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div>
            <h3 class="text-3xl font-playfair mb-6">Palet Warna</h3>
            <p class="mb-6">Warna yang dipilih merepresentasikan nilai-nilai inti: Hijau NU melambangkan keislaman yang menyejukkan, Biru Tua menunjukkan profesionalisme, dan Abu Terang sebagai latar yang bersih dan modern.</p>
            <div class="space-y-4">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 rounded-full bg-brand-green shadow-lg"></div>
                    <div>
                        <p class="font-bold text-lg">Hijau NU</p>
                        <p class="text-sm text-gray-500">#1A6B2D</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 rounded-full bg-brand-blue shadow-lg"></div>
                    <div>
                        <p class="font-bold text-lg">Biru Tua</p>
                        <p class="text-sm text-gray-500">#1C2A44</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 rounded-full bg-brand-gray border border-gray-200 shadow-lg"></div>
                    <div>
                        <p class="font-bold text-lg">Abu Terang</p>
                        <p class="text-sm text-gray-500">#F4F4F4</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h3 class="text-3xl font-playfair mb-6">Tipografi</h3>
            <p class="mb-8">Kombinasi 'Playfair Display' yang elegan untuk judul dan 'Lato' yang mudah dibaca untuk teks isi menciptakan hierarki visual yang jelas dan pengalaman membaca yang nyaman.</p>
            <div class="border-t pt-6">
                <h4 class="font-playfair text-4xl mb-2">Contoh Judul Artikel</h4>
                <p class="text-brand-blue">Ini adalah contoh paragraf yang menggunakan font Lato. Teks ini dirancang agar mudah dibaca di berbagai perangkat, mendukung kesan profesional dan kredibel dari konten yang disajikan.</p>
            </div>
        </div>
    </div>
</section>

<section id="explorer" class="mb-24">
    <h2 class="text-4xl font-bold text-center mb-12">File Explorer Interaktif</h2>
    <p class="text-center max-w-3xl mx-auto mb-12">Struktur tema WordPress ini minimalis dan mengikuti standar. Klik pada nama file di sebelah kiri untuk melihat isinya di sebelah kanan. Ini memungkinkan Anda untuk memahami peran setiap file dalam membangun keseluruhan tema.</p>
    <div class="grid md:grid-cols-3 gap-8">
        <div class="md:col-span-1 bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-bold mb-4">Struktur Tema</h3>
            <ul class="space-y-2">
                <li><span class="file-item cursor-pointer p-2 rounded-md block transition duration-200 hover:bg-gray-100" data-file="style.css">📄 style.css</span></li>
                <li><span class="file-item cursor-pointer p-2 rounded-md block transition duration-200 hover:bg-gray-100" data-file="index.php">📄 index.php</span></li>
                <li><span class="file-item cursor-pointer p-2 rounded-md block transition duration-200 hover:bg-gray-100" data-file="functions.php">📄 functions.php</span></li>
                <li><span class="file-item cursor-pointer p-2 rounded-md block transition duration-200 hover:bg-gray-100" data-file="header.php">📄 header.php</span></li>
                <li><span class="file-item cursor-pointer p-2 rounded-md block transition duration-200 hover:bg-gray-100" data-file="footer.php">📄 footer.php</span></li>
                 <li><span class="file-item cursor-pointer p-2 rounded-md block transition duration-200 hover:bg-gray-100" data-file="README.txt">📄 README.txt</span></li>
            </ul>
        </div>
        <div class="md:col-span-2 bg-brand-blue text-white p-6 rounded-lg shadow-md h-96 overflow-y-auto">
            <h3 id="filename" class="text-xl font-bold mb-4 text-gray-300">Pilih file untuk melihat kode...</h3>
            <pre><code id="code-display" class="text-sm"></code></pre>
        </div>
    </div>
</section>

<section id="preview" class="mb-12">
    <h2 class="text-4xl font-bold text-center mb-12">Simulasi Live Preview</h2>
    <p class="text-center max-w-3xl mx-auto mb-12">Bagian ini mensimulasikan bagaimana tampilan tema pada halaman utama sebuah situs WordPress. Kini, dengan Gemini API, konten artikel dapat dihasilkan secara dinamis untuk menunjukkan tampilan yang lebih nyata.</p>
    <div class="w-full max-w-5xl mx-auto border-8 border-gray-300 rounded-2xl shadow-2xl overflow-hidden">
        <div class="bg-gray-200 px-4 py-2 flex items-center space-x-2">
             <div class="w-3 h-3 bg-red-500 rounded-full"></div>
             <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
             <div class="w-3 h-3 bg-green-500 rounded-full"></div>
        </div>
        <div class="bg-brand-gray">
            <header class="bg-brand-green text-white p-6">
                <h1 class="font-playfair text-3xl font-bold"><a href="#" class="text-white no-underline">Mashlahah.id</a></h1>
                <p class="m-0 text-gray-200">Media untuk Umat & Bangsa</p>
            </header>
            
            <main class="max-w-3xl mx-auto p-8">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article class="mb-8 p-6 bg-white rounded-lg shadow-md">
                        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-2 space-y-2 md:space-y-0 md:space-x-4">
                            <h2 class="font-playfair text-3xl"><a href="<?php the_permalink(); ?>" class="text-brand-green no-underline"><?php the_title(); ?></a></h2>
                            <div class="flex space-x-2">
                                <button data-title="<?php the_title(); ?>" class="generate-btn px-4 py-1 text-sm bg-brand-green text-white rounded-full shadow-md hover:bg-opacity-90 transition-all duration-300">
                                    ✨ Generate
                                </button>
                                <button class="summarize-btn px-4 py-1 text-sm bg-brand-blue text-white rounded-full shadow-md hover:bg-opacity-90 transition-all duration-300" disabled>
                                    ✨ Ringkas
                                </button>
                                <button class="translate-btn px-4 py-1 text-sm bg-brand-blue text-white rounded-full shadow-md hover:bg-opacity-90 transition-all duration-300" disabled>
                                    ✨ Terjemahkan
                                </button>
                            </div>
                        </div>
                        <div class="text-brand-blue article-content">
                            <span class="text-gray-500 italic">Klik tombol "Generate" untuk mengisi konten artikel...</span>
                        </div>
                        <div class="summary-translation-container"></div>
                    </article>
                <?php endwhile; else: ?>
                    <p class="text-brand-blue text-center italic">Tidak ada artikel untuk ditampilkan.</p>
                <?php endif; ?>
            </main>

            <footer class="bg-brand-blue text-white text-center p-6">
                <p>&copy; 2025 Mashlahah.id. Semua Hak Dilindungi.</p>
            </footer>
        </div>
    </div>
</section>

</main>
<?php get_footer(); ?>