<?php
/**
 * Created by PhpStorm.
 * User: CecileDagneaux
 * Date: 15/08/2017
 * Time: 15:05
 */

/**
 * Nous voulons juste hacher notre mot de passe en utiliant l'algorithme par défaut.
 * Actuellement, il s'agit de BCRYPT, ce qui produira un résultat sous forme de chaîne de
 * caractères d'une longueur de 60 caractères.
 *
 * Gardez à l'esprit que DEFAULT peut changer dans le temps, aussi, vous devriez vous
 * y préparer en autorisant un stockage supérieur à 60 caractères (255 peut être un bon choix)
 */

echo password_hash("demo", PASSWORD_DEFAULT);