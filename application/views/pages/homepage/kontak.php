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
        <h1 class="title-font font-medium text-3xl text-gray-900">Get in Touch with Us</h1>
        <p class="leading-relaxed mt-4">
          Drop your query with RFQ and we will immediately get back to you with High-Service Packed modern solutions in adjustable prices. Get Hands-On experience, Prototype, Use-case Model and Demo Application overview.
        </p>
      </div>
      <div class="lg:w-2/6 md:w-1/2 rounded-lg flex flex-col md:ml-auto w-full mt-10 md:mt-0">
        <div class="flex flex-col justify-between rounded-lg shadow-md border p-4">
          <div>
            <h3 class="text-2xl font-semibold mb-4">Get in Touch</h3>
            <p class="text-black mb-4">Have a question or just want to say hi? Send us a message and we'll get back to you as soon as possible.</p>
            <form method="post">
              <div class="mb-4">
                <label for="name" class="block text-black font-semibold mb-2">Name</label>
                <input type="text" id="name" placeholder="Someone" name="name" class="w-full border border-gray-300 rounded-lg p-2">
              </div>
              <div class="mb-4">
                <label for="email" class="block text-black font-semibold mb-2">Email</label>
                <input type="email" id="email" placeholder="your@email.com" name="email" class="w-full border border-gray-300 rounded-lg p-2">
              </div>
              <div class="mb-4">
                <label for="message" class="block text-black font-semibold mb-2">Message</label>
                <textarea id="message" name="message" placeholder="your message here" class="w-full border border-gray-300 rounded-lg p-2"></textarea>
              </div>
              <input type="submit" name="send" value="Send Message" class="bg-blue-500  cursor-pointer text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
            </form>
          </div>
          <div class="mt-8">
            <h4 class="text-black font-semibold mb-4">Connect with Us</h4>
            <div class="flex space-x-4">
              <a href="#" class="text-black hover:text-[#966f29] transition duration-200"><i class="fab fa-facebook fa-2x"></i></a>
              <a href="#" class="text-black hover:text-[#966f29] transition duration-200"><i class="fab fa-instagram fa-2x"></i></a>
            </div>
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