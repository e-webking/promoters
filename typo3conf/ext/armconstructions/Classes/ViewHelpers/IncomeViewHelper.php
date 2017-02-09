<?php
namespace ARM\Armconstructions\ViewHelpers;

class IncomeViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
     *
     * @param \int $project
     * @return \string
     */
    public function render($project) {
    
        if (isset($project)) {
            $rs = $GLOBALS['TYPO3_DB']->exec_SELECTquery('SUM(amount)', 'tx_armconstructions_domain_model_income', 
               'project='.$project);
            $rw = $GLOBALS['TYPO3_DB']->sql_fetch_row($rs);
       
            return intval($rw[0]) .'/-';
        }
        
        return '';
    }
}