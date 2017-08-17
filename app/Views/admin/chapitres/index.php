<h1>Administrer les chapitres</h1>

<p><a href="?p=admin.chapitres.add" class="btn btn-success">Ajouter</a></p>
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Titre du chapitre</td>
            <td>Extrait</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($chapitres as $chapitre): ?>
        <tr>
            <td><?= $chapitre->id; ?></td>
            <td><?= $chapitre->titre_chapitre; ?></td>
            <td><?= $chapitre->extrait; ?></td>
            <td>
                <a class="btn btn-success" href="?p=admin.chapitres.edit&id=<?= $chapitre->id; ?>">Editer</a>
                <form action="?p=admin.chapitres.delete" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $chapitre->id ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<p><a href="index.php?p=admin.commentaires.index">Aller à l'administration des commentaires</a></p>



