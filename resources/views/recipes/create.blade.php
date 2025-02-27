<form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="title">Title of Recipe:</label>
    <input type="text" name="title" id="title" required>
    <br>

    <label for="ingredients">Ingredients:</label>
    <textarea name="ingredients" id="ingredients" required></textarea>
    <br>

    <label for="instructions">Instructions:</label>
    <textarea name="instructions" id="instructions" required></textarea>
    <br>

    <label for="image">Image:</label>
    <input type="file" name="image" id="image">
    <br>

    <label for="type">Type:</label>
    <select name="type" id="type" required>
        <option value="1">Pasta</option>
        <option value="2">Vegetarian</option>
        <option value="3">Wines</option>
        <option value="4">Sweets</option>
    </select>
    <br>

    <button type="submit">Create Recipe</button>
</form>
