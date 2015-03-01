<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
/**
* Controller for creating random cards and passing to view application/index
*/
class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $maxNumberOfImages = 52;    // Total NUmber Of Images
	$images = array();
	$numberOfImages = 12; // Total Pair
	$rows = 4; // Numbers Of Rows 
	$cols= 6; // Numbers Of Cols


	while( count($images)<$numberOfImages ) {
		$rand = rand(1,$maxNumberOfImages); // Generate a random integer
		if( !in_array($rand,$images) )    // Checks if a value exists in an array
		array_push( $images, $rand ); //Push element in arrays
	}
	$images = array_merge($images,$images);  //Merge one or more arrays

	shuffle($images);  //This function shuffles (randomizes the order of the elements in) an array.
	//passing values to the view 
	return new ViewModel(array("images"=>$images,
				   "rows"=>$rows,
				   "cols"=>$cols,
				   "numberOfImages"=>$numberOfImages));
    }
}
