<div class="row">
    <div class="col-sm-12">
        <?php foreach ($chapitres as $chapitre): ?>

            <h2><a href="<?= $chapitre->url ?>"><?= $chapitre->titre_chapitre; ?></a></h2>

            <p style="color:black"><em><?php $date= $chapitre->date_creation_chapitre;
                    list($date, $time) = explode(" ", $date);
                    list($year, $month, $day) = explode("-", $date);
                    list($hour, $min, $sec) = explode(":", $time);
                    echo $date = "$day/$month/$year $time"; ?></em></p>

            <p><?= $chapitre->extrait; ?></p>

        <?php endforeach; ?>
    </div>
</div>