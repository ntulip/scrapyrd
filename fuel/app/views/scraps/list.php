<?php foreach ($scraps as $scrap): ?>
<div class="scrap">
	<?php echo Html::anchor($scrap->short_id, Uri::create($scrap->short_id)); ?> - Created on <?php echo date('F j, Y \a\t g:i a', $scrap->created_at); ?>
	<div class="preview"><pre><code><?php echo Str::truncate($scrap->contents, 200, '...', true); ?></code></pre></div>
</div>
<?php endforeach; ?>