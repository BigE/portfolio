<?php
$jsArr = array('jquery.corner.js');
?>
			<script type="text/javascript">
$(document).ready(function() {
	$('div.examples h3').corner();
	if (jQuery.browser.msie && jQuery.browser.version < 7) {
		$('#ie6').html('I noticed you\'re using IE ' + jQuery.browser.version + '. While this design is compatable with your browser, there are minor problems that could cause some inconvinence. I reccomend you upgrade or use <a href="http://www.opera.com" target="new">Opera</a>. Thanks.');
		$('#ie6').effect('highlight', {color: '#ff7979'}, 2000);
	}
});
			</script>
			<div id="description">
				<h3>About This Site</h3>
				<p>All code examples listed here are technologies or ideas used in different projects.
				The projects languages range from PHP &amp; Javascript to C &amp; C#. All projects
				listed here are fully working demos to show examples of previous work completed or
				ideas implemented into projects.</p>
				<p><strong>Eric's Resume</strong><br />Download - <a href="/docs/resume.pdf">PDF</a> - <a href="/docs/resume.doc">Word Document</a></p>
				<p><strong>Note</strong><br />This site is still in development. Some things will
				work and some won't. I will keep updating this site regularly and try to make
				notes where I can of what works and what doesn't. Thanks!</p>
				<div id="ie6"></div>
			</div>
			<div id="mainBox">
				<div id="php" class="examples">
					<h3>PHP Technologies</h3>
					<div class="projects">
						<a href="/diff">PHP Diff</a>
						<a href="">Gallery</a>
						<a href="">SiTech Library</a>
					</div>
				</div>
				<div id="jquery" class="examples">
					<h3>JQuery</h3>
					<div class="projects">
						<a href="">Example 1</a>
						<a href="">Example 2</a>
						<a href="">Example 3</a>
					</div>
				</div>
				<div id="csharp" class="examples">
					<h3>C/C++/C#</h3>
					<div class="projects">
						<a href="">IrssiProxy (C#)</a>
						<a href="">liboscar (C)</a>
					</div>
				</div>
			</div>