<div class="row">
    <div class="col-sm-12">
        <?php foreach ($chapitres as $chapitre): ?>

            <h2><a href="<?= $chapitre->url ?>"><?= $chapitre->titre_chapitre; ?></a></h2>

            <p style="color:black"><em><?= $chapitre->date_creation_chapitre; ?></em></p>

            <p><?= $chapitre->extrait; ?></p>

        <?php endforeach; ?>
    </div>
</div>