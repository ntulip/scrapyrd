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

class Model_Scrap extends Orm\Model {
	public static $_properties = array('id', 'type', 'contents', 'created_at', 'updated_at', 'short_id', 'private', 'views', 'user_id');
}