<?php if($errors): ?>
    <div class="alert alert-danger">
        Identifiants incorrects
    </div>
<?php endif; ?>

<form method="post">
    <?= $form->input('pseudo_auteur', 'Pseudo'); ?>
    <?= $form->input('motdepasse_auteur', 'Mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-success">Envoyer</button>
</form>
