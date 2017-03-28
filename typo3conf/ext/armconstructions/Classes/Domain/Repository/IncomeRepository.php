<?php
namespace ARM\Armconstructions\Domain\Repository;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * The repository for Incomes
 */
class IncomeRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * 
     * @param \ARM\Armconstructions\Domain\Model\Client $client
     * @param int $project
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function getByClientProject(\ARM\Armconstructions\Domain\Model\Client $client = NULL, $project = NULL) {
        
        if ($client instanceof \ARM\Armconstructions\Domain\Model\Client) {
            $query = $this->createQuery();
            $constraints[] = $query->equals('hidden', 0);
            $constraints[] = $query->equals('client', $client->getUid());
            
            if (isset($project)) {
                $constraints[] = $query->equals('project', $project);
            }
            $query->matching(
               $query->logicalAnd($constraints)
            );

            $query->setOrderings(array('pdate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));

            return $query->execute();
        }
        
    }
    
}