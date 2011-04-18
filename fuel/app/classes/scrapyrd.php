<?php

class Scrapyrd {
	
	public static $languages = array(
		'bash'		=> 'Bash',
		'cs'		=> 'C#',
		'css'		=> 'CSS',
		'delphi'	=> 'Delphi',
		'diff'		=> 'Diff',
		'django'	=> 'Django',
		'dos'		=> 'DOS',
		'html-xml'	=> 'HTML / XML',
		'ini'		=> 'INI',
		'java'		=> 'Java',
		'javascript'	=> 'Javascript',
		'lisp'		=> 'Lisp',
		'perl'		=> 'Perl',
		'php'		=> 'PHP',
		''			=> 'Plain Text',
		'python'	=> 'Python',
		'ruby'		=> 'Ruby',
		'scala'		=> 'Scala',
		'sql'		=> 'SQL',
		'vbscript'	=> 'VBScript',
	);
	
	public static function inc($n, $pos = 0)
	{
		static $set = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_';
		static $setmax = 63;

		if (strlen($n) == 0)
		{
			// no string
			return $set[0];
		}

		$nindex = strlen($n) - 1 - $pos;
		if ($nindex < 0)
		{
			// add a new digit to the front of the number
			return $set[0] . $n;
		}

		$char = $n[$nindex];
		$setindex = strpos($set, $char);

		if ($setindex == $setmax)
		{
			$n[$nindex] = $set[0];
			return static::inc($n, $pos+1);
		}
		else
		{
			$n[$nindex] = $set[$setindex + 1];
			return $n;
		}
	}
}