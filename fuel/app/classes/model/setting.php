<?php
/**
 * ScrapYrd - Simple, fast code sharing
 *
 * @package    Scrapyrd
 * @version    1.0
 * @author     Dan Horrigan
 * @copyright  2011 Dan Horrigan
 * @license    MIT License
 * @link       http://scrapyrd.com
 */

class Model_Setting extends Orm\Model {
	public static $_properties = array('last_short_id', 'site_enabled');
}