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
 * Test case for class ARM\Armconstructions\Controller\LandlordController.
 *
 */
class LandlordControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \ARM\Armconstructions\Controller\LandlordController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('ARM\\Armconstructions\\Controller\\LandlordController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllLandlordsFromRepositoryAndAssignsThemToView()
	{

		$allLandlords = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$landlordRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\LandlordRepository', array('findAll'), array(), '', FALSE);
		$landlordRepository->expects($this->once())->method('findAll')->will($this->returnValue($allLandlords));
		$this->inject($this->subject, 'landlordRepository', $landlordRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('landlords', $allLandlords);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenLandlordToLandlordRepository()
	{
		$landlord = new \ARM\Armconstructions\Domain\Model\Landlord();

		$landlordRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\LandlordRepository', array('add'), array(), '', FALSE);
		$landlordRepository->expects($this->once())->method('add')->with($landlord);
		$this->inject($this->subject, 'landlordRepository', $landlordRepository);

		$this->subject->createAction($landlord);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenLandlordToView()
	{
		$landlord = new \ARM\Armconstructions\Domain\Model\Landlord();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('landlord', $landlord);

		$this->subject->editAction($landlord);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenLandlordInLandlordRepository()
	{
		$landlord = new \ARM\Armconstructions\Domain\Model\Landlord();

		$landlordRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\LandlordRepository', array('update'), array(), '', FALSE);
		$landlordRepository->expects($this->once())->method('update')->with($landlord);
		$this->inject($this->subject, 'landlordRepository', $landlordRepository);

		$this->subject->updateAction($landlord);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenLandlordFromLandlordRepository()
	{
		$landlord = new \ARM\Armconstructions\Domain\Model\Landlord();

		$landlordRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\LandlordRepository', array('remove'), array(), '', FALSE);
		$landlordRepository->expects($this->once())->method('remove')->with($landlord);
		$this->inject($this->subject, 'landlordRepository', $landlordRepository);

		$this->subject->deleteAction($landlord);
	}
}
