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

class Controller_Scraps extends Controller_Template {

	public $template = 'scraps/template';

	public function router($method, $params)
	{
		$method === '' and $method = 'index';

		if (is_callable(array($this, 'action_'.$method)))
		{
			return call_user_func_array(array($this, 'action_'.$method), $params);
		}
		return $this->action_view($method);
	}

	public function action_index()
	{
		$this->template->title = 'New Scrap';
		$this->template->type = 'php'; // Eventually remember what they chose last time
		$this->template->content = new View('scraps/form');
	}

	public function action_reply($short_id)
	{
		$scrap = Model_Scrap::find_by_short_id($short_id);

		if ($scrap)
		{
			$this->template->title = 'Reply to Scrap';
			$this->template->content = new View('scraps/form');
			$this->template->content->set('code', $scrap->contents, false);
			$this->template->content->type = $scrap->type;
		}
		else
		{
			$this->action_404();
		}
	}


	public function action_new()
	{
		if (Input::post('contents'))
		{
			$last_scrap = Model_Setting::find(1);
			$last_short_id = ($last_scrap === NULL) ? 0 : $last_scrap->last_short_id;

			$short_id = Scrapyrd::inc($last_short_id);
			$contents = Input::post('contents');
			$private = Input::post('private', '0');

			if ($private != '0')
			{
				$short_id = sha1($contents.microtime(true));
			}
			else
			{
				$last_scrap->last_short_id = $short_id;
				$last_scrap->save();
			}

			$scrap = new Model_Scrap;
			$scrap->contents = $contents;
			$scrap->short_id = $short_id;
			$scrap->type = Input::post('type');
			$scrap->private = $private;
			$scrap->created_at = time();
			$scrap->updated_at = time();
			$scrap->save();
			
			if (Fuel::$env === Fuel::PRODUCTION)
			{
				Response::redirect('http://scrp.at/'.$short_id);
			}
			else
			{
				Response::redirect($short_id);
			}
		}
		else
		{
			$this->template->title = 'Error';
			$this->template->content = 'Cannot create an empty Scrap!';
		}
	}

	public function action_view($short_id, $raw = false)
	{
		$scrap = Model_Scrap::find_by_short_id($short_id);

		if ($scrap)
		{
			if ($scrap->views == "NULL")
			{
				$scrap->views = 0;
			}
			$scrap->views = $scrap->views + 1;

			$scrap->save();
			$this->template->title = 'Viewing Scrap - http://scrp.at/'.$short_id;
			$this->template->type = $scrap->type == "NULL" ? 'php' : $scrap->type;
			$this->template->content = new View('scraps/view');
			$this->template->content->type = $scrap->type == "NULL" ? 'php' : $scrap->type;
			$this->template->content->code = str_replace("\t", '    ', $scrap->contents);
			$this->template->content->short_id = $short_id;
		}
		else
		{
			$this->action_404();
		}
	}

	public function action_raw()
	{
		$short_id = Uri::segment(2);
		$scrap = Model_Scrap::find_by_short_id($short_id);

		if ($scrap)
		{
			$this->auto_render = false;
			$this->response->set_header('Content-Type', 'text/plain');
			$this->response->body = $scrap->contents;
		}
		else
		{
			$this->action_404();
		}
	}


	public function action_404()
	{
		$this->response->status = 404;
		$this->template->title = '404';
		$this->template->content = new View('scraps/404');
	}

}
