
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
        <span class="actionTitle">Champs obligatoires</span></br>
        <p>
            <label for="champ">Titre</label>
            <input type="text" name="titre" id="titre" value="titre" ></br></br>
            <label for="champ">Artiste</label>
            <input type="text" name="artiste" id="artiste" value="artiste"></br></br>
            <label for="champ">Section</label>
            <input type="text" name="section" id="section" value="section"></br></br>
            <label for="champ">Lien</label>
            <input type="text" name="link" id="link" value="link" ></br></br>
            <label for="champ">Restriction</label>
            <input type="text" name="restriction" id="restriction" value="aucune" ></br>
        </p>
    </p>
    <p>
        <button type="submit" name="insertContenu" class="btn" >Valider</button>
    </p>
</form>
</div>