<?php

namespace Emagineurs\EXcellent\Controller;

use Emagineurs\EXcellent\Domain\Repository\ProductRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Database\ConnectionPool;


class StoreinventoryController extends ActionController
{
    private $productRepository;

    /**
     * Inject the prodct vruu
     * 
     * @param \Emagineurs\e_xcellent\Domain\Repository\ProductRepository $productRepository
     */
    public function injectProductRepository(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * function pour afficher toutes les elements dans "productRepository" à l'aide de la fonction "findAll"
     * 
     */
    public function listAction()
    {
        // $products = $this->productRepository->findAll();
        
        // $products = $this->productRepository->findProductsWithHugeStock();

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
				->getQueryBuilderForTable('tx_excellent_domain_model_product');
        // $queryBuilder->setRestrictions(GeneralUtility::makeInstance(FrontendRestrictionContainer::class));
        
        // WHERE ((quantity >= 100) AND description LIKE "%test%") OR (name LIKE "%zobor%")

        $requete = $queryBuilder
            ->select('name', 'quantity', 'description')
            ->from('tx_excellent_domain_model_product')
            ->where(
                $queryBuilder->expr()->gte('quantity', 100),
                $queryBuilder->expr()->like(
                    'description', 
                    $queryBuilder->createNamedParameter('%test%', \PDO::PARAM_STR)
                ),
            )
            ->orWhere(
                $queryBuilder->expr()->like(
                    'name', 
                    $queryBuilder->createNamedParameter('%zobor%', \PDO::PARAM_STR)
                )
            )
            ->execute();
            
        $products = [];
        $count = 0;
        while($row = $requete->fetch()){
            DebuggerUtility::var_dump($row, 'TEST $row');
            $products[$count] = $row;
            $products[$count]['totalprice'] = $row['quantity']*5;
            $count++;
        }


        $this->view->assign('products', $products);
    }
}