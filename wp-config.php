<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'transports_blog' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'XgL?K2ne5E][*#6XocI7=Vz:XkCW0zYvjlmQS1 M)??#L*N5xnWAT7;?3LEe8Ou(' );
define( 'SECURE_AUTH_KEY',  'sCGU_,0<ALWQ1ro.mfPdbgHi9o]FaBX)8+7[_p~u{KhwO]4rX_0Vtn;?jg,BD4)9' );
define( 'LOGGED_IN_KEY',    'IUk)}-|^%v|<lMm^X#@zN]CmNy;rZ]^4xdEaN=<z0G^icCN/rqF9/K+]4vEj<vSV' );
define( 'NONCE_KEY',        'hZ:pXDu,ce.*A9|jmCdu^M5A!I^jH-Z2cP|x&|sJUj%rX[~NF^DhBEF0h^;~3^Do' );
define( 'AUTH_SALT',        'E-CIIGWSQGx(sO(.[E~LF4j3y{a9|d(yi?jiTe~:__hO0B/M54?pX.s781n,(j@=' );
define( 'SECURE_AUTH_SALT', '<;xq&/L#(dCg(J;u~DLihmB^ttM&tFHDqQ7wzEw]|k DpEcT$gv6r!4!q,Ymg0Bs' );
define( 'LOGGED_IN_SALT',   ']I!agXPy+)imOkc[iGXq2?8um47)5%|_N}qV*#3c-)uNsDr?u-*5k g${Y|*Cq6Z' );
define( 'NONCE_SALT',       'gQdqeE lbC+lsN*IZ+df(fllfES+j)b<ydd+RXAv!U4V]Bk{z9W5rCmafmQ77?ZT' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'ts_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
