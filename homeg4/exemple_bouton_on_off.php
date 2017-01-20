<link rel="stylesheet" type="text/css" href="/style/engage.itoggle.css"/>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/easing.js"></script>
<script type="text/javascript" src="/js/engage.itoggle.js"></script>


<h3>Example 01</h3>
<p>The simplest implementation.</p>
<input type="checkbox" id="example_1" />
<div id="example_2">
	<h3>Example 02</h3>
	<p>Using it on a group of checkboxes with labels.</p>
	<label for="example_2a">Example 2 a</label>
	<input type="checkbox" checked="checked" id="example_2a" />
	<label for="example_2b">Example 2 b</label>
	<input type="checkbox" id="example_2b" />
	<label for="example_2c">Example 2 c</label>
	<input type="checkbox" checked="checked" id="example_2c" />
</div>
<div id="example_3">
	<h3>Example 03</h3>
	<p>Using it with a group of radio buttons.</p>
	<input type="radio" id="example_3a" name="example_3" checked="checked" />
	<input type="radio" id="example_3b" name="example_3" />
	<input type="radio" id="example_3c" name="example_3" />
</div>
<script type="text/javascript">

$(document).ready(function() {
	$('input#example').iToggle({
		easing: 'easeOutExpo',
		type: 'radio',
		keepLabel: true,
		easing: 'easeInExpo',
		speed: 300,
		onClick: function(){
			//Function here
		},
		onClickOn: function(){
			//Function here
		},
		onClickOff: function(){
			//Function here
		},
		onSlide: function(){
			//Function here
		},
		onSlideOn: function(){
			//Function here
		},
		onSlideOff: function(){
			//Function here
		},
	});
});
</script>