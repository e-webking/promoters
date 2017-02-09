<?php
namespace ARM\Armconstructions\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class ARM\Armconstructions\Controller\ClientController.
 *
 */
class ClientControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \ARM\Armconstructions\Controller\ClientController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('ARM\\Armconstructions\\Controller\\ClientController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllClientsFromRepositoryAndAssignsThemToView()
	{

		$allClients = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$clientRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\ClientRepository', array('findAll'), array(), '', FALSE);
		$clientRepository->expects($this->once())->method('findAll')->will($this->returnValue($allClients));
		$this->inject($this->subject, 'clientRepository', $clientRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('clients', $allClients);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenClientToClientRepository()
	{
		$client = new \ARM\Armconstructions\Domain\Model\Client();

		$clientRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\ClientRepository', array('add'), array(), '', FALSE);
		$clientRepository->expects($this->once())->method('add')->with($client);
		$this->inject($this->subject, 'clientRepository', $clientRepository);

		$this->subject->createAction($client);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenClientToView()
	{
		$client = new \ARM\Armconstructions\Domain\Model\Client();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('client', $client);

		$this->subject->editAction($client);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenClientInClientRepository()
	{
		$client = new \ARM\Armconstructions\Domain\Model\Client();

		$clientRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\ClientRepository', array('update'), array(), '', FALSE);
		$clientRepository->expects($this->once())->method('update')->with($client);
		$this->inject($this->subject, 'clientRepository', $clientRepository);

		$this->subject->updateAction($client);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenClientFromClientRepository()
	{
		$client = new \ARM\Armconstructions\Domain\Model\Client();

		$clientRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\ClientRepository', array('remove'), array(), '', FALSE);
		$clientRepository->expects($this->once())->method('remove')->with($client);
		$this->inject($this->subject, 'clientRepository', $clientRepository);

		$this->subject->deleteAction($client);
	}
}
