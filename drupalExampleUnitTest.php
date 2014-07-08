<?php
/**
 * @file
 * Tests TrackAndTraceNumber object.
 */
define('DRUPAL_ROOT', getcwd());
include 'modules/custom/[YOUR-MODULE]/includes/pfw_registration.helpers.inc';

/**
 * PHPunit PFWRegistration.
 *
 * To run :
 *
 * phpunit --configuration=phpunit.xml -v --filter testYourFunctionToTest
 *
 * @group YOURMODULE
 */
class YOURMODULETest extends PHPUnit_Framework_TestCase {

  /**
   * Default test object.
   *
   * @var TrackAndTraceNumber
   */
  protected $trackAndTraceNumber;

  /**
   * Start by creating an object
   */
  public function setUp() {
    $this->trackNumber = new TrackNumber('TrackNumber', array());
  }

  /**
   * @dataProvider PYOURMODULEFormData
   */
  public function testYourFunctionToTest($form) {

    $result = function_to_test($form);

    // @todo: change with assertequals and add new arrays to compare with results
    $this->assertNotEmpty($result);
  }

  /**
   * @dataProvider PYOURMODULEFormData
   */
  public function testPFWRegistrationExtractAccountContractNumbers($form) {
  }


  /**
   * Data provider for failing basic tracking number validation.
   *
   * @return array
   */
  public function PYOURMODULEFormData() {
    return array(
      array(
        array(
          "accounts_1" => array('#value' => 'SAN407501'),
          "contracts_1" => array('#value'  => 'R708339'),
        ),
      ),

      array(
        array(
          "accounts_1" => array('#value' => 'ABC07501'),
          "contracts_1" => array('#value'  => 'R708339'),
          "accounts_2" => array('#value' => 'SSD407501'),
          "contracts_2" => array('#value'  => 'ASDFAD32'),
          "accounts_3" => array('#value' => 'DSF245667'),
          "contracts_3" => array('#value'  => 'R708339'),
          "accounts_4" => array('#value' => 'SAN407501'),
          "contracts_4" => array('#value'  => 'SAN407501'),
        ),
      ),

      array(
        array(
          "accounts_2" => array('#value' => 'SAN4001'),
          "contracts_2" => array('#value'  => 'R708339'),
        ),
      ),

      array(
        array(
          "accounts_1" => array('#value' => 'SAN4001'),
          "contracts_1" => array('#value'  => 'R708339'),
        ),
      ),

      array(
        array(
          "accounts_1" => array('#value' => 'ASBN4001'),
          "contracts_1" => array('#value'  => 'ASD23456'),
        ),
      ),

      array(
        array(
          "accounts_1" => array('#value' => 'ASBN4001'),
        ),
      ),

      array(
        array(
          "accounts_1" => array('#value'  => 'ASD23456', '#value'  => 'ASD23456'),
        ),
      ),


    );
  }

}
