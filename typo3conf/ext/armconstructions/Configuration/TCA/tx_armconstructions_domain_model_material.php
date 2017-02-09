<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:armconstructions/Resources/Private/Language/locallang_db.xlf:tx_armconstructions_domain_model_material',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,rate,qty,amount,challan,sdate,supplier,project,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('armconstructions') . 'Resources/Public/Icons/tx_armconstructions_domain_model_material.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, agent, name, rate, qty, amount, challan, sdate, supplier, project',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, agent, name, rate, qty, amount, challan, sdate, supplier, project, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_armconstructions_domain_model_material',
				'foreign_table_where' => 'AND tx_armconstructions_domain_model_material.pid=###CURRENT_PID### AND tx_armconstructions_domain_model_material.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
                'agent' => array(
			'exclude' => 1,
			'label' => 'Agency',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'fe_users',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:armconstructions/Resources/Private/Language/locallang_db.xlf:tx_armconstructions_domain_model_material.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'rate' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:armconstructions/Resources/Private/Language/locallang_db.xlf:tx_armconstructions_domain_model_material.rate',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'trim'
			),
		),
		'qty' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:armconstructions/Resources/Private/Language/locallang_db.xlf:tx_armconstructions_domain_model_material.qty',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'double2'
			)
		),
		'amount' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:armconstructions/Resources/Private/Language/locallang_db.xlf:tx_armconstructions_domain_model_material.amount',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'challan' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:armconstructions/Resources/Private/Language/locallang_db.xlf:tx_armconstructions_domain_model_material.challan',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'trim'
			)
		),
		'sdate' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:armconstructions/Resources/Private/Language/locallang_db.xlf:tx_armconstructions_domain_model_material.sdate',
			'config' => array(
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'supplier' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:armconstructions/Resources/Private/Language/locallang_db.xlf:tx_armconstructions_domain_model_material.supplier',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_armconstructions_domain_model_supplier',
                                'items' => array(
					array('Direct', 0),
				),
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'project' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:armconstructions/Resources/Private/Language/locallang_db.xlf:tx_armconstructions_domain_model_material.project',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_armconstructions_domain_model_project',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
	),
);