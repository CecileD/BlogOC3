<h1 xmlns="http://www.w3.org/1999/html"><?= $chapitres->titre_chapitre; ?></h1>
<div class="col-sm-12">
    <p style="color: black"><em><?php $date= $chapitres->date_creation_chapitre;
                             list($date, $time) = explode(" ", $date);
                             list($year, $month, $day) = explode("-", $date);
                             list($hour, $min, $sec) = explode(":", $time);
                             echo $date = "$day/$month/$year $time"; ?></em></p>

    <p><?= $chapitres->contenu_chapitre; ?></p>

    <p><a href="index.php?p=chapitres.index">Retour à la liste des chapitres disponibles</a></br></p>

    <h2>Ajouter un commentaire</h2>
    <form method="post">

        <?= $form->input('sujet_commentaire', 'Le sujet et/ou votre pseudo'); ?>
        <?= $form->input('contenu_comment', 'Contenu', ['type' => 'textarea']); ?>

        <button class="btn btn-success"></br></button>
    </form>

    <h2>Vos commentaires</h2>
    <table class="table">
        <thead>
        <tr>
            <td>Pseudo/Titre</td>
            <td>Contenu</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($commentaires as $commentaire): ?>
            <tr>
                <td><?= $commentaire->sujet_commentaire; ?></td>
                <td><?= $commentaire->contenu_comment; ?></td>
                <td>
                    <form action="?p=commentaires.signaler" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?=$commentaire->id ?>">
                        <input type="hidden" name="signalement" value="<?=$commentaire->signalement=1 ?>">
                        <button type="submit" class="btn btn-danger">Signaler</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </<br>
    <h2>Ajouter un commentaire</h2>
    <form method="post">

        <?= $form->input('sujet_commentaire', 'Le sujet et/ou votre pseudo'); ?>
        <?= $form->input('contenu_comment', 'Contenu', ['type' => 'textarea']); ?>

        <button class="btn btn-success">Sauvegarder</button>
    </form>
</div>


