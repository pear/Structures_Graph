<?php

// Keep tests from running twice when calling this file directly via PHPUnit.
$call_main = false;
if (strpos($_SERVER['argv'][0], 'phpunit') === false) {
    // Called via php, not PHPUnit.  Pass the request to PHPUnit.
    if (!defined('PHPUnit_MAIN_METHOD')) {
        /** The test's main method name */
        define('PHPUnit_MAIN_METHOD', 'Structures_Graph_AllTests::main');
        $call_main = true;
    }
}

require_once dirname(__FILE__) . '/helper.inc';

class Structures_Graph_AllTests
{
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('Structures_Graph Tests');

        $dir = new GlobIterator(dirname(__FILE__) . '/*Test.php');
        $suite->addTestFiles($dir);

        return $suite;
    }
}

if ($call_main) {
    Structures_Graph_AllTests::main();
}
