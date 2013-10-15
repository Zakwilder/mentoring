<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Class PageTest.
 *
 * @package Yiitrn\Tests\Unit
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class PageTest extends CDbTestCase
{
	/**
	 * Object of tested class.
	 *
	 * @var Page
	 */
	protected $page;

	/**
	 *  Starting the test.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		parent::setUp();
		$this->page = new Page();
	}

	/**
	 * Testing title for 'required'.
	 *
	 * @return void
	 */
	public function testTitleIsRequired()
	{
		$this->page->title = '';
		$this->assertFalse($this->page->validate(array('title')));
	}

	/**
	 * Testing slug for 'required'.
	 *
	 * @return void
	 */
	public function testSlugIsRequired()
	{
		$this->page->slug = '';
		$this->assertFalse($this->page->validate(array('slug')));
	}

	/**
	 * Testing category_id for 'numeric'.
	 *
	 * @return void
	 */
	public function testCategoryIdIsNumeric()
	{
		$this->page->category_id = 'string';
		$this->assertFalse($this->page->validate(array('category_id')));
	}

	/**
	 * Testing title for 'max input'.
	 *
	 * @return void
	 */
	public function testTitleMaxLength()
	{
		$this->page->title = $this->generateString(101);
		$this->assertFalse($this->page->validate(array('title')));

		$this->page->title = $this->generateString(100);
		$this->assertTrue($this->page->validate(array('title')));
	}

	/**
	 * Generate string with defined length.
	 *
	 * @param integer $length Length of the generated string.
	 *
	 * @return string
	 */
	public function generateString($length)
	{
		$random = '';
		srand((double) microtime() * 1000000);
		$char_list = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$char_list .= 'abcdefghijklmnopqrstuvwxyz';
		$char_list .= '1234567890';

		// Add the special characters to $char_list if needed
		for ($i = 0; $i < $length; $i++) {
			$random .= substr($char_list, (rand() % (strlen($char_list))), 1);
		}
		return $random;
	}

}