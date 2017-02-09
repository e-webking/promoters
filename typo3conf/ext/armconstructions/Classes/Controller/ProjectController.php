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
        $projects = $this->projectRepository->findAll();
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
        $this->view->assign('project', $project);
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
     * @param \ARM\Armconstructions\Domain\Model\Project $newProject
     * @return void
     */
    public function createAction(\ARM\Armconstructions\Domain\Model\Project $newProject)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
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
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->projectRepository->update($project);
        $this->redirect('list');
    }
    
    /**
     * action delete
     *
     * @param \ARM\Armconstructions\Domain\Model\Project $project
     * @return void
     */
    public function deleteAction(\ARM\Armconstructions\Domain\Model\Project $project)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->projectRepository->remove($project);
        $this->redirect('list');
    }
    
    /**
     * action addmat
     *
     * @return void
     */
    public function addmatAction()
    {
        
    }
    
    /**
     * action createmat
     *
     * @return void
     */
    public function creatematAction()
    {
        
    }
    
    /**
     * action editmat
     *
     * @return void
     */
    public function editmatAction()
    {
        
    }
    
    /**
     * action updatemat
     *
     * @return void
     */
    public function updatematAction()
    {
        
    }
    
    /**
     * action delmat
     *
     * @return void
     */
    public function delmatAction()
    {
        
    }
    
    /**
     * action addpay
     *
     * @return void
     */
    public function addpayAction()
    {
        
    }
    
    /**
     * action createpay
     *
     * @return void
     */
    public function createpayAction()
    {
        
    }
    
    /**
     * action editpay
     *
     * @return void
     */
    public function editpayAction()
    {
        
    }
    
    /**
     * action updatepay
     *
     * @return void
     */
    public function updatepayAction()
    {
        
    }
    
    /**
     * action delpay
     *
     * @return void
     */
    public function delpayAction()
    {
        
    }

}