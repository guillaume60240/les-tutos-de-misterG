
<div class="utilisateurs">
<form action="#" method="post">
    <p>
        <span class="actionTitle">Selection du type de post: </span></br>
        <p>
            <label for="recherche">Video</label>
            <input type="radio" name="recherche" id="video" value="video">
            <label for="recherche">Partition</label>
            <input type="radio" name="recherche" id="partition" value="partition" >
        </p>
    </p>
    <p>
        <input type="text" name="rechercheClef" id="clef" placeholder="Entrer le nom"> </br>
    </p>
    <p>
        <span class="actionTitle">Champ à modifier:</span></br>
        <p>
            <label for="champ">Titre</label>
            <input type="radio" name="champ" id="titre" value="titre" >
            <label for="champ">Artiste</label>
            <input type="radio" name="champ" id="artiste" value="artiste">
            <label for="champ">Lien</label>
            <input type="radio" name="champ" id="link" value="link" >
            <label for="champ">Restriction</label>
            <input type="radio" name="champ" id="restriction" value="restriction" ></br>
        </p>
    </p>
    <p>
        <span class="actionTitle">Nouvelle valeur:</span></br>
        <p>
            <input type="text" name="valeur" id="valeur" placeholder="valeur"> </br>
        </p>
    </p>
    <p>
        <button type="submit" name="updateContenu" class="btn" >Valider</button>
    </p>
</form>
</div>