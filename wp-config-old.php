<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'novelcr1_wpdevtemplate');

/** MySQL database username */
define('DB_USER', 'novelcr1_wdt');

/** MySQL database password */
define('DB_PASSWORD', 'v7exzxEhXCXT6wbvKZmRFJj');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'ti7gpljfkm9hlpdmfmc6tiu7hhuhn8lccygv55hgdyvgolk1hj7krmtdsfday6lc');
define('SECURE_AUTH_KEY',  'i5bxwc2aokg17utmhppyhxxtk7ss89jpsevljnzzokc81fedpznweegaelikwjxj');
define('LOGGED_IN_KEY',    'vazrkwdden2q2qm04cw6zhe4pvqbhjx0vmer2lzkbdo3iedtigm6ysbxv78muz4k');
define('NONCE_KEY',        'hjpccnjgfmg1mfjcdps0i5opklcvulbruqexcrorshcmuixxffvewlxyycqibuwg');
define('AUTH_SALT',        'msbntvkh2zor3psuqteqq95yrmlufmldaqvzwu1u1sfpjdubmoziu85xlhqprtsw');
define('SECURE_AUTH_SALT', 'k6dpsvgts5tb1w3wjymu1vvrmhpr6r4xvekivoahhv8rkq55cw8bixzlfksl6ii4');
define('LOGGED_IN_SALT',   '7aedqdrplamnglpblj8hqrrzicxu3bl4xfucqa3dyfdaro8u0ugz2soq7zqqqx52');
define('NONCE_SALT',       'wgpdqw1ea7on4plgelbq8snaodgnbpdoqjzentajbq6thadiwm2knpippyw5n15d');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
//define('WP_DEBUG', false);

// DEBUG
// Enable WP_DEBUG mode
define('WP_DEBUG', true);

// Enable Debug logging to the /wp-content/debug.log file
define('WP_DEBUG_LOG', true);

// Disable display of errors and warnings 
define('WP_DEBUG_DISPLAY', true);
@ini_set('display_errors',0);

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define('SCRIPT_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

