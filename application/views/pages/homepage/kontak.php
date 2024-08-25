<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $title ?></title>
</head>

<body>

  <!-- Contact Us Form -->
  <section class="text-gray-600 body-font mx-12">
    <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
      <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
        <h1 class="title-font font-medium text-3xl text-gray-900">Hubungi Kami</h1>
        <p class="leading-relaxed mt-4">
          Terima kasih atas minat Anda dalam project-based learning di Jurusan Teknik Elektro. Jika Anda memiliki pertanyaan, saran, atau membutuhkan informasi lebih lanjut mengenai program kami, jangan ragu untuk menghubungi kami. Tim kami siap membantu Anda dengan segala kebutuhan terkait proyek, riset, atau kolaborasi di bidang teknik elektro.
        </p>
      </div>
      <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full">
        <h1 class="text-2xl font-bold mb-6">Contact Us</h1>
        <?php if ($this->session->flashdata('message')): ?>
          <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800">
            <?= $this->session->flashdata('message'); ?>
          </div>
        <?php endif; ?>
        <form action="<?= site_url('contact/send'); ?>" method="POST">
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" id="name" name="name" placeholder="Intan Sari Duano" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>

          <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email Aktif</label>
            <input type="email" id="email" name="email" placeholder="Mohon input email aktif yang bisa kami hubungi..." required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>

          <div class="mb-4">
            <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
            <textarea id="message" name="message" rows="4" placeholder="Masukan pesan Anda..." required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
          </div>

          <div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Kirim</button>
          </div>
        </form>
      </div>
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