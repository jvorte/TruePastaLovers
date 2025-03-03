<x-app-layout>
    {{-- main title on page --}}
    <div class="pageMainTitle text-center py-10">
        <p class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900">Contact</p>
        <span class="text-xl md:text-2xl lg:text-2xl text-gray-600">from True Pasta Lovers</span>
    </div>

    @if(session('success'))
        <div class="text-green-500 text-center mb-5">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 px-20 items-center">
        {{-- Left Column (Image) --}}
        <div class="flex justify-center items-center">
            <img src="/siteImages/pasta3.png" alt="Pasta History" class="w-full  ">
            
        </div>

        {{-- Right Column (Text and Form) --}}
        <div class="text-gray-700">
      <h1 class="text-2xl md:text-3xl lg:text-2xl font-semibold text-gray-800">True Pasra Lovers Team</h1>
      <p class="mt-2">For any inquiries or comments, please feel free to reach out to us through the form below.
         We would be happy to assist you and respond to any questions as quickly as possible.</p>
            {{-- Contact Form --}}
            <div class="">
                <form action="/contact" method="POST">
                    @csrf
                
                    <!-- Name field -->
                    <div class="pt-2 mb-2">
                        <label for="name" class="block text-md font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" required class="mt-2 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <!-- Email field -->
                    <div class="mb-2">
                        <label for="email" class="block text-md font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" required class="mt-2 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <!-- Message field -->
                    <div class="mb-2">
                        <label for="message" class="block text-md font-medium text-gray-700">Message</label>
                        <textarea name="message" id="message" required rows="3" class="mt-2 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                    </div>

                    <!-- Submit button -->
                    <div class="mb-2">
                        <button type="submit" class="w-full bg-blue-500 text-white py-3 px-6 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    {{-- Footer --}}
    <div class="mt-10 text-center text-sm text-gray-500">
        <p>&copy; 2025 True Pasta Lovers. All rights reserved.</p>
    </div>
</x-app-layout>
