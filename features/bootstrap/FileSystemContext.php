<?php

use Behat\Mink\Behat\Context\MinkContext;
use Behat\Behat\Context\Step;
use Behat\Gherkin\Node\TableNode;
use PHPUnit_Framework_ExpectationFailedException as AssertException;

/**
 * This context is intended for file system interractions
 */
class FileSystemContext extends \Behat\Behat\Context\BehatContext
{
  /**
   *  Root directory
   *
   * @var string
   */
  private $root;

  /**
   * Context initialization
   *
   * @param array $parameters context parameters (set them up through behat.yml)
   */
  public function __construct(array $parameters)
  {
    $this->root = isset($parameters["filesystem"]['root']) ? $parameters["filesystem"]['root'] : null;
  }

  /**
   * Uploads a file using the specified input field
   *
   * @When /^(?:|I )put the file "(?P<path>[^"]*)" into "(?P<field>(?:[^"]|\\")*)"$/
   */
  public function putFileIntoField($path, $field)
  {
    $path = $this->root . DIRECTORY_SEPARATOR . $path;
    if(!file_exists($path))
    {
      throw new \Exception(sprintf("The %s file does not exist", $path));
    }

    return array(
      new Step\When(sprintf('I attach the file "%s" to "%s"', $path, $field))
    );
  }
}