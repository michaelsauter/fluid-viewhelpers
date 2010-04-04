<?php
declare(ENCODING = 'utf-8');
namespace F3\ViewHelperTest\ViewHelpers;

/*                                                                        *
 * This script belongs to the FLOW3 package "ViewHelperTest".                   *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License as published by the Free   *
 * Software Foundation, either version 3 of the License, or (at your      *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *                                                                        *
 * You should have received a copy of the GNU General Public License      *
 * along with the script.                                                 *
 * If not, see http://www.gnu.org/licenses/gpl.html                       *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * Calls method on specified object
 *
 * = Examples =
 *
 * <code title="Example">
 * <namespace:callMethod object="{objectName}" method="methodName" arguments="{0: argument1, 1: argument2}" />
 * </code>
 * <output>
 * (depends on the result of the method)
 * </output>
 *
 * @package ViewHelperTest
 * @subpackage ViewHelpers
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 * @author Michael Sauter
 * @scope prototype
 */
class CallMethodViewHelper extends \F3\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * @param mixed $object
	 * @param string $method
	 * @param array $arguments
	 * @return the parsed string.
	 */
	public function render($object, $method, $arguments) {
		if (method_exists($object, $method)) {
			return call_user_func_array(array($object, $method), $arguments);
		}
		else {
			throw new \Exception('CallMethodViewHelper: Given method does not exist on specified object.');
		}	
	}
}
?>