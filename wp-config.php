<?php
/**
 * Οι βασικές ρυθμίσεις για to WordPress
 *
 * Το wp-config.php χρησιμοποιείται από τη δέσμη ενεργειών κατά τη
 * διαδικασία εγκατάστασης. Δεν χρειάζεται να χρησιμοποιήσετε τον ιστότοπο, μπορείτε
 * να αντιγράψετε αυτό το αρχείο ως "wp-config.php" και να συμπληρώσετε τις παραμέτρους.
 *
 * Αυτό το αρχείο περιέχει τις ακόλουθες ρυθμίσεις:
 *
 * * MySQL ρυθμίσεις
 * * Κλειδιά ασφαλείας
 * * Πρόθεμα πινάκων βάσης δεδομένων
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL ρυθμίσεις - Μπορείτε να λάβετε αυτές τις πληροφορίες από τον φιλοξενητή σας ** //
/** Το όνομα της βάσης δεδομένων του WordPress */
define( 'DB_NAME', 'petros' );

/** Ψευδώνυμο χρήσης MySQL */
define( 'DB_USER', 'root' );

/** Συνθηματικό βάσης δεδομένων MySQL */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Charset της βάσηςη δεδομένων που θα χρησιμοποιηθεί στη δημιουργία των πινάκων. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Τύπος Collate της βάσης δεδομένων. Μην το αλλάζετε αν έχετε αμφιβολίες. */
define('DB_COLLATE', '');

/**#@+
 * Μοναδικά κλειδιά πιστοποίησης και Salts.
 *
 * Αλλάξτε τα σε διαφορετικά μοναδικές φράσεις!
 * Μπορείτε να δημιουργήσετε χρησιμοποιώντας {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Μπορείτε να τα αλλάξετε οποτεδήποτε για να ακυρώσετε τα υπάρχοντα cookies. Θα υποχρεώσει όλους χρήστες να επανασυνδεθούν.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '[,LswLjx4%kW|d]Uw}^RbT=x8>}k~y?uwvdDWIX&ZxDr}hxWc55Od/GTPX;C;gF,' );
define( 'SECURE_AUTH_KEY',  'VFkjoV(xp:Z}T{#u11y?Ju[XJGKCZ28r|]=nWw3+ &t5h3 X3$#+I5DR8Bhj@!ir' );
define( 'LOGGED_IN_KEY',    ':^AETW: h+}y/82}#iPnKf8}a;)y{NnSK!ITtcxQQOviW-9(D@@*Z-ofWX+L -lT' );
define( 'NONCE_KEY',        'rk/:]%K|Vc RG$y75B(-?qDYi0ELHUmsH,cuF4S2C)/dp?)Ni1-O,rgZl75^SA^t' );
define( 'AUTH_SALT',        'm5Ik*_13~,ywgHRoQB1-{x^v*%0Z{ChAp+Y3d,s<FgEU,l1d33t@};gK;>r;2zNV' );
define( 'SECURE_AUTH_SALT', 'WW]R0fKdc7c.>qo}s0BUjJ:Us [Jr~@=D])Ic.0/opAh,b7,v{d=Wdqe/8o!(/7c' );
define( 'LOGGED_IN_SALT',   '+/ZzT3S;1)C{rW&)$=ha/gu42CM6zI*qm~nLFh<FTRSjUGmt4ZtNXLT4BRC%#?)<' );
define( 'NONCE_SALT',       'h Ywc{|3tny:G8 uzx zLzK*</p$m7h5C*&9Q}P{~kWrq.e7,K=kH[}d:F<ZZL=g' );

/**#@-*/

/**
 * Πρόθεμα Πίνακα Βάσης Δεδομένων του WordPress.
 *
 * Μπορείτε να έχετε πολλαπλές εγκαταστάσεις σε μια βάση δεδομένων αν δώσετε σε κάθε μία
 * ένα μοναδικό πρόθεμα. Μόνο αριθμοί, γράμματα και κάτω παύλα παρακαλούμε!
 */
$table_prefix = 'wp_';

/**
 * Για προγραμματιστές: Κατάσταση Αποσφαλμάτωσης WordPress (Debugging Mode).
 *
 * Αλλάξτε το σε true για να ενεργοποιήσετε την εμφάνισης ειδοποιήσεων για τη διαδικασία ανάπτυξης.
 * Η χρήση WP_DEBUG προτείνεται για τους δημιουργούς προσθέτων και θεμάτων
 * στο περιβάλλον ανάπτυξης τους.
 *
 * Για πληροφορίες για άλλες σταθερές που μπορούν να χρησιμοποιηθούν για αποσφαλμάτωση,
 * επισκεφθείτε το Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* πρόσθεσα μια εντολή για να ξαναφτιάχνει τη βάση δεδομένων όταν χαλάει. */	
define('WP_ALLOW_REPAIR', true);

/* Αυτό είναι όλο, σταματήστε γράφετε! Χαρούμενο blogging. */

/** Η απόλυτη διαδρομή τον κατάλογο του WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Ορίζει τις μεταβλητές και τα περιλαμβανόμενα αρχεία WordPress. */
require_once(ABSPATH . 'wp-settings.php');
