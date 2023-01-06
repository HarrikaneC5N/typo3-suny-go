<?php
namespace Emagineurs\EPackage\Command;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Database\ConnectionPool;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FlushbddCommand extends Command
{
    public function execute(InputInterface $input, OutputInterface $output) {
        $connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionByName('Default');

        $tableListObject = $connection->executeQuery('SHOW TABLES;');
        $tableListArray = $tableListObject->fetchAll();

        foreach($tableListArray as $tableInfo){
            $table = reset($tableInfo);
            $isCacheTable = preg_match('/^(cf_|cache_)/', $table);

            if($isCacheTable === 1) {
                try{
                    $connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable($table)->truncate($table);
                    echo 'La table ' . $table . ' a été vidé.' . PHP_EOL;
                } catch (\Exception $e) {
                    continue;
                }
            }
        }
        return 1;
    }
}
