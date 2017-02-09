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
 * Test case for class ARM\Armconstructions\Controller\MaterialController.
 *
 */
class MaterialControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \ARM\Armconstructions\Controller\MaterialController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('ARM\\Armconstructions\\Controller\\MaterialController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllMaterialsFromRepositoryAndAssignsThemToView()
	{

		$allMaterials = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$materialRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\MaterialRepository', array('findAll'), array(), '', FALSE);
		$materialRepository->expects($this->once())->method('findAll')->will($this->returnValue($allMaterials));
		$this->inject($this->subject, 'materialRepository', $materialRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('materials', $allMaterials);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenMaterialToMaterialRepository()
	{
		$material = new \ARM\Armconstructions\Domain\Model\Material();

		$materialRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\MaterialRepository', array('add'), array(), '', FALSE);
		$materialRepository->expects($this->once())->method('add')->with($material);
		$this->inject($this->subject, 'materialRepository', $materialRepository);

		$this->subject->createAction($material);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenMaterialToView()
	{
		$material = new \ARM\Armconstructions\Domain\Model\Material();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('material', $material);

		$this->subject->editAction($material);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenMaterialInMaterialRepository()
	{
		$material = new \ARM\Armconstructions\Domain\Model\Material();

		$materialRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\MaterialRepository', array('update'), array(), '', FALSE);
		$materialRepository->expects($this->once())->method('update')->with($material);
		$this->inject($this->subject, 'materialRepository', $materialRepository);

		$this->subject->updateAction($material);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenMaterialFromMaterialRepository()
	{
		$material = new \ARM\Armconstructions\Domain\Model\Material();

		$materialRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\MaterialRepository', array('remove'), array(), '', FALSE);
		$materialRepository->expects($this->once())->method('remove')->with($material);
		$this->inject($this->subject, 'materialRepository', $materialRepository);

		$this->subject->deleteAction($material);
	}
}
