<form method="post" style="display: inline;">
    <?= $form->input('sujet_commentaire', 'Le sujet et/ou votre pseudo'); ?>
    <?= $form->input('contenu_comment', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->input('signalement', '0 OK; 1 SIGNALE'); ?>
    <?= $form->input('chapitre_id', 'Chapitre concerné'); ?>
    <button class="btn btn-success">Sauvegarder</button>
</form>
