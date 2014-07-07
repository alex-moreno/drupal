<?php
/**
 * @file
 * Tests TrackAndTraceNumber object.
 */
define('DRUPAL_ROOT', getcwd());
include 'modules/custom/pfw_registration/includes/pfw_registration.helpers.inc';

/**
 * PHPunit PFWRegistration.
 *
 * To run :
 *
 * phpunit --configuration=phpunit.xml -v --filter testPFWRegistrationExtractAccountContractNumbers
 *
 * @group PfwRegistration
 */
class PFWRegistrationTest extends PHPUnit_Framework_TestCase {

  /**
   * Default test object.
   *
   * @var TrackAndTraceNumber
   */
  protected $trackAndTraceNumber;

  /**
   * Start by creating a TrackAndTraceNumber object
   */
  public function setUp() {
    $this->trackAndTraceNumber = new TrackAndTraceNumber('TrackAndTraceNumber', array());
  }

  /**
   * @dataProvider PFWRegistrationNumbersPoiseFormData
   */
  public function testPFWRegistrationExtractAccountNumbersForPoise($form) {

    $result = extract_account_numbers_for_poise($form);

    // @todo: change with assertequals and add new arrays to compare with results
    $this->assertNotEmpty($result);
  }

  /**
   * @dataProvider PFWRegistrationContractNumbersFormData
   */
  public function testPFWRegistrationExtractAccountContractNumbers($form) {

    $result = pfw_registration_extract_account_contract_numbers($form);

    // @todo: change with assertequals and add new arrays to compare with results
    $this->assertNotEmpty($result);
  }



  /**
   * Data provider for failing basic tracking number validation.
   *
   * @return array
   */
  public function PFWRegistrationContractNumbersFormData() {
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
