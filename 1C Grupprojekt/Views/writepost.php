<form method="POST" action="../Includes/writepost_functions.php">
    <b>Titel:</b><br />
    <input type="text" name="title" require><br />
    <br />
    <b> Kategori: </b> <br />
    <select name="category" id="category">
    <option value="Välj">Välj Kategori..</option>
    <option value="Ideer">Företaget</option>
    <option value="Nyheter">Nyheter</option>
    <option value="Produkter">Produkter</option>
    <option value="Tyck till">Tyck till</option>
    </select>
    <br />
    <br />
    <b> Inlägg: </b> <br />
    <textarea name="description" cols="60" rows="10" required> Skriv ditt inlägg här..</textarea><br />
    <br />
    <b>Bifoga bild:</b><br />
    <input type="file" name="image" id="fileToUpload"><br />
    <br />
    <input type="submit" value="Publicera" />
    <br />
    </form>



