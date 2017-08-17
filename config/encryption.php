<?php

/**
 *Hachage du mot de passe auteur en utilisant l'algorythme par défaut de PHP (BCRYPT lors du développement)
 */

echo password_hash("demo", PASSWORD_DEFAULT);