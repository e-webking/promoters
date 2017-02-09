<?php
namespace ARM\Armconstructions\Controller;

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
 * SupplierController
 */
class SupplierController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * supplierRepository
     *
     * @var \ARM\Armconstructions\Domain\Repository\SupplierRepository
     * @inject
     */
    protected $supplierRepository = NULL;
    
    /**
     *
     * @var int
     */
    protected $agent;

    /**
     * Set the FE user
     */
    public function initializeAction()
    {
        $this->agent = $GLOBALS['TSFE']->fe_user->user['uid']; 
    }
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $suppliers = $this->supplierRepository->findAll();
        $this->view->assign('suppliers', $suppliers);
    }
    
    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
        
    }
    
    /**
     * action create
     *
     * @param \ARM\Armconstructions\Domain\Model\Supplier $newSupplier
     * @return void
     */
    public function createAction(\ARM\Armconstructions\Domain\Model\Supplier $newSupplier)
    {
        $this->addFlashMessage('Supplier created', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->supplierRepository->add($newSupplier);
        $this->redirect('list');
    }
    
    /**
     * action edit
     *
     * @param \ARM\Armconstructions\Domain\Model\Supplier $supplier
     * @ignorevalidation $supplier
     * @return void
     */
    public function editAction(\ARM\Armconstructions\Domain\Model\Supplier $supplier)
    {
        $this->view->assign('supplier', $supplier);
    }
    
    /**
     * action update
     *
     * @param \ARM\Armconstructions\Domain\Model\Supplier $supplier
     * @return void
     */
    public function updateAction(\ARM\Armconstructions\Domain\Model\Supplier $supplier)
    {
        $this->addFlashMessage('Supplier updated successfully', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->supplierRepository->update($supplier);
        $this->redirect('list');
    }
    
    /**
     * action predel
     *
     * @param \ARM\Armconstructions\Domain\Model\Supplier $supplier
     * @ignorevalidation $supplier
     * @return void
     */
    public function predelAction(Armconstructions\Domain\Model\Supplier $supplier)
    {
        $this->view->assign('supplier', $supplier);
    }
    
    /**
     * action delete
     *
     * @param \ARM\Armconstructions\Domain\Model\Supplier $supplier
     * @return void
     */
    public function deleteAction(\ARM\Armconstructions\Domain\Model\Supplier $supplier)
    {
        $this->addFlashMessage('Supplier removed', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->supplierRepository->remove($supplier);
        $this->redirect('list');
    }

}