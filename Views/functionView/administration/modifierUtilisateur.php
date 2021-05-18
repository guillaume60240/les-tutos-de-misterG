
<div class="utilisateurs">
<form action="#" method="post">
    <p>
        <span class="actionTitle">Selection de l'utilisateur par: </span></br>
        <p>
            <label for="recherche">ID</label>
            <input type="radio" name="recherche" id="id" value="id" checked>
            <label for="recherche">pseudo</label>
            <input type="radio" name="recherche" id="pseudo" value="pseudo" >
            <label for="recherche">mail</label>
            <input type="radio" name="recherche" id="mail" value="mail" > </br>
            <p>
                <input type="text" name="rechercheClef" id="clef" placeholder="Entrer la clef"> </br>
            </p>
        </p>
    </p>
    <p>
        <span class="actionTitle">Champ à modifier:</span></br>
        <p>
            <label for="champ">Pseudo</label>
            <input type="radio" name="champ" id="pseudo" value="pseudo" >
            <label for="champ">Role</label>
            <input type="radio" name="champ" id="role" value="role" checked>
            <label for="champ">Mail</label>
            <input type="radio" name="champ" id="mail" value="mail" ></br>
        </p>
    </p>
    <p>
        <span class="actionTitle">Nouvelle valeur:</span></br>
        <p>
            <input type="text" name="valeur" id="valeur" placeholder="valeur"> </br>
        </p>
    </p>
    <p>
        <button type="submit" name="update" class="btn" >Valider</button>
    </p>
</form>
</div>