<x-app-layout>
       {{-- main title on page --}}
    <div class="pageMainTitle text-center">
        <p class="text-3xl md:text-4xl lg:text-5xl">Vegetarian <span class="text-1xl md:text-2xl lg:text-3xl">from True Pasta Lovers</span> </p>
        @auth
        @if(Auth::user()->isAdmin())
            <a href="{{ url('/') }}" class="text-md">+ new</a>
        @endif
    @endauth
  </div>
    </x-app-layout>