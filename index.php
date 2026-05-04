<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Farm Project</title>
</head>
<body>
    <div class="bg-white mt-20">
      <?php 
      include("./header/header.php");
      ?>
        <div class="relative w-full overflow-hidden bg-cover bg-center bg-no-repeat" style="background-image: url('./farmbg.jpg'); min-height: 85vh;">
          <div class="absolute inset-0 bg-black/50"></div>
          <div class="relative z-10 mx-auto flex min-h-[75vh] w-full max-w-5xl flex-col items-center justify-center px-6 py-24 text-center sm:px-8 sm:py-32 lg:py-36">
            <h1 class="text-4xl font-extrabold tracking-tight text-white drop-shadow-[0_20px_30px_rgba(0,0,0,0.45)] sm:text-5xl lg:text-6xl">
              The best place to buy and sell your farm products
            </h1>
            <p class="mt-6 max-w-2xl text-base leading-8 text-slate-100 sm:text-lg">
              Farming becomes easier with access to remote buyers, trusted transactions, and fresh products delivered nationwide.
            </p>
            <div class="mt-10 flex w-full flex-col items-center justify-center gap-4 sm:flex-row">
              <a href="register.php" class="inline-flex justify-center rounded-md bg-white px-5 py-3 text-sm font-semibold text-green-600 shadow-lg shadow-black/10 transition hover:bg-white/90 hover:text-green-800">
                Get started
              </a>
            </div>
          </div>
        </div>
      </div>

     
      <section id="about" class="bg-gradient-to-b from-white to-green-50 py-8 sm:py-24 lg:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl text-center mb-12">
            <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">About PLYMET NIG LTD</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Revolutionizing Farm-to-Market Connection</p>
          </div>

          <div class="grid lg:grid-cols-2 gap-12 items-center mt-8">
            <div class="space-y-6">
              <div class="space-y-4">
                <h3 class="text-2xl font-semibold text-green-600">Our Mission</h3>
                <p class="text-gray-700 leading-relaxed">
                  PLYMET NIG LTD is a pioneering farm ecommerce platform dedicated to connecting farmers and produce sellers directly with customers nationwide. We eliminate unnecessary intermediaries, ensuring fair prices for sellers and fresh, quality products for buyers.
                </p>
              </div>
              <div class="space-y-4">
                <h3 class="text-2xl font-semibold text-green-600">What We Offer</h3>
                <ul class="space-y-3 text-gray-700">
                  <li class="flex items-start">
                    <span class="text-green-500 font-bold mr-3">✓</span>
                    <span>Direct marketplace access for farmers and produce sellers</span>
                  </li>
                  <li class="flex items-start">
                    <span class="text-green-500 font-bold mr-3">✓</span>
                    <span>Fresh, quality agricultural products from verified sellers</span>
                  </li>
                  <li class="flex items-start">
                    <span class="text-green-500 font-bold mr-3">✓</span>
                    <span>Secure transactions and reliable delivery services</span>
                  </li>
                  <li class="flex items-start">
                    <span class="text-green-500 font-bold mr-3">✓</span>
                    <span>Competitive pricing that benefits both sellers and buyers</span>
                  </li>
                  <li class="flex items-start">
                    <span class="text-green-500 font-bold mr-3">✓</span>
                    <span>Real-time product availability and order tracking</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="bg-gradient-to-br from-green-400 to-green-600 rounded-lg shadow-xl p-8 text-white">
              <h3 class="text-2xl font-semibold mb-6">Why Choose PLYMET?</h3>
              <div class="space-y-6">
                <div class="bg-white/10 p-4 rounded-lg backdrop-blur">
                  <h4 class="font-semibold mb-2">🚀 Innovation</h4>
                  <p class="text-sm text-green-50">PLYMET NIG LTD connecting rural farmers to urban markets</p>
                </div>
                <div class="bg-white/10 p-4 rounded-lg backdrop-blur">
                  <h4 class="font-semibold mb-2">🤝 Transparency</h4>
                  <p class="text-sm text-green-50">Clear pricing, verified sellers, and trusted transactions</p>
                </div>
                <div class="bg-white/10 p-4 rounded-lg backdrop-blur">
                  <h4 class="font-semibold mb-2">🌱 Sustainability</h4>
                  <p class="text-sm text-green-50">Supporting local farmers and sustainable agriculture</p>
                </div>
                <div class="bg-white/10 p-4 rounded-lg backdrop-blur">
                  <h4 class="font-semibold mb-2">⚡ Efficiency</h4>
                  <p class="text-sm text-green-50">Seamless ordering and fast delivery to your doorstep</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

     
      <section id="contact" class="bg-white py-16 sm:py-24 lg:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl text-center mb-12">
            <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Contact Us</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
          </div>

          <div class="grid lg:grid-cols-3 gap-8 mb-12">
           
            <div class="bg-gradient-to-br from-green-50 to-green-100 p-8 rounded-lg shadow-md border-l-4 border-green-500">
              <div class="flex items-center mb-4">
                <div class="bg-green-500 text-white rounded-full p-3 mr-4">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                  </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">Email</h3>
              </div>
              <p class="text-gray-700 font-medium">mike4love1212@gmail.com</p>
              <p class="text-gray-600 text-sm mt-2">We'll get back to you within 24 hours</p>
            </div>

            <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-lg shadow-md border-l-4 border-blue-500">
              <div class="flex items-center mb-4">
                <div class="bg-blue-500 text-white rounded-full p-3 mr-4">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                  </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">Phone</h3>
              </div>
              <p class="text-gray-700 font-medium">+234 (0) 80-87679902</p>
              <p class="text-gray-600 text-sm mt-2">Monday - Friday, 9AM - 6PM WAT</p>
            </div>

            <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-lg shadow-md border-l-4 border-purple-500">
              <div class="flex items-center mb-4">
                <div class="bg-purple-500 text-white rounded-full p-3 mr-4">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">Office</h3>
              </div>
              <p class="text-gray-700 font-medium">Nasarawa, Nigeria</p>
              <p class="text-gray-600 text-sm mt-2">Wing Commander Abdullahi Vocational and Skill center</p>
            </div>
          </div>


          <div class="mx-auto max-w-3xl bg-gradient-to-br from-slate-50 to-slate-100 rounded-lg shadow-lg p-8 lg:p-12">
            <div id="message-alert" class="mb-4 hidden p-4 rounded-lg text-sm font-medium"></div>
            <form id="contactForm" action="contact_process.php" method="POST" class="space-y-6">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                  <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">Full Name</label>
                  <input type="text" id="name" name="name" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" placeholder="Enter Name">
                </div>
                <div>
                  <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">Email Address</label>
                  <input type="email" id="email" name="email" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" placeholder="@example.com">
                </div>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                  <label for="phone" class="block text-sm font-semibold text-gray-900 mb-2">Phone Number</label>
                  <input type="tel" id="phone" name="phone" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" placeholder="+234 (0) 803-456-7890">
                </div>
                <div>
                  <label for="subject" class="block text-sm font-semibold text-gray-900 mb-2">Subject</label>
                  <input type="text" id="subject" name="subject" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" placeholder="How can we help?">
                </div>
              </div>

              <div>
                <label for="category" class="block text-sm font-semibold text-gray-900 mb-2">Inquiry Category</label>
                <select id="category" name="category" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                  <option value="">Select a category</option>
                  <option value="general">General Inquiry</option>
                  <option value="support">Customer Support</option>
                  <option value="seller">Seller Support</option>
                  <option value="partnership">Partnership</option>
                  <option value="feedback">Feedback</option>
                </select>
              </div>

              <div>
                <label for="message" class="block text-sm font-semibold text-gray-900 mb-2">Message</label>
                <textarea id="message" name="message" rows="6" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" placeholder="Tell us more about your inquiry..."></textarea>
              </div>

              <div class="flex items-center">
                <input type="checkbox" id="terms" name="terms" required class="w-4 h-4 text-green-500 rounded focus:ring-green-500 border-gray-300">
                <label for="terms" class="ml-2 text-sm text-gray-600">I agree to the terms and conditions</label>
              </div>

              <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold py-3 rounded-lg hover:from-green-600 hover:to-green-700 transition duration-200 shadow-md hover:shadow-lg">
                Send Message
              </button>
            </form>

            <script>
              document.getElementById('contactForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                submitBtn.disabled = true;
                submitBtn.textContent = 'Sending...';
                
                fetch('contact_process.php', {
                  method: 'POST',
                  body: formData
                })
                .then(response => response.json())
                .then(data => {
                  const alertDiv = document.getElementById('message-alert');
                  
                  if (data.status === 'success') {
                    alertDiv.className = 'mb-4 p-4 rounded-lg text-sm font-medium bg-green-100 text-green-800 border border-green-300';
                    this.reset();
                  } else {
                    alertDiv.className = 'mb-4 p-4 rounded-lg text-sm font-medium bg-red-100 text-red-800 border border-red-300';
                  }
                  
                  alertDiv.textContent = data.message;
                  alertDiv.classList.remove('hidden');
                  
                  // Scroll to alert
                  alertDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                  
                  // Reset button
                  submitBtn.disabled = false;
                  submitBtn.textContent = originalText;
                  
                  // Hide alert after 5 seconds
                  setTimeout(() => {
                    alertDiv.classList.add('hidden');
                  }, 5000);
                })
                .catch(error => {
                  const alertDiv = document.getElementById('message-alert');
                  alertDiv.className = 'mb-4 p-4 rounded-lg text-sm font-medium bg-red-100 text-red-800 border border-red-300';
                  alertDiv.textContent = 'An error occurred. Please try again.';
                  alertDiv.classList.remove('hidden');
                  
                  submitBtn.disabled = false;
                  submitBtn.textContent = originalText;
                  
                  setTimeout(() => {
                    alertDiv.classList.add('hidden');
                  }, 5000);
                });
              });
            </script>
          </div>
        </div>
      </section>

       <?php
    include("./footer/footer.php");
    ?>
</body>
</html>