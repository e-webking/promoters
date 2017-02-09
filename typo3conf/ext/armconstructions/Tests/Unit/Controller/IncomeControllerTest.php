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
 * Test case for class ARM\Armconstructions\Controller\IncomeController.
 *
 */
class IncomeControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \ARM\Armconstructions\Controller\IncomeController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('ARM\\Armconstructions\\Controller\\IncomeController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllIncomesFromRepositoryAndAssignsThemToView()
	{

		$allIncomes = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$incomeRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\IncomeRepository', array('findAll'), array(), '', FALSE);
		$incomeRepository->expects($this->once())->method('findAll')->will($this->returnValue($allIncomes));
		$this->inject($this->subject, 'incomeRepository', $incomeRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('incomes', $allIncomes);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenIncomeToIncomeRepository()
	{
		$income = new \ARM\Armconstructions\Domain\Model\Income();

		$incomeRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\IncomeRepository', array('add'), array(), '', FALSE);
		$incomeRepository->expects($this->once())->method('add')->with($income);
		$this->inject($this->subject, 'incomeRepository', $incomeRepository);

		$this->subject->createAction($income);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenIncomeToView()
	{
		$income = new \ARM\Armconstructions\Domain\Model\Income();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('income', $income);

		$this->subject->editAction($income);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenIncomeInIncomeRepository()
	{
		$income = new \ARM\Armconstructions\Domain\Model\Income();

		$incomeRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\IncomeRepository', array('update'), array(), '', FALSE);
		$incomeRepository->expects($this->once())->method('update')->with($income);
		$this->inject($this->subject, 'incomeRepository', $incomeRepository);

		$this->subject->updateAction($income);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenIncomeFromIncomeRepository()
	{
		$income = new \ARM\Armconstructions\Domain\Model\Income();

		$incomeRepository = $this->getMock('ARM\\Armconstructions\\Domain\\Repository\\IncomeRepository', array('remove'), array(), '', FALSE);
		$incomeRepository->expects($this->once())->method('remove')->with($income);
		$this->inject($this->subject, 'incomeRepository', $incomeRepository);

		$this->subject->deleteAction($income);
	}
}
