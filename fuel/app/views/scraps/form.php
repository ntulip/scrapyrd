			<?php echo Form::open('new'); ?>
			<p><?php echo Form::textarea(array(
				'name' => 'contents',
				'id' => 'contents',
				'cols' => 100,
				'rows' => 30,
				'value' => isset($code) ? $code : '',
			)); ?></p>
			<p>
				<?php echo Form::input(array('type' => 'submit', 'name' => 'submit', 'id' => 'submit', 'value' => 'Create Scrap')); ?>
				<?php echo Form::select('type', (isset($type) ? $type : 'php'), Scrapyrd::$languages, array('id' => 'type')); ?>&nbsp;
				<input type="checkbox" id="private" name="private" value="1" />&nbsp;<label for="private">Private</label>
			</p>
			<p style="display: none;">
				<input type="text" name="dont-fill-this-out" value="" />
			</p>
			<?php echo Form::close(); ?>