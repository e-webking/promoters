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
 * ProjectController
 */
class ProjectController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * projectRepository
     *
     * @var \ARM\Armconstructions\Domain\Repository\ProjectRepository
     * @inject
     */
    protected $projectRepository = NULL;
    
    /**
     *
     * @var \ARM\Armconstructions\Domain\Repository\MaterialRepository
     * @inject
     */
    protected $materialRepository = NULL;

    /**
     *
     * @var \ARM\Armconstructions\Domain\Repository\SupplierRepository 
     * @inject
     */
    protected $supplierRepository = NULL;
    
    /**
     *
     * @var \ARM\Armconstructions\Domain\Repository\PaymentRepository
     * @inject
     */
    protected $paymentRepository = NULL;
    
    /**
     * landlordRepository
     *
     * @var \ARM\Armconstructions\Domain\Repository\LandlordRepository
     * @inject
     */
    protected $landlordRepository = NULL;
    
    /**
     * clientRepository
     *
     * @var \ARM\Armconstructions\Domain\Repository\ClientRepository
     * @inject
     */
    protected $clientRepository = NULL;
    
    /**
     * incomeRepository
     *
     * @var \ARM\Armconstructions\Domain\Repository\IncomeRepository
     * @inject
     */
    protected $incomeRepository = NULL;

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
        $projects = $this->projectRepository->findByAgent($this->agent);
        $this->view->assign('projects', $projects);
    }
    
    /**
     * action show
     *
     * @param \ARM\Armconstructions\Domain\Model\Project $project
     * @return void
     */
    public function showAction(\ARM\Armconstructions\Domain\Model\Project $project)
    {
        $landlords = $this->landlordRepository->findByProject($project);
        $clients = $this->clientRepository->findByProject($project);
        $suppliers = $this->supplierRepository->findByProject($project);
        
        $this->view->assign('suppliers', $suppliers);
        $this->view->assign('landlords', $landlords);
        $this->view->assign('clients', $clients);
        $this->view->assign('project', $project);
        $this->view->assign('pageid', $this->settings['projectList']);
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
     * @param \ARM\Armconstructions\Domain\Model\Project $newProject
     * @return void
     */
    public function createAction(\ARM\Armconstructions\Domain\Model\Project $newProject)
    {
        $this->addFlashMessage('Project created successfully', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->projectRepository->add($newProject);
        $this->redirect('list');
    }
    
    /**
     * action edit
     *
     * @param \ARM\Armconstructions\Domain\Model\Project $project
     * @ignorevalidation $project
     * @return void
     */
    public function editAction(\ARM\Armconstructions\Domain\Model\Project $project)
    {
        $this->view->assign('agent', $this->agent);
        $this->view->assign('project', $project);
    }
    
    /**
     * action update
     *
     * @param \ARM\Armconstructions\Domain\Model\Project $project
     * @return void
     */
    public function updateAction(\ARM\Armconstructions\Domain\Model\Project $project)
    {
        $this->addFlashMessage('Project updated successfully', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->projectRepository->update($project);
        $this->redirect('list');
    }
    
    /**
     * action predel
     *
     * @param \ARM\Armconstructions\Domain\Model\Project $project
     * @ignorevalidation $project
     * @return void
     */
    public function predelAction(\ARM\Armconstructions\Domain\Model\Project $project)
    {
        $this->view->assign('project', $project);
    }
    
    /**
     * action delete
     *
     * @param \ARM\Armconstructions\Domain\Model\Project $project
     * @return void
     */
    public function deleteAction(\ARM\Armconstructions\Domain\Model\Project $project)
    {
        $this->addFlashMessage('Project removed successfully', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->projectRepository->remove($project);
        $this->redirect('list');
    }
    
    /**
     * action addmat
     *
     * @return void
     */
    public function addmatAction(\ARM\Armconstructions\Domain\Model\Project $project)
    {
        
        $suppliers = $this->supplierRepository->findByProject($project);
        
        $this->view->assign('suppliers', $suppliers);
        $this->view->assign('project', $project);
        $this->view->assign('agent', $this->agent);

    }
    
    /**
     * 
     */
    public function initializeCreatematAction()
    {
        if (isset($this->arguments['expense'])) {            
            $this->arguments['expense']->getPropertyMappingConfiguration()->forProperty('sdate')->setTypeConverterOption(
                'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,
                'd-m-Y'
            );
        }
    }
    
    /**
     * action createmat
     * @param \ARM\Armconstructions\Domain\Model\Material $expense
     * @return void
     */
    public function creatematAction(\ARM\Armconstructions\Domain\Model\Material $expense)
    {
        $this->addFlashMessage('Expense added successfully', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->materialRepository->add($expense);
        $project = $expense->getProject();
        $project->addMaterial($expense);
        $this->projectRepository->update($project);
        
        $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager')->persistAll();
        $this->redirect('show', NULL, NULL, array('project' => $project->getUid()));

    }
    
    /**
     * action editmat
     * @param \ARM\Armconstructions\Domain\Model\Material $expense
     * @ignorevalidation $expense
     * @return void
     */
    public function editmatAction(\ARM\Armconstructions\Domain\Model\Material $expense)
    {
        $project = $expense->getProject();
        $suppliers = $this->supplierRepository->findByProject($project);
        
        $this->view->assign('suppliers', $suppliers);
        $this->view->assign('project', $expense->getProject());
        $this->view->assign('agent', $this->agent);
        $this->view->assign('expense', $expense);
    }
    
    /**
     * 
     */
    public function initializeUpdatematAction()
    {
        if (isset($this->arguments['expense'])) {            
            $this->arguments['expense']->getPropertyMappingConfiguration()->forProperty('sdate')->setTypeConverterOption(
                'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,
                'd-m-Y'
            );
        }
    }
    
    /**
     * action updatemat
     * @param  \ARM\Armconstructions\Domain\Model\Material $expense
     * @return void
     */
    public function updatematAction(\ARM\Armconstructions\Domain\Model\Material $expense)
    {
        $this->addFlashMessage('Expense updated successfully', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->materialRepository->update($expense);
        $this->redirect('show',  NULL, NULL, array('project' => $expense->getProject()));
    }
    
    /**
     * 
     * @param \ARM\Armconstructions\Domain\Model\Material $expense
     */
    public function predelmatAction(\ARM\Armconstructions\Domain\Model\Material $expense) {
        
        $this->view->assign('expense', $expense);
    }
    
    
    /**
     * action delmat
     * @param \ARM\Armconstructions\Domain\Model\Material $expense $name Description
     * @return void
     */
    public function delmatAction(\ARM\Armconstructions\Domain\Model\Material $expense)
    {
        $project = $expense->getProject();
        $this->addFlashMessage('Expense removed successfully', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->materialRepository->remove($expense);
        $this->redirect('show',  NULL, NULL, array('project' => $project));
    }
    
    /**
     * action addpay
     * @param \ARM\Armconstructions\Domain\Model\Project $project
     * @return void
     */
    public function addpayAction(\ARM\Armconstructions\Domain\Model\Project $project)
    {
        $suppliers = $this->supplierRepository->findByProject($project);
        $landlords = $this->landlordRepository->findByAgent($this->agent);
        
        $this->view->assign('suppliers', $suppliers);
        $this->view->assign('landlords', $landlords);
        $this->view->assign('project', $project);
        $this->view->assign('agent', $this->agent);
    }
    
    /**
     * 
     */
    public function initializeCreatepayAction()
    {
        if (isset($this->arguments['payment'])) {            
            $this->arguments['payment']->getPropertyMappingConfiguration()->forProperty('pdate')->setTypeConverterOption(
                'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,
                'd-m-Y'
            );
        }
    }
    
    /**
     * action createpay
     *
     * @param \ARM\Armconstructions\Domain\Model\Payment $payment
     * @return void
     */
    public function createpayAction(\ARM\Armconstructions\Domain\Model\Payment $payment)
    {
        $this->addFlashMessage('Payment added successfully', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->paymentRepository->add($payment);
        $project = $payment->getProject();
        $project->addPayment($payment);
        $this->projectRepository->update($project);
        
        $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager')->persistAll();
        $this->redirect('show', NULL, NULL, array('project' => $project->getUid()));
    }
    
    /**
     * action editpay
     * @param \ARM\Armconstructions\Domain\Model\Payment $payment
     * @return void
     */
    public function editpayAction(\ARM\Armconstructions\Domain\Model\Payment $payment)
    {
        $project = $payment->getProject();
        $suppliers = $this->supplierRepository->findByProject($project);
        $landlords = $this->landlordRepository->findByAgent($this->agent);
        
        $this->view->assign('suppliers', $suppliers);
        $this->view->assign('landlords', $landlords);
        $this->view->assign('project', $payment->getProject());
        $this->view->assign('agent', $this->agent);
        $this->view->assign('payment', $payment);
    }
    
    /**
     * 
     */
    public function initializeUpdatepayAction()
    {
        if (isset($this->arguments['payment'])) {            
            $this->arguments['payment']->getPropertyMappingConfiguration()->forProperty('pdate')->setTypeConverterOption(
                'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,
                'd-m-Y'
            );
        }
    }
    
    /**
     * action updatepay
     * @param \ARM\Armconstructions\Domain\Model\Payment $payment
     * @return void
     */
    public function updatepayAction(\ARM\Armconstructions\Domain\Model\Payment $payment)
    {
        $this->addFlashMessage('Payment updated successfully', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->paymentRepository->update($payment);
        $this->redirect('show',  NULL, NULL, array('project' => $payment->getProject()));
    }
    
    /**
     * 
     * @param \ARM\Armconstructions\Domain\Model\Payment $payment
     */
    public function predelpayAction(\ARM\Armconstructions\Domain\Model\Payment $payment) {
        
        $this->view->assign('payment', $payment);
    }
    
    /**
     * action delpay
     * @param \ARM\Armconstructions\Domain\Model\Payment $payment
     * @return void
     */
    public function delpayAction(\ARM\Armconstructions\Domain\Model\Payment $payment)
    {
        $project = $payment->getProject();
        $this->addFlashMessage('Payment removed successfully', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->paymentRepository->remove($payment);
        $this->redirect('show',  NULL, NULL, array('project' => $project));
    }

    
    /**
     * action addpay
     * @param \ARM\Armconstructions\Domain\Model\Project $project
     * @return void
     */
    public function addincomeAction(\ARM\Armconstructions\Domain\Model\Project $project)
    {
        $clients = $this->clientRepository->findByAgent($this->agent);
        
        $this->view->assign('clients', $clients);
        $this->view->assign('project', $project);
        $this->view->assign('agent', $this->agent);
    }
    
    /**
     * 
     */
    public function initializeCreateincomeAction()
    {
        if (isset($this->arguments['income'])) {            
            $this->arguments['income']->getPropertyMappingConfiguration()->forProperty('pdate')->setTypeConverterOption(
                'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,
                'd-m-Y'
            );
        }
    }
    
    /**
     * action createpay
     *
     * @param \ARM\Armconstructions\Domain\Model\Income $income
     * @return void
     */
    public function createincomeAction(\ARM\Armconstructions\Domain\Model\Income $income)
    {
        $this->addFlashMessage('Income added successfully', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->incomeRepository->add($income);
        $project = $income->getProject();
        $project->addIncome($income);
        $this->projectRepository->update($project);
        
        $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager')->persistAll();
        $this->redirect('show', NULL, NULL, array('project' => $project->getUid()));
    }
    
    /**
     * action editpay
     * @param \ARM\Armconstructions\Domain\Model\Income $income
     * @return void
     */
    public function editincomeAction(\ARM\Armconstructions\Domain\Model\Income $income)
    {
        $clients = $this->clientRepository->findByAgent($this->agent);
        
        $this->view->assign('clients', $clients);
        $this->view->assign('project', $income->getProject());
        $this->view->assign('agent', $this->agent);
        $this->view->assign('income', $income);
    }
    
    /**
     * 
     */
    public function initializeUpdateincomeAction()
    {
        if (isset($this->arguments['income'])) {            
            $this->arguments['income']->getPropertyMappingConfiguration()->forProperty('pdate')->setTypeConverterOption(
                'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,
                'd-m-Y'
            );
        }
    }
    
    /**
     * action updatepay
     * @param \ARM\Armconstructions\Domain\Model\Income $income
     * @return void
     */
    public function updateincomeAction(\ARM\Armconstructions\Domain\Model\Income $income)
    {
        $this->addFlashMessage('Income updated successfully', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->incomeRepository->update($income);
        $this->redirect('show',  NULL, NULL, array('project' => $income->getProject()));
    }
    
     /**
     * 
     * @param \ARM\Armconstructions\Domain\Model\Income $income
     */
    public function predelincomeAction(\ARM\Armconstructions\Domain\Model\Income $income) {
        
        $this->view->assign('income', $income);
    }
    
    /**
     * action delpay
     * @param \ARM\Armconstructions\Domain\Model\Income $income
     * @return void
     */
    public function delincomeAction(\ARM\Armconstructions\Domain\Model\Income $income)
    {
        $project = $income->getProject();
        $this->addFlashMessage('Income removed successfully', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->incomeRepository->remove($income);
        $this->redirect('show',  NULL, NULL, array('project' => $project));
    }
}