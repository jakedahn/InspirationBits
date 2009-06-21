<script type="text/javascript" src="<?= base_url() ?>public/js/mootools.core.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/js/mootools.more.js"></script>
<script type="text/javascript" src="<?= base_url() ?>public/js/tabs.js"></script>

<script type="text/javascript" charset="utf-8">
	window.addEvent('domready',function(){
		<?if ($this->redux_auth->logged_in()): ?>
			var tabs = new MGFX.Tabs('.tabs','.tab',{
				autoplay: false,
				transitionDuration:500,
				hover:true
			});
		<?endif ?>
		
		var img = $$('img');
		for (var i=0;i<img.length;i++)
		{
			var theWidth = img[i].getDimensions();
			var	theImage = img[i];
			
			if (theWidth.width >= 498) {
				theImage.set('class', 'resizeMe');
			};
		}
		
	});
</script>
