<div class="<?php echo $this->cssclass; ?>"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
	<?php if ($this->headline): ?>
		<<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
	<?php endif; ?>
<a href="
	javascript:(
		function(){
		var w=480;var h=380;
		var x=Number((window.screen.width-w)/2);
		var y=Number((window.screen.height-h)/2);
		window.open('https://plusone.google.com/_/+1/confirm?hl=<?php echo($this->button_language); ?>&url=<?php echo($this->googleplusonehref); ?>&title=<?php echo($this->googleplusonetitle); ?>','','width='+w+',height='+h+',left='+x+',top='+y+',scrollbars=no');
		})();">
<?php echo($GLOBALS['TL_LANG']['googleplus1']['share']);?></a>
</div>