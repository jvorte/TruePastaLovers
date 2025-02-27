<x-app-layout>


    @guest
    <p>Είστε επισκέπτης, μπορείτε να πλοηγηθείτε ελεύθερα!</p>
@endguest
@auth
    @if(Auth::user()->isUser())
        <button>Προσθήκη στα Favorites</button>
    @endif
@endauth
@auth
    @if(Auth::user()->isAdmin())
        <a href="{{ route('recipe.create') }}">Create</a>
        <a href="{{ route('recipe.edit', $recipe->id) }}">Edit</a>
        <form method="POST" action="{{ route('recipe.destroy', $recipe->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    @endif
@endauth

@auth
    <p>Συνδεδεμένος ως: {{ Auth::user()->name }} (Role: {{ Auth::user()->role }})</p>
@endauth



    </x-app-layout>