<?php
set_time_limit(0);

include_once './classes/coolindexer.class.php';
include_once './classes/coolsearch.class.php';
include_once './classes/ranker.class.php';
include_once './classes/coolindex.class.php';
include_once './classes/cooldocumentstore.class.php';

define('INDEXLOCATION', dirname(__FILE__) . '/index/');
define('DOCUMENTLOCATION', dirname(__FILE__) . '/documents/');

if(!file_exists('./documents/')){
    mkdir('./documents/');
}

if(!file_exists('./index/')){
    mkdir('./index/');
}
$index = new coolindex();
$docstore = new cooldocumentstore();
$ranker = new ranker();
$indexer = new coolindexer($index, $docstore, $ranker);
$search = new coolsearch($index, $docstore, $ranker);

$indexer->index(array('Setting the AuthzUserAuthoritative directive explicitly to Off allows for user authorization to be passed on to lower level modules (as defined in the modules.c files) if there is no user matching the supplied userID.'));
$indexer->index(array('The Allow directive affects which hosts can access an area of the server. Access can be controlled by hostname, IP address, IP address range, or by other characteristics of the client request captured in environment variables.'));
$indexer->index(array('This directive allows access to the server to be restricted based on hostname, IP address, or environment variables. The arguments for the Deny directive are identical to the arguments for the Allow directive.'));
$indexer->index(array('The Order directive, along with the Allow and Deny directives, controls a three-pass access control system. The first pass processes either all Allow or all Deny directives, as specified by the Order directive. The second pass parses the rest of the directives (Deny or Allow). The third pass applies to all requests which do not match either of the first two.'));
$indexer->index(array('The AuthDBDUserPWQuery specifies an SQL query to look up a password for a specified user.  The users ID will be passed as a single string parameter when the SQL query is executed.  It may be referenced within the query statement using a %s format specifier.'));
$indexer->index(array('The AuthDBDUserRealmQuery specifies an SQL query to look up a password for a specified user and realm. The users ID and the realm, in that order, will be passed as string parameters when the SQL query is executed.  They may be referenced within the query statement using %s format specifiers.'));

$toindex = array();
for($j=0;$j<10; $j++) {
	$toindex[] = 'If you can watch much television, then being dead will be a cinch. Actually, watching television and surfing the Internet are really excellent practice for being dead.';
}
$indexer->index($toindex);

?>
