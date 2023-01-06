<?php

namespace Emagineurs\EXcellent\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;

class ProductRepository extends Repository
{

	public function findAll(){
		$query = $this->createQuery();

		$query->getQuerySettings()->setRespectStoragePage(FALSE);

		return $query->execute();
	}

	public function findProductsWithHugeStock(){
		$query = $this->createQuery();

		$query->getQuerySettings()->setRespectStoragePage(FALSE);
        $query->getQuerySettings()->setIgnoreEnableFields(true);
        $query->getQuerySettings()->setEnableFieldsToBeIgnored([
            'starttime'
        ]);
        
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($query->getQuerySettings(), 'TEST query settings');

        $constraint = [];

        $constraint[] = $query->greaterThanOrEqual('quantity', 100); // -> quantity >= 100
        $constraint[] = $query->logicalNot(
            $query->like('description', '%test%') // -> description NOT LIKE "%test%"
        );
        
        $constraint1 = $query->logicalAnd($constraint);
        $constraint2 = $query->like('name', "%zobor%");
        /*
            logicalAnd
            logicalOr
            logicalNot
        */
        
        $finalConstraint = $query->logicalOr(
            $constraint1,
            $constraint2
        );
        
        
        // WHERE (quantity >= 100) AND description LIKE "%test%") OR (name LIKE "%zobor%" )

        $query->matching($finalConstraint); // -> WHERE $contraint -> WHERE quantity >= 100

		return $query->execute();
	}

}