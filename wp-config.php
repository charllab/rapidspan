<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link    https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// Project root path
$root = dirname(__DIR__);

// Composer autoloader
require_once $root.'/../vendor/autoload.php';

// dotenv
$dotenv = new Dotenv\Dotenv($root.'/../');
$dotenv->load();

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_DATABASE'));

/** MySQL database username */
define('DB_USER', getenv('DB_USER'));

/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('DB_SERVER'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME', getenv('SITE_URL'));
define('WP_SITEURL', getenv('SITE_URL').'/wordpress');

define('DISALLOW_FILE_EDIT', true);

define('WP_AUTO_UPDATE_CORE', true);

define('DISABLE_WP_CRON', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '5!inwN9;o:;D>L$mvDhfJpDVPq2}cm(^r#[]-4D?6R9#zV]g[N0VasCQ7I,suPV`');
define('SECURE_AUTH_KEY',  'S!bbg?|0!0vEN?vfj=L=lm!5U+-oyL[m7Q!9--aXG(Za|Ozw^Wvq#RcX~ADF!]F,');
define('LOGGED_IN_KEY',    '+Cwf(p7:j]&2XfVfb]WMN<f@lS$*fRDbgz>=K)NV-YEME_Is-gS7677N.Gs-+5%D');
define('NONCE_KEY',        'lu1u8p#8FOVP<U`&)./uE^SSWmZVO_}a~|BgUGR/U]qVt>&M&LML-,>_TfdWRw7L');
define('AUTH_SALT',        '1&K1B5EFqn:-g3h3AgEr}BsP0n7l@{g^K]|D[ZOa.CWKo+(|o:|t1?:Z[e %E#99');
define('SECURE_AUTH_SALT', 'ZEZ^`jvTMLs(Z,!]oH,cJ5SB?-p; R7g/|qca$`M)*E|{RD+a(!]1-H9lF|Xn7&m');
define('LOGGED_IN_SALT',   'yX%akDUGcK}|o|{z0F:AP+#!D*J7R}!vH)R;@F#.}{IVb+-Ln%H([!vw1-uV#lTm');
define('NONCE_SALT',       'sa2:*l}6=YtpN<7<]!^`^.jbzLSva:?W|f1y936GWpPK;n,6m-8lRZdtt1g#<~K`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = getenv('DB_TABLE_PREFIX');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', filter_var(getenv('DEV_MODE'), FILTER_VALIDATE_BOOLEAN));

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__).'/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH.'wp-settings.php');
