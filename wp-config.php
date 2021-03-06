<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress - be sure to change these varibables each time!! */
define('DB_NAME', 'gopagoda');

/** MySQL database username */
define('DB_USER', 'elise');

/** MySQL database password */
define('DB_PASSWORD', 'Sv8Z9D3w');

/** MySQL hostname */
define('DB_HOST', '192.168.0.4:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Y>Knua^YT.sO6@glw|#%9q/h+h&fSIvv#X~JI74A3cH:q@xKL1/A:O9nde aN<gg');
define('SECURE_AUTH_KEY',  '#LqA72YH){`%b2@cz[sj@zEy|Bhsfs EIjt*9QE+*eH%,)`8;Uq`^jc?%H:@wgCG');
define('LOGGED_IN_KEY',    '_F;xG`(JDLsY1c`4f/+9v%~9>qyl`yN#Q[(][O)_4+&(cyvCz:/Q-++f k6bWt^,');
define('NONCE_KEY',        'sZiN4:Z~fnM)Y)+y@AA]4s[6J>^p<lc/T8!.5Sq@2~+eh>UThC6QHU2InJd|e.n5');
define('AUTH_SALT',        'i+tLj-x!HZRjS4OyQ)nyg&Uwi<w]6xw;}lT3f-*^`m_`BlMP@JLg0Wbe#gSw!7JO');
define('SECURE_AUTH_SALT', 'SSY<,u7yK~dBsVG-:]|(c&NZ%(]+|-!Y3*;2KEld)-K8W:MAA5Lk[:;I{2Kx#D|9');
define('LOGGED_IN_SALT',   'V+>BN2Yg^s&s|3-*,8vXWz}Xv^9A$]`P@)Fr9vtPngVNBiyGA2=}suRTdGH(f:f{');
define('NONCE_SALT',       '}9k)j|gV<r&WO52`_hM~fzP}E95(#nMJ+-iYvv]iT32UMqpQivE:[J>oLR-f>`A3');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
