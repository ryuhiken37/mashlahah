document.addEventListener('DOMContentLoaded', function () {
const fileContents = {
'style.css': `/*
Theme Name: Mashlahah.id Theme
Theme URI: https://mashlahah.id/
Author: Tim Redaksi Mashlahah.id
Author URI: https://mashlahah.id/
Description: Tema starter Mashlahah.id berdasarkan brand guideline (NU, Islami moderat, profesional).
Version: 1.0
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: mashlahah
*/

body {
font-family: 'Lato', sans-serif;
background-color: #F4F4F4;
color: #1C2A44;
margin: 0;
padding: 0;
}

h1, h2, h3, h4, h5 {
font-family: 'Playfair Display', serif;
color: #1A6B2D;
}

h1, h2, h3, h4, h5, .font-playfair {
font-family: 'Playfair Display', serif;
color: #1A6B2D;
}

.bg-brand-green { background-color: #1A6B2D; }
.bg-brand-blue { background-color: #1C2A44; }
.bg-brand-gray { background-color: #F4F4F4; }
.text-brand-green { color: #1A6B2D; }
.text-brand-blue { color: #1C2A44; }
.smooth-scroll { scroll-behavior: smooth; }
.file-item.active {
background-color: #e0e7ff;
color: #1C2A44;
font-weight: bold;
}
pre {
white-space: pre-wrap;
word-wrap: break-word;
}
.summary-box {
background-color: #f0f4f8;
border-left: 4px solid #1C2A44;
padding: 1rem;
margin-top: 1rem;
border-radius: 4px;
}
.translation-box {
background-color: #f0f4f8;
border-left: 4px solid #1A6B2D;
padding: 1rem;
margin-top: 1rem;
border-radius: 4px;
}
, 'index.php':<?php get_header(); ?>

<main style="max-width:900px; margin:auto; padding:1rem;">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article style="margin-bottom:2rem; padding:1rem; background:white; border-radius:8px;">
<h2><a href="<?php the_permalink(); ?>" style="color:#1A6B2D;"><?php the_title(); ?></a></h2>
<div><?php the_excerpt(); ?></div>
</article>
<?php endwhile; else: ?>
<p>Belum ada berita.</p>
<?php endif; ?>
</main>
<?php get_footer(); ?>, &#39;functions.php&#39;:<?php
function mashlahah_enqueue_styles() {
// Google Fonts
wp_enqueue_style('mashlahah-fonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Playfair+Display:wght@700&display=swap', false);

// Style utama
wp_enqueue_style('mashlahah-style', get_stylesheet_uri());

}
add_action('wp_enqueue_scripts', 'mashlahah_enqueue_styles');, 'header.php':<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header style="background:#1A6B2D; color:white; padding:1rem;">
<div class="site-branding">
<h1><a href="<?php echo esc_url(home_url('/')); ?>" style="color:white; text-decoration:none;">
Mashlahah.id
</a></h1>
<p style="margin:0;">Media untuk Umat & Bangsa</p>
</div>
<nav>
<?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
</nav>
</header>, &#39;footer.php&#39;:<footer style="background:#1C2A44; color:white; text-align:center; padding:1rem;">
<p>&copy; <?php echo date('Y'); ?> Mashlahah.id. Semua Hak Dilindungi.</p>
</footer>
<?php wp_footer(); ?>
</body>
</html>, &#39;README.txt&#39;:# Mashlahah.id WordPress Theme

Tema starter sesuai brand guideline Mashlahah.id:

Warna: Hijau NU, Biru Tua, Abu Terang

Tipografi: Playfair Display + Lato

Tone: Islami moderat, profesional, kredibel`
};

const fileItems = document.querySelectorAll('.file-item');
const codeDisplay = document.getElementById('code-display');
const filenameDisplay = document.getElementById('filename');

fileItems.forEach(item => {
item.addEventListener('click', () => {
const fileName = item.getAttribute('data-file');

      fileItems.forEach(i => i.classList.remove('active'));
      item.classList.add('active');

      filenameDisplay.textContent = fileName;
      codeDisplay.textContent = fileContents[fileName];
  });

});

const mobileMenuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');
mobileMenuButton.addEventListener('click', () => {
mobileMenu.classList.toggle('hidden');
});

const generateButtons = document.querySelectorAll('.generate-btn');
const summarizeButtons = document.querySelectorAll('.summarize-btn');
const translateButtons = document.querySelectorAll('.translate-btn');

async function callGeminiAPI(prompt, systemPrompt) {
const payload = {
contents: [{
parts: [{ text: prompt }]
}],
tools: [],
systemInstruction: systemPrompt ? { parts: [{ text: systemPrompt }] } : undefined,
};

  const apiKey = "";
  const apiUrl = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-preview-05-20:generateContent?key=${apiKey}`;

  let retryCount = 0;
  const maxRetries = 3;
  let response;

  while (retryCount < maxRetries) {
      response = await fetch(apiUrl, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(payload)
      });

      if (response.ok) {
          break;
      } else if (response.status === 429) {
          const delay = Math.pow(2, retryCount) * 1000;
          await new Promise(res => setTimeout(res, delay));
          retryCount++;
      } else {
          throw new Error(`API returned status code: ${response.status}`);
      }
  }

  if (!response.ok) {
      throw new Error("Failed to fetch from API after multiple retries.");
  }

  const result = await response.json();
  return result?.candidates?.[0]?.content?.parts?.[0]?.text;

}

generateButtons.forEach(button => {
button.addEventListener('click', async () => {
const articleTitle = button.dataset.title;
const article = button.closest('article');
const contentDiv = article.querySelector('.article-content');
const summarizeBtn = article.querySelector('.summarize-btn');
const translateBtn = article.querySelector('.translate-btn');
const summaryTranslationBox = article.querySelector('.summary-translation-container');

      button.disabled = true;
      button.textContent = 'Memuat...';
      summaryTranslationBox.innerHTML = '';
      summarizeBtn.disabled = true;
      translateBtn.disabled = true;
      contentDiv.textContent = 'Mengisi konten artikel...';

      try {
          const prompt = `Tulis satu paragraf singkat, informatif, dan profesional tentang topik artikel berita berjudul: '${articleTitle}'. Pastikan isinya mencerminkan tone media Islami moderat.`;
          const systemPrompt = "Anda adalah seorang penulis konten profesional untuk media berita Islami modern.";
          const generatedText = await callGeminiAPI(prompt, systemPrompt);
          if (generatedText) {
              contentDiv.textContent = generatedText;
              summarizeBtn.disabled = false;
              translateBtn.disabled = false;
          } else {
              contentDiv.textContent = 'Maaf, konten tidak dapat dihasilkan saat ini. Silakan coba lagi.';
          }
      } catch (error) {
          contentDiv.textContent = `Error: ${error.message}`;
          console.error('Error generating content:', error);
      } finally {
          button.disabled = false;
          button.textContent = '✨ Generate';
      }
  });

});

summarizeButtons.forEach(button => {
button.addEventListener('click', async () => {
const article = button.closest('article');
const contentDiv = article.querySelector('.article-content');
const summaryTranslationBox = article.querySelector('.summary-translation-container');
const articleContent = contentDiv.textContent;

      if (articleContent.trim() === '' || articleContent.includes('Mengisi konten artikel...')) {
          summaryTranslationBox.innerHTML = '<p class="text-gray-500 italic">Silakan isi konten artikel terlebih dahulu.</p>';
          return;
      }

      button.disabled = true;
      button.textContent = 'Memuat...';
      summaryTranslationBox.innerHTML = 'Meringkas...';

      try {
          const prompt = `Ringkas teks berikut menjadi satu kalimat: '${articleContent}'`;
          const summarizedText = await callGeminiAPI(prompt);
          if (summarizedText) {
              summaryTranslationBox.innerHTML = `<div class="summary-box"><strong>Ringkasan:</strong> ${summarizedText}</div>`;
          } else {
              summaryTranslationBox.innerHTML = '<p class="text-gray-500 italic">Ringkasan tidak dapat dihasilkan.</p>';
          }
      } catch (error) {
          summaryTranslationBox.innerHTML = `<p class="text-gray-500 italic">Error: ${error.message}</p>`;
          console.error('Error summarizing content:', error);
      } finally {
          button.disabled = false;
          button.textContent = '✨ Ringkas';
      }
  });

});

translateButtons.forEach(button => {
button.addEventListener('click', async () => {
const article = button.closest('article');
const contentDiv = article.querySelector('.article-content');
const summaryTranslationBox = article.querySelector('.summary-translation-container');
const articleContent = contentDiv.textContent;

      if (articleContent.trim() === '' || articleContent.includes('Mengisi konten artikel...')) {
          summaryTranslationBox.innerHTML = '<p class="text-gray-500 italic">Silakan isi konten artikel terlebih dahulu.</p>';
          return;
      }

      button.disabled = true;
      button.textContent = 'Memuat...';
      summaryTranslationBox.innerHTML = 'Menerjemahkan...';

      try {
          const prompt = `Terjemahkan teks berikut ke dalam Bahasa Inggris: '${articleContent}'`;
          const translatedText = await callGeminiAPI(prompt);
          if (translatedText) {
              summaryTranslationBox.innerHTML = `<div class="translation-box"><strong>Terjemahan (EN):</strong> ${translatedText}</div>`;
          } else {
              summaryTranslationBox.innerHTML = '<p class="text-gray-500 italic">Terjemahan tidak dapat dihasilkan.</p>';
          }
      } catch (error) {
          summaryTranslationBox.innerHTML = `<p class="text-gray-500 italic">Error: ${error.message}</p>`;
          console.error('Error translating content:', error);
      } finally {
          button.disabled = false;
          button.textContent = '✨ Terjemahkan';
      }
  });

});
});