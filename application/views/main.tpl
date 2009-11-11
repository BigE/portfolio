<?php
$jsArr = array('jquery.corner.js');
?>
			<script type="text/javascript">
/*<![CDATA[*/
$(document).ready(function() {
	$('div.examples h3').corner();
	if (jQuery.browser.msie && jQuery.browser.version < 7) {
		$('#ie6').html('I noticed you\'re using IE ' + jQuery.browser.version + '. While this design is compatable with your browser, there are minor problems that could cause some inconvinence. I reccomend you upgrade or use <a href="http://www.opera.com" target="new">Opera</a>. Thanks.');
		//$('#ie6').effect('highlight', {color: '#ff7979'}, 2000);
	}
});
/*]]>*/
			</script>
			<div id="description">
				<h3>About This Site</h3>
				<p>
					All code examples listed here are technologies or ideas used in different projects.
					The projects languages range from PHP &amp; Javascript to C &amp; C#. All projects
					listed here are fully working demos to show examples of previous work completed or
					ideas implemented into projects.
				</p>
				<p>
					All JavaScript code and effects are built using the <a href="http://jquery.com/" target="jquery">jQuery</a>
					framework and using <a href="http://jqueryui.com/" target="jqueryui">jQuery UI</a>
					for UI effects. I will also add a jQuery section to show
					examples of technologies used with jQuery and AJAX.
				</p>
				<h4>Eric's Resume</h4>
				<p>Download - <a href="/docs/resume.pdf">PDF</a> - <a href="/docs/resume.doc">Word Document</a></p>
				<h4>Note</h4>
				<p>
					This site is still in development. Some things will
					work and some won't. I will keep updating this site regularly. If a link
					has a line through it, it is a section that is incomplete.
				</p>
				<div id="ie6"></div>
			</div>
			<div id="mainBox">
				<h2>About Eric</h2>
				<p>I am an experienced PHP programmer that has experience with small scripts up to
				large scale enterprise applications. Through PHP I have also experienced working with
				HTML, CSS, and even Javascript. I have been striving to learn more and experience
				more in the programming world, so I have started to take on other languages like
				Python, C and C#.</p>
				<p>This site is to display and list some of the technologies that I have encountered
				and used in my experience. Please have a look around and get in touch with me if you
				have any questions or issues!</p>
				<div id="php" class="examples">
					<h3>PHP Technologies</h3>
					<div class="projects">
						<a href="/diff">PHP Diff</a>
						<a href="/gallery">Gallery</a>
						<a href="/sitech">SiTech Library</a>
					</div>
				</div>
				<div id="python" class="examples">
					<h3>Python</h3>
					<div class="projects">
						<a href="/simpleirc">SimpleIRC</a>
					</div>
				</div>
				<div id="csharp" class="examples">
					<h3>C/C++/C#</h3>
					<div class="projects">
						<a href="/irssinotify">IrssiNotify (C#)</a>
						<a href="/liboscar">liboscar (C)</a>
					</div>
				</div>
			</div>
