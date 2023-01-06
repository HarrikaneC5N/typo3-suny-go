<?php

namespace Emagineurs\EXcellent\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;

class OrganizationRepository extends Repository
{
    public function findAll(){
        $query = $this->createQuery();

        $query->getQuerySettings()->setRespectStoragePage(FALSE);

        return $query->execute();
    }
}