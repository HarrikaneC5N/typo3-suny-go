<?php
namespace Emagineurs\EPackage\ExpressionLanguage;

/**
* My conditions
*/
class TyposcriptConditions
{
	/**
	* @param string $param
	* @return bool
	*/
	public function isLoaded($param): bool
	{
		return \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded($param);
	}
}