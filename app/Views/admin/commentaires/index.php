<h1>Administrer les commentaires</h1>

<p><a href="index.php?p=admin.chapitres.index">Retour à l'administration des chapitres</a></p>
<table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Titre</td>
                <td>Actions</td>
                <td>Chapitre</td>
                <td>Signalement (1:oui)</td>
            </tr>
        </thead>

        <tbody>
            <?php foreach($items as $commentaire): ?>
            <tr>
                <td><?= $commentaire->id; ?></td>
                <td><?= $commentaire->sujet_commentaire; ?></td>
                <td><?= $commentaire->contenu_comment; ?></td>
                <td><?= $commentaire->chapitre_id; ?></td>
                <td><?= $commentaire->signalement; ?></td>
                <td>
                    <a class="btn btn-success" href="?p=admin.commentaires.edit&id=<?= $commentaire->id; ?>">Editer</a>
                    <form action="?p=admin.commentaires.delete" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $commentaire->id ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<p><a href="index.php?p=admin.chapitres.index">Retour à l'administration des chapitres</a></p>


