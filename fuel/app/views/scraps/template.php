<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ScrapYrd - <?php echo $title; ?></title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo Uri::create('assets/js/cookie.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo Uri::create('assets/js/tabby.js'); ?>"></script>
	<link href="<?php echo Uri::create('assets/css/main.css'); ?>" media="screen" rel="stylesheet" />
<?php if (isset($type) && $type != ''): ?>
	<script type="text/javascript" src="<?php echo Uri::create('assets/js/highlight.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo Uri::create('assets/js/languages/'.$type.'.js'); ?>"></script>
	<link href="<?php echo Uri::create('assets/css/styles/idea.css'); ?>" class="sh-sheet" media="screen" rel="stylesheet" />
	<script type="text/javascript">
		if($.cookie("scrapyrd-style")) {
			$("link.sh-sheet").attr("href", "<?php echo Config::get('base_url'); ?>assets/css/styles/"+$.cookie("scrapyrd-style")+".css");
			$("#style").val($.cookie("scrapyrd-style"));
		}
		$(document).ready(function() { 
			$("#style").change(function() { 
				$("link.sh-sheet").attr("href","<?php echo Config::get('base_url'); ?>assets/css/styles/"+$(this).val()+".css");
				$.cookie("scrapyrd-style",$(this).val(), {expires: 365, path: '/'});
				return false;
			});
		});
		hljs.tabReplace = '    ';
		hljs.initHighlightingOnLoad();
	</script>
<?php endif; ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#contents').tabby();
	});
</script>
</head>
<body>
	<div id="header">
		<h1>ScrapYrd</h1>
		<ul id="nav">
			<li><?php echo Html::anchor('', 'New Scrap'); ?></li>
			<?php if ($logged_in): ?>
			<li><?php echo Html::anchor('list', 'My Scraps'); ?></li>
			<?php endif; ?>
		</ul>
		<div id="info">
			<span id="user_info">
			<?php if ( ! $logged_in): ?>
			<?php echo Html::anchor('twitter/login', Asset::img('sign-in-with-twitter.png')); ?>&nbsp;|
			Share your Code Scraps!
			<?php else: ?>
			Logged in as <strong><?php echo $user->name; ?></strong> <?php echo Asset::img($user->avatar, array('height' => '25', 'width' => '25', 'class' => 'avatar')); ?> |
			<?php echo Html::anchor('twitter/logout', 'Logout'); ?>
			<?php endif; ?>
			</span>
		</div>
		<div style="clear:both;"></div>
	</div>
	<div id="content">
	<h2><?php echo $title; ?></h2>
<?php echo $content; ?>
	</div>
	<div id="footer">
		<p>&copy; 2011 Dan Horrigan - Powered by <a href="http://fuelphp.com" target="_blank">Fuel</a> - Page Rendered in {exec_time}s using {mem_usage} MB of memory.</p>
	</div>
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-17197874-3']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
</body>
</html>
