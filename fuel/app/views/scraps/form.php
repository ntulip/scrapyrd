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
			<?php echo Form::select(array(
				'name' => 'type',
				'id'	=> 'type',
				'options'	=> Scrapyrd::$languages,
				'selected'	=> (isset($type) ? $type : 'php'),
			)); ?>&nbsp;<input type="checkbox" id="private" name="private" value="1" /> <label for="private">Private</label>
			</p>
			<?php echo Form::close(); ?>