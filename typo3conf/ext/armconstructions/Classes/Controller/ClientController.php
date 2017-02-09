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
 * ClientController
 */
class ClientController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * projectRepository
     *
     * @var \ARM\Armconstructions\Domain\Repository\ProjectRepository
     * @inject
     */
    protected $projectRepository = NULL;
    
    /**
     * clientRepository
     *
     * @var \ARM\Armconstructions\Domain\Repository\ClientRepository
     * @inject
     */
    protected $clientRepository = NULL;
    
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
        $clients = $this->clientRepository->findByAgent($this->agent);
        $this->view->assign('clients', $clients);
    }
    
    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
        if ($this->request->hasArgument('project')) {
            $this->view->assign('project', $this->request->getArgument('project'));
        }
        if ($this->request->hasArgument('pageid')) {
            $this->view->assign('returnpage', $this->request->getArgument('pageid'));
        }
        if ($this->request->hasArgument('pageaction')) {
            $this->view->assign('pageaction', $this->request->getArgument('pageaction'));
        }
        $projects = $this->projectRepository->findByAgent($this->agent);
        $this->view->assign('projects', $projects);
        $this->view->assign('agent', $this->agent);
    }
    
    /**
     * action create
     *
     * @param \ARM\Armconstructions\Domain\Model\Client $client
     * @return void
     */
    public function createAction(\ARM\Armconstructions\Domain\Model\Client $client)
    {
        $project = $client->getProject();
        $this->addFlashMessage('Customer created successfully', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->clientRepository->add($client);
        $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager')->persistAll();
        
        if ($this->request->hasArgument('returnpage')) {
            
            $pageid = $this->request->getArgument('returnpage');
           
            if ($this->request->hasArgument('pageaction')) {
                $pageaction = $this->request->getArgument('pageaction');
            }
            $link = $this->uriBuilder->setTargetPageUid($pageid)
                       ->setArguments(array('tx_armconstructions_project' => array('controller' => 'Project', 'action' => $pageaction, 'project' => $project)))
                       ->build();
            $this->redirectToUri($link);
            
        }
    }
    
    /**
     * action edit
     *
     * @param \ARM\Armconstructions\Domain\Model\Client $client
     * @ignorevalidation $client
     * @return void
     */
    public function editAction(\ARM\Armconstructions\Domain\Model\Client $client)
    {
        if ($this->request->hasArgument('project')) {
            $this->view->assign('project', $this->request->getArgument('project'));
        }
        if ($this->request->hasArgument('pageid')) {
            $this->view->assign('returnpage', $this->request->getArgument('pageid'));
        }
        if ($this->request->hasArgument('pageaction')) {
            $this->view->assign('pageaction', $this->request->getArgument('pageaction'));
        }
        
        $projects = $this->projectRepository->findByAgent($this->agent);
        $this->view->assign('projects', $projects);
        $this->view->assign('client', $client);
    }
    
    /**
     * action update
     *
     * @param \ARM\Armconstructions\Domain\Model\Client $client
     * @return void
     */
    public function updateAction(\ARM\Armconstructions\Domain\Model\Client $client)
    {
        $this->addFlashMessage('Customer updated successfully', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->clientRepository->update($client);
        $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager')->persistAll();
       
        if ($this->request->hasArgument('returnpage')) {
            
            $pageid = $this->request->getArgument('returnpage');
            $project = $client->getProject();
            
            if ($this->request->hasArgument('pageaction')) {
                $pageaction = $this->request->getArgument('pageaction');
            }
            
            $link = $this->uriBuilder->setTargetPageUid($pageid)
                       ->setArguments(array('tx_armconstructions_project' => array('controller' => 'Project', 'action' => $pageaction, 'project' => $project)))
                       ->build();
            $this->redirectToUri($link);
        }
    }
    
    /**
     * action predel
     *
     * @param \ARM\Armconstructions\Domain\Model\Client $client
     * @ignorevalidation $client
     * @return void
     */
    public function predelAction(\ARM\Armconstructions\Domain\Model\Client $client)
    {
        if ($this->request->hasArgument('project')) {
            $this->view->assign('project', $this->request->getArgument('project'));
        }
        if ($this->request->hasArgument('pageid')) {
            $this->view->assign('returnpage', $this->request->getArgument('pageid'));
        }
        if ($this->request->hasArgument('pageaction')) {
            $this->view->assign('pageaction', $this->request->getArgument('pageaction'));
        }
        
        $this->view->assign('client', $client);
    }
    
    /**
     * action delete
     *
     * @param \ARM\Armconstructions\Domain\Model\Client $client
     * @return void
     */
    public function deleteAction(\ARM\Armconstructions\Domain\Model\Client $client)
    {
        $project = $client->getProject();
        
        $this->addFlashMessage('Customer removed successfully.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->clientRepository->remove($client);
        $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager')->persistAll();
        
        if ($this->request->hasArgument('returnpage')) {
            
            $pageid = $this->request->getArgument('returnpage');

            if ($this->request->hasArgument('pageaction')) {
                $pageaction = $this->request->getArgument('pageaction');
            }
            
            $link = $this->uriBuilder->setTargetPageUid($pageid)
                       ->setArguments(array('tx_armconstructions_project' => array('controller' => 'Project', 'action' => $pageaction, 'project' => $project)))
                       ->build();
            $this->redirectToUri($link);
            
        }
    }

}