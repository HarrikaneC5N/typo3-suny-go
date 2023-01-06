<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "typo3_console".
 *
 * Auto generated 22-07-2022 15:50
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'TYPO3 Console',
  'description' => 'A reliable and powerful command line interface for TYPO3 CMS',
  'category' => 'cli',
  'state' => 'stable',
  'clearCacheOnLoad' => 0,
  'author' => 'Helmut Hummel',
  'author_email' => 'info@helhum.io',
  'author_company' => 'helhum.io',
  'version' => '6.7.4',
  'constraints' => 
  array (
    'depends' => 
    array (
      'php' => '7.2.0-7.4.99',
      'typo3' => '10.4.22-10.4.99',
      'extbase' => '10.4.22-10.4.99',
      'extensionmanager' => '10.4.22-10.4.99',
      'fluid' => '10.4.22-10.4.99',
      'install' => '10.4.22-10.4.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
  'uploadfolder' => true,
  'clearcacheonload' => true,
);

