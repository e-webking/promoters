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
 * PaymentController
 */
class PaymentController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * paymentRepository
     *
     * @var \ARM\Armconstructions\Domain\Repository\PaymentRepository
     * @inject
     */
    protected $paymentRepository = NULL;
    
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
        $payments = $this->paymentRepository->findAll();
        $this->view->assign('payments', $payments);
    }
    
    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
         $this->view->assign('agent', $this->agent);
    }
    
    /**
     * action create
     *
     * @param \ARM\Armconstructions\Domain\Model\Payment $newPayment
     * @return void
     */
    public function createAction(\ARM\Armconstructions\Domain\Model\Payment $newPayment)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->paymentRepository->add($newPayment);
        $this->redirect('list');
    }
    
    /**
     * action edit
     *
     * @param \ARM\Armconstructions\Domain\Model\Payment $payment
     * @ignorevalidation $payment
     * @return void
     */
    public function editAction(\ARM\Armconstructions\Domain\Model\Payment $payment)
    {
        $this->view->assign('payment', $payment);
    }
    
    /**
     * action update
     *
     * @param \ARM\Armconstructions\Domain\Model\Payment $payment
     * @return void
     */
    public function updateAction(\ARM\Armconstructions\Domain\Model\Payment $payment)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->paymentRepository->update($payment);
        $this->redirect('list');
    }
    
    /**
     * action delete
     *
     * @param \ARM\Armconstructions\Domain\Model\Payment $payment
     * @return void
     */
    public function deleteAction(\ARM\Armconstructions\Domain\Model\Payment $payment)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->paymentRepository->remove($payment);
        $this->redirect('list');
    }

}