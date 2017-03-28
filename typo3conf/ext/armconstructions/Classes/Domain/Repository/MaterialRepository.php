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
 * The repository for Materials
 */
class MaterialRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    protected $defaultOrderings = array('sdate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING);
    
    /**
     * 
     * @param int $supplier
     * @param int $project
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function getBySupplierProject($supplier, $project) {
     
        $query = $this->createQuery();
        $constraints[] = $query->equals('hidden', 0);
        $constraints[] = $query->equals('supplier', $supplier);
        $constraints[] = $query->equals('project', $project);
       
        $query->matching(
           $query->logicalAnd($constraints)
        );
        
        $query->setOrderings(array('sdate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
       
        return $query->execute();
    }
    
    /**
     * 
     * @param int $supplier
     * @param int $project
     * @return int
     */
    public function totalBySupplierProject($supplier, $project) {
        
        $constraints = "deleted=0 AND hidden=0 AND supplier=$supplier AND project=$project";

        $rec = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow('SUM(amount) as amt', 
               'tx_armconstructions_domain_model_material', $constraints);
       
        return $rec['amt'];
    }
}