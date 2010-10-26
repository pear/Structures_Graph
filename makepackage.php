<?php
/**
 * Make package file for the Structures_Graph package.
 */

ini_set('display_errors', true);

/**
 * Require the PEAR_PackageFileManager2 classes, and other
 * necessary classes for package.xml file creation.
 */
require_once 'PEAR/PackageFileManager2.php';
require_once 'PEAR/PackageFileManager/File.php';
require_once 'PEAR/Task/Postinstallscript/rw.php';
require_once 'PEAR/Config.php';
require_once 'PEAR/Frontend.php';

/**
 * @var PEAR_PackageFileManager
 */
PEAR::setErrorHandling(PEAR_ERROR_DIE);
chdir(dirname(__FILE__));
$pfm = PEAR_PackageFileManager2::importOptions('package.xml', array(
//$pfm = new PEAR_PackageFileManager2();
//$pfm->setOptions(array(
    'packagedirectory'  => dirname(__FILE__),
    'baseinstalldir'    => '/',
    'filelistgenerator' => 'svn',
    'ignore'            => array('package.xml',
                                 '.project',
                                 '.buildpath',
                                 '*.tgz',
                                 'makepackage.php',
                                 '.cache'),
    'simpleoutput'      => true,
    'roles'             => array('php'=>'php'),
    'exceptions'        => array()
));
$pfm->setPackage('Structures_Graph');
$pfm->setPackageType('php'); // this is a PEAR-style php script package
$pfm->setSummary('Graph datastructure manipulation library');
$pfm->setDescription('Structures_Graph is a package for creating and manipulating graph datastructures. It allows building of directed
and undirected graphs, with data and metadata stored in nodes. The library provides functions for graph traversing
as well as for characteristic extraction from the graph topology.');
$pfm->setChannel('pear.php.net');
$pfm->setAPIStability('stable');
$pfm->setReleaseStability('stable');
$pfm->setAPIVersion('1.0.3');
$pfm->setReleaseVersion('1.0.4');
$pfm->setNotes('
Bugfix Release:
* Bug #17108 BasicGraph::test_directed_degree fails on PHP 5 [clockwerx]
');

$pfm->updateMaintainer('helper','saltybeagle','Brett Bieber','brett.bieber@gmail.com');
$pfm->setLicense('LGPL License', '');
$pfm->clearDeps();
$pfm->setPhpDep('4.2.0');
$pfm->setPearinstallerDep('1.4.3');
$pfm->clearCompatible();
$pfm->addCompatiblePackage('PEAR', 'pear.php.net', '1.5.0RC3', '1.9.1');
$pfm->generateContents();
if (isset($_SERVER['argv']) && $_SERVER['argv'][1] == 'make') {
    $pfm->writePackageFile();
} else {
    $pfm->debugPackageFile();
}
?>
