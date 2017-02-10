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
 * LandlordController
 */
class LandlordController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * projectRepository
     *
     * @var \ARM\Armconstructions\Domain\Repository\ProjectRepository
     * @inject
     */
    protected $projectRepository = NULL;
    
    /**
     * landlordRepository
     *
     * @var \ARM\Armconstructions\Domain\Repository\LandlordRepository
     * @inject
     */
    protected $landlordRepository = NULL;
    
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
        $landlords = $this->landlordRepository->findByAgent($this->agent);
        $this->view->assign('landlords', $landlords);
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
     * @param \ARM\Armconstructions\Domain\Model\Landlord $newLandlord
     * @return void
     */
    public function createAction(\ARM\Armconstructions\Domain\Model\Landlord $newLandlord)
    {
        $this->addFlashMessage('Landlord created successfully', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->landlordRepository->add($newLandlord);
        $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager')->persistAll();
         
        if ($this->request->hasArgument('returnpage')) {
            
            $pageid = $this->request->getArgument('returnpage');
            
            if ($this->request->hasArgument('project')) {
                $project = $this->request->getArgument('project');
            }
            
            if ($this->request->hasArgument('pageaction')) {
                $pageaction = $this->request->getArgument('pageaction');
            }
            if ($pageid != '') {
                $link = $this->uriBuilder->setTargetPageUid($pageid)
                           ->setArguments(array('tx_armconstructions_project' => array('controller' => 'Project', 'action' => $pageaction, 'project' => $project)))
                           ->build();
                $this->redirectToUri($link);
            } else {
                $this->redirect('list');
            }
            
        } else {
             $this->redirect('list');
        }
    }
    
    /**
     * action edit
     *
     * @param \ARM\Armconstructions\Domain\Model\Landlord $landlord
     * @ignorevalidation $landlord
     * @return void
     */
    public function editAction(\ARM\Armconstructions\Domain\Model\Landlord $landlord)
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
        $this->view->assign('landlord', $landlord);
    }
    
    /**
     * action update
     *
     * @param \ARM\Armconstructions\Domain\Model\Landlord $landlord
     * @return void
     */
    public function updateAction(\ARM\Armconstructions\Domain\Model\Landlord $landlord)
    {
        $this->addFlashMessage('Landlord record updated successfully.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->landlordRepository->update($landlord);
        
        if ($this->request->hasArgument('returnpage')) {
            
            $pageid = $this->request->getArgument('returnpage');
            
            
            $project = $landlord->getProject();
            
            if ($this->request->hasArgument('pageaction')) {
                $pageaction = $this->request->getArgument('pageaction');
            }
            if ($pageid != '') {
                $link = $this->uriBuilder->setTargetPageUid($pageid)
                       ->setArguments(array('tx_armconstructions_project' => array('controller' => 'Project', 'action' => $pageaction, 'project' => $project)))
                       ->build();
                $this->redirectToUri($link);
            } else {
                $this->redirect('list');
            }
            
        } else {
             $this->redirect('list');
        }
    }
    
    /**
     * action predel
     *
     * @param \ARM\Armconstructions\Domain\Model\Landlord $landlord
     * @ignorevalidation $landlord
     * @return void
     */
    public function predelAction(\ARM\Armconstructions\Domain\Model\Landlord $landlord)
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
        
        $this->view->assign('landlord', $landlord);
    }
    
    /**
     * action delete
     *
     * @param \ARM\Armconstructions\Domain\Model\Landlord $landlord
     * @return void
     */
    public function deleteAction(\ARM\Armconstructions\Domain\Model\Landlord $landlord)
    {
        $project = $landlord->getProject();
        
        $this->addFlashMessage('Landlord removed successfully.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->landlordRepository->remove($landlord);
       
        if ($this->request->hasArgument('returnpage')) {
            
            $pageid = $this->request->getArgument('returnpage');

            if ($this->request->hasArgument('pageaction')) {
                $pageaction = $this->request->getArgument('pageaction');
            }
            $link = $this->uriBuilder->setTargetPageUid($pageid)
                       ->setArguments(array('tx_armconstructions_project' => array('controller' => 'Project', 'action' => $pageaction, 'project' => $project)))
                       ->build();
            $this->redirectToUri($link);
            
        } else {
             $this->redirect('list');
        }
    }

}