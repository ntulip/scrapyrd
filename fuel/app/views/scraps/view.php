<div id="code-block">
<div class="block-header">
<p style="float: right;margin: 0; padding: 0; font-family: 'Trebuchet MS', sans-serif; font-size: 14px;">Theme: <?php echo Form::select(array(
	'name' => 'style',
	'id'	=> 'style',
	'options'	=> array(
		'ascetic'	=> 'Ascetic',
		'dark'		=> 'Dark',
		'default'	=> 'Default',
		'far'		=> 'Far',
		'github'	=> 'GitHub',
		'idea'		=> 'Idea',
		'ir_black'	=> 'IR Black',
		'magula'	=> 'Magula',
		'sunburst'	=> 'Sunburst',
		'vs'		=> 'Visual Studio',
		'zenburn'	=> 'Zen Burn',
	),
	'selected'	=> 'idea',
)); ?> | <?php echo Html::anchor('reply/'.$short_id, 'Reply'); ?> | <?php echo Html::anchor('raw/'.$short_id, 'Raw'); ?></p>


<h2><?php echo Scrapyrd::$languages[$type]; ?></h2>
</div>
<table cellspacing="0" cellpadding="2">
<tr>
<td style="text-align: right;"><?php
$lines = explode("\n", $code);
for ($i = 1; $i < count($lines); $i++):
	echo $i."<br />";
endfor;
echo $i;
?></td>
<td style="width: 100%;"><pre id="code-pre" class="<?php echo $type; ?>"><code><?php echo $code; ?></code></pre></td>
</tr>
</table>
</div>


<script type="text/javascript">
	if($.cookie("scrapyrd-style")) {
		$("#style").val($.cookie("scrapyrd-style"));
	}
</script>
