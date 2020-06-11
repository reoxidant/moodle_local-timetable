<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'moodle';
$CFG->dbuser    = 'root';
$CFG->dbpass    = 1234;
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => '',
  'dbsocket' => '',
  'dbcollation' => 'utf8mb4_unicode_ci',
);

/*$CFG->dbtype    = 'pgsql';      // 'pgsql', 'mariadb', 'mysqli', 'mssql', 'sqlsrv' or 'oci'
$CFG->dblibrary = 'native';     // 'native' only at the moment
$CFG->dbhost    = 'localhost';  // eg 'localhost' or 'db.isp.com' or IP
$CFG->dbname    = 'postgres';     // database name, eg moodle
$CFG->dbuser    = 'postgres';   // your database username
$CFG->dbpass    = 1234;   // your database password
$CFG->prefix    = 'mdl_';       // prefix to use for all table names
$CFG->dboptions = array(
    'dbpersist' => false,       // should persistent database connections be
    //  used? set to 'false' for the most stable
    //  setting, 'true' can improve performance
    //  sometimes
    'dbsocket'  => false,       // should connection via UNIX socket be used?
    //  if you set it to 'true' or custom path
    //  here set dbhost to 'localhost',
    //  (please note mysql is always using socket
    //  if dbhost is 'localhost' - if you need
    //  local port connection use '127.0.0.1')
    'dbport'    => getenv('DBPORT'),          // the TCP port number to use when connecting
    //  to the server. keep empty string for the
    //  default port
);*/

$CFG->wwwroot   = 'http://moodle.loc';
$CFG->dataroot  = 'C:\\OSPanel\\domains\\moodledata';
$CFG->admin     = 'admin';
$CFG->passwordsaltalt1 = ''; // пустой для входа админа с паролем 12345
$CFG->passwordsaltmain = 'оставить старый passwordsaltmain';


$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!

$CFG->phpunit_prefix = 'phpu_';
$CFG->phpunit_dataroot = 'C:\\OSPanel\\domains\\phpu_moodledata';

$CFG->dboptions = array (
    'logall'   => true,
    'logslow'  => 5,
    'logerrors'  => true,
);

$CFG->defaultblocks_override = 'calendar_month:news_items,calendar_upcoming,recent_activity';