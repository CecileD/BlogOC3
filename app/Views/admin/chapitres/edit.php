<form method="post" style="display: inline;">
    <?= $form->input('titre_chapitre', 'Titre du chapitre'); ?>
    <?= $form->input('contenu_chapitre', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('statut_id', 'Statut', $statuts); ?>
    <button class="btn btn-success">Sauvegarder les changements</button>
</form>