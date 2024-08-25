<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
</head>

<body>

  <section class=" p-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="md:flex md:flex-row-reverse md:items-center">
        <div class="md:w-1/2 mb-8 ml-20 md:mb-0">
          <img src="https://source.unsplash.com/random/600x400/?photo studio" alt="Momento studio" class="w-full h-auto rounded-lg shadow-lg">
        </div>
        <div class="md:w-1/2">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Tentang The Truth</h2>
          <p class="text-gray-600 mb-6">Selamat datang di "The Truth" - wadah online untuk mendapatkan, berbagi, dan menilai informasi. Kami hadir sebagai platform yang memungkinkan Anda, para pengguna setia kami, untuk mengungkapkan kebenaran yang Anda alami dan memastikan setiap berita dihargai. Di sini, Anda memiliki kekuatan untuk mengunggah berita Anda sendiri, memberikan penilaian, dan bersama-sama menciptakan skor kepercayaan sebagai tanda kejelasan dan kebenaran.</p>
          <p class="text-gray-600 mb-6">Bergabunglah dengan komunitas kami yang bersemangat, karena di "The Truth," keadilan informasi bukanlah sekadar tagline, melainkan komitmen kami untuk membangun dunia yang lebih terinformasi dan jujur. Sama-sama kita ciptakan narasi yang transparan, kritis, dan penuh kepercayaan!</p>

        </div>
      </div>
    </div>

    <div class="container mx-auto">
      <h2 class="text-3xl font-bold mb-4">Layanan Kami</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Layanan 1: Upload Berita -->
        <div class="bg-white border shadow-lg hover:scale-105 transition-transform transform duration-1000 p-6 rounded-md text-center">
          <i class="fas fa-upload text-4xl mb-4 text-blue-500"></i>
          <h3 class="text-xl font-semibold mb-2">Upload Berita</h3>
          <p class="text-gray-700">Unggah berita Anda sendiri untuk dibagikan dengan komunitas kami.</p>
        </div>

        <!-- Layanan 2: Dukungan Pengguna -->
        <div class="bg-white border shadow-lg hover:scale-105 transition-transform transform duration-1000 p-6 rounded-md text-center">
          <i class="fas fa-heart text-4xl mb-4 text-red-500"></i>
          <h3 class="text-xl font-semibold mb-2">Dukungan Pengguna</h3>
          <p class="text-gray-700">Dapatkan penghasilan dari dukungan pengguna tanpa iklan yang mengganggu.</p>
        </div>

        <!-- Layanan 3: Penilaian Kepercayaan -->
        <div class="bg-white border shadow-lg hover:scale-105 transition-transform transform duration-1000 p-6 rounded-md text-center">
          <i class="fas fa-chart-line text-4xl mb-4 text-green-500"></i>
          <h3 class="text-xl font-semibold mb-2">Penilaian Kepercayaan</h3>
          <p class="text-gray-700">Beri penilaian pada berita untuk menciptakan skor kepercayaan bersama.</p>
        </div>

        <!-- Layanan 4: Rewards Program -->
        <div class="bg-white border shadow-lg hover:scale-105 transition-transform transform duration-1000 p-6 rounded-md text-center">
          <i class="fas fa-gift text-4xl mb-4 text-purple-500"></i>
          <h3 class="text-xl font-semibold mb-2">Program Rewards</h3>
          <p class="text-gray-700">Dapatkan hadiah menarik melalui program rewards kami.</p>
        </div>

        <!-- Layanan 5: Edukasi Informasi -->
        <div class="bg-white border shadow-lg hover:scale-105 transition-transform transform duration-1000 p-6 rounded-md text-center">
          <i class="fas fa-graduation-cap text-4xl mb-4 text-yellow-500"></i>
          <h3 class="text-xl font-semibold mb-2">Edukasi Informasi</h3>
          <p class="text-gray-700">Ikuti kursus dan seminar kami untuk meningkatkan literasi informasi Anda.</p>
        </div>

        <div class="bg-white border shadow-lg hover:scale-105 transition-transform transform duration-1000 p-6 rounded-md text-center">
          <i class="fas fa-comments text-4xl mb-4 text-orange-500"></i>
          <h3 class="text-xl font-semibold mb-2">Komunitas Diskusi</h3>
          <p class="text-gray-700">Bergabunglah dengan komunitas diskusi kami untuk berbagi pandangan dan pengetahuan.</p>
        </div>
      </div>
    </div>
  </section>
</body>

</html>

<style>
  ::-webkit-scrollbar {
    width: 10px;
    background-color: #F3F4F6;
  }

  ::-webkit-scrollbar-thumb {
    background-color: grey;
  }

  ::-webkit-scrollbar-track {
    background-color: transparent;
  }

  .scrollbar {
    scrollbar-color: transparent transparent;
    /* Warna thumb dan track scrollbar */
    scrollbar-width: thin;
    /* Lebar scrollbar */
  }
</style>