<?php
return array (
  0 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Backend\\CreateBackendAdminUserCommand',
    'name' => 'backend:createadmin',
    'nameSpacedName' => 'typo3_console:backend:createadmin',
    'service' => false,
  ),
  1 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Backend\\LockBackendCommand',
    'replace' => 
    array (
      0 => 'TYPO3\\CMS\\Backend\\Command\\LockBackendCommand',
    ),
    'name' => 'backend:lock',
    'nameSpacedName' => 'typo3_console:backend:lock',
    'service' => false,
  ),
  2 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Backend\\LockBackendForEditorsCommand',
    'name' => 'backend:lockforeditors',
    'nameSpacedName' => 'typo3_console:backend:lockforeditors',
    'service' => false,
  ),
  3 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Backend\\UnlockBackendCommand',
    'replace' => 
    array (
      0 => 'TYPO3\\CMS\\Backend\\Command\\UnlockBackendCommand',
    ),
    'name' => 'backend:unlock',
    'nameSpacedName' => 'typo3_console:backend:unlock',
    'service' => false,
  ),
  4 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Backend\\UnlockBackendForEditorsCommand',
    'name' => 'backend:unlockforeditors',
    'nameSpacedName' => 'typo3_console:backend:unlockforeditors',
    'service' => false,
  ),
  5 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Cache\\CacheFlushCommand',
    'runLevel' => 'buildEssentialSequence',
    'name' => 'cache:flush',
    'nameSpacedName' => 'typo3_console:cache:flush',
    'service' => false,
  ),
  6 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Cache\\CacheFlushGroupsCommand',
    'name' => 'cache:flushgroups',
    'nameSpacedName' => 'typo3_console:cache:flushgroups',
    'service' => false,
  ),
  7 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Cache\\CacheFlushTagsCommand',
    'name' => 'cache:flushtags',
    'nameSpacedName' => 'typo3_console:cache:flushtags',
    'service' => false,
  ),
  8 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Cache\\CacheListGroupsCommand',
    'name' => 'cache:listgroups',
    'nameSpacedName' => 'typo3_console:cache:listgroups',
    'service' => false,
  ),
  9 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Configuration\\ConfigurationRemoveCommand',
    'runLevel' => 'buildBasicRuntimeSequence',
    'name' => 'configuration:remove',
    'nameSpacedName' => 'typo3_console:configuration:remove',
    'service' => false,
  ),
  10 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Configuration\\ConfigurationSetCommand',
    'runLevel' => 'buildBasicRuntimeSequence',
    'name' => 'configuration:set',
    'nameSpacedName' => 'typo3_console:configuration:set',
    'service' => false,
  ),
  11 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Configuration\\ConfigurationShowCommand',
    'name' => 'configuration:show',
    'nameSpacedName' => 'typo3_console:configuration:show',
    'service' => false,
  ),
  12 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Configuration\\ConfigurationShowActiveCommand',
    'name' => 'configuration:showactive',
    'nameSpacedName' => 'typo3_console:configuration:showactive',
    'service' => false,
  ),
  13 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Configuration\\ConfigurationShowLocalCommand',
    'runLevel' => 'buildBasicRuntimeSequence',
    'name' => 'configuration:showlocal',
    'nameSpacedName' => 'typo3_console:configuration:showlocal',
    'service' => false,
  ),
  14 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Database\\DatabaseExportCommand',
    'runLevel' => 'buildBasicRuntimeSequence',
    'name' => 'database:export',
    'nameSpacedName' => 'typo3_console:database:export',
    'service' => false,
  ),
  15 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Database\\DatabaseImportCommand',
    'runLevel' => 'buildBasicRuntimeSequence',
    'name' => 'database:import',
    'nameSpacedName' => 'typo3_console:database:import',
    'service' => false,
  ),
  16 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Database\\DatabaseUpdateSchemaCommand',
    'runLevel' => 'buildBasicRuntimeSequence',
    'bootingSteps' => 
    array (
      0 => 'helhum.typo3console:persistence',
    ),
    'name' => 'database:updateschema',
    'nameSpacedName' => 'typo3_console:database:updateschema',
    'service' => false,
  ),
  17 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Extension\\DumpAutoloadCommand',
    'runLevel' => 'buildEssentialSequence',
    'replace' => 
    array (
      0 => 'TYPO3\\CMS\\Core\\Command\\DumpAutoloadCommand',
    ),
    'name' => 'dumpautoload',
    'nameSpacedName' => 'typo3_console:dumpautoload',
    'service' => false,
  ),
  18 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Extension\\ExtensionListCommand',
    'schedulable' => false,
    'replace' => 
    array (
      0 => 'TYPO3\\CMS\\Core\\Command\\ExtensionListCommand',
    ),
    'name' => 'extension:list',
    'nameSpacedName' => 'typo3_console:extension:list',
    'service' => false,
  ),
  19 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Extension\\ExtensionSetupCommand',
    'name' => 'extension:setup',
    'nameSpacedName' => 'typo3_console:extension:setup',
    'service' => false,
  ),
  20 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Extension\\ExtensionSetupActiveCommand',
    'name' => 'extension:setupactive',
    'nameSpacedName' => 'typo3_console:extension:setupactive',
    'service' => false,
  ),
  21 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Frontend\\FrontendRequestCommand',
    'name' => 'frontend:request',
    'nameSpacedName' => 'typo3_console:frontend:request',
    'service' => false,
  ),
  22 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Install\\InstallSetupCommand',
    'runLevel' => 'buildEssentialSequence',
    'name' => 'install:setup',
    'nameSpacedName' => 'typo3_console:install:setup',
    'service' => false,
  ),
  23 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Install\\InstallGeneratePackageStatesCommand',
    'runLevel' => 'buildEssentialSequence',
    'name' => 'install:generatepackagestates',
    'nameSpacedName' => 'typo3_console:install:generatepackagestates',
    'service' => false,
  ),
  24 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Install\\InstallFixFolderStructureCommand',
    'runLevel' => 'buildEssentialSequence',
    'name' => 'install:fixfolderstructure',
    'nameSpacedName' => 'typo3_console:install:fixfolderstructure',
    'service' => false,
  ),
  25 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Install\\InstallExtensionSetupIfPossibleCommand',
    'runLevel' => 'buildEssentialSequence',
    'name' => 'install:extensionsetupifpossible',
    'nameSpacedName' => 'typo3_console:install:extensionsetupifpossible',
    'service' => false,
  ),
  26 => 
  array (
    'class' => 'Helhum\\Typo3Console\\Command\\Install\\InstallEnvironmentAndFoldersCommand',
    'vendor' => 'typo3_console',
    'runLevel' => 'buildEssentialSequence',
    'name' => 'install:environmentandfolders',
    'nameSpacedName' => 'typo3_console:install:environmentandfolders',
    'service' => false,
  ),
  27 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Install\\InstallDatabaseConnectCommand',
    'runLevel' => 'buildEssentialSequence',
    'name' => 'install:databaseconnect',
    'nameSpacedName' => 'typo3_console:install:databaseconnect',
    'service' => false,
  ),
  28 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Install\\InstallDatabaseSelectCommand',
    'runLevel' => 'buildEssentialSequence',
    'name' => 'install:databaseselect',
    'nameSpacedName' => 'typo3_console:install:databaseselect',
    'service' => false,
  ),
  29 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Install\\InstallDatabaseDataCommand',
    'runLevel' => 'buildBasicRuntimeSequence',
    'bootingSteps' => 
    array (
      0 => 'helhum.typo3console:persistence',
    ),
    'name' => 'install:databasedata',
    'nameSpacedName' => 'typo3_console:install:databasedata',
    'service' => false,
  ),
  30 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Install\\InstallDefaultConfigurationCommand',
    'runLevel' => 'buildBasicRuntimeSequence',
    'bootingSteps' => 
    array (
      0 => 'helhum.typo3console:persistence',
    ),
    'name' => 'install:defaultconfiguration',
    'nameSpacedName' => 'typo3_console:install:defaultconfiguration',
    'service' => false,
  ),
  31 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Install\\InstallActionNeedsExecutionCommand',
    'runLevel' => 'buildEssentialSequence',
    'name' => 'install:actionneedsexecution',
    'nameSpacedName' => 'typo3_console:install:actionneedsexecution',
    'service' => false,
  ),
  32 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\InstallTool\\LockInstallToolCommand',
    'runLevel' => 'buildEssentialSequence',
    'name' => 'install:lock',
    'nameSpacedName' => 'typo3_console:install:lock',
    'service' => false,
  ),
  33 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\InstallTool\\UnlockInstallToolCommand',
    'runLevel' => 'buildEssentialSequence',
    'name' => 'install:unlock',
    'nameSpacedName' => 'typo3_console:install:unlock',
    'service' => false,
  ),
  34 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Upgrade\\UpgradeCheckExtensionCompatibilityCommand',
    'runLevel' => 'buildEssentialSequence',
    'name' => 'upgrade:checkextensioncompatibility',
    'nameSpacedName' => 'typo3_console:upgrade:checkextensioncompatibility',
    'service' => false,
  ),
  35 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Upgrade\\UpgradeCheckExtensionConstraintsCommand',
    'runLevel' => 'buildEssentialSequence',
    'name' => 'upgrade:checkextensionconstraints',
    'nameSpacedName' => 'typo3_console:upgrade:checkextensionconstraints',
    'service' => false,
  ),
  36 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Upgrade\\UpgradeListCommand',
    'replace' => 
    array (
      0 => 'TYPO3\\CMS\\Install\\Command\\UpgradeWizardListCommand',
    ),
    'name' => 'upgrade:list',
    'nameSpacedName' => 'typo3_console:upgrade:list',
    'service' => false,
  ),
  37 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Upgrade\\UpgradePrepareCommand',
    'runLevel' => 'buildEssentialSequence',
    'name' => 'upgrade:prepare',
    'nameSpacedName' => 'typo3_console:upgrade:prepare',
    'service' => false,
  ),
  38 => 
  array (
    'vendor' => 'typo3_console',
    'class' => 'Helhum\\Typo3Console\\Command\\Upgrade\\UpgradeRunCommand',
    'replace' => 
    array (
      0 => 'TYPO3\\CMS\\Install\\Command\\UpgradeWizardRunCommand',
    ),
    'name' => 'upgrade:run',
    'nameSpacedName' => 'typo3_console:upgrade:run',
    'service' => false,
  ),
);