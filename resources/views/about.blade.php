<x-app-layout>
    {{-- main title on page --}}
    <div class="pageMainTitle text-center mt-8">
        <p class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900">About Our Website</p>
        <span class="text-lg md:text-xl lg:text-2xl text-gray-600">from True Pasta Lovers</span>
    </div>
    
    {{-- section about the site --}}
    <div class="max-w-6xl mx-auto px-6 md:px-12 lg:px-16 mt-5 text-center">
        <p class="mt-8 text-md md:text-md text-gray-700 leading-relaxed">
            True Pasta Lovers is dedicated to bringing together pasta enthusiasts from all over the world.
            Explore recipes, cooking techniques, and the deep-rooted history of this beloved dish.
            Whether you're a home cook or a professional chef, you'll find inspiration in our content.
        </p>
    </div>
    
    {{-- about section with two columns --}}
    <div class="max-w-6xl mx-auto px-6 md:px-12 lg:px-24 mt-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
            <!-- Left Column: Text -->
            <div class="text-center md:text-left">
                <h2 class="text-2xl md:text-3xl lg:text-2xl font-semibold text-gray-800">The History of Pasta</h2>
                <p class="mt-4 text-md md:text-md text-gray-700 leading-relaxed">
                    Pasta has a rich history that spans centuries, originating from ancient civilizations.
                    While many associate pasta with Italy, its origins trace back to ancient China,
                    where early forms of noodles were crafted. Through the centuries, pasta traveled
                    along trade routes, evolving in different cultures and culinary traditions.
                </p>
                <p class="mt-4 text-md md:text-md text-gray-700 leading-relaxed">
                    By the 13th century, pasta had firmly established itself in Italian cuisine,
                    with various shapes and recipes emerging across regions. From fresh handmade
                    pasta in Bologna to dried varieties in Naples, each type carried its own
                    unique story and tradition.
                </p>
            </div>

            <!-- Right Column: Image -->
            <div class="mt-8 md:mt-0">
                <img src="/siteImages/pasta2.jpg" alt="Pasta History" class="mx-auto rounded-xl shadow-xl max-w-full">
            </div>
        </div>
    </div>
</x-app-layout>
