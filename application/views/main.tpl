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
				<p>All code examples listed here are technologies or ideas used in different projects.
				The projects languages range from PHP &amp; Javascript to C &amp; C#. All projects
				listed here are fully working demos to show examples of previous work completed or
				ideas implemented into projects.</p>
				<p><strong>Eric's Resume</strong><br />Download - <a href="/docs/resume.pdf">PDF</a> - <a href="/docs/resume.doc">Word Document</a></p>
				<p><strong>Note</strong><br />This site is still in development. Some things will
				work and some won't. I will keep updating this site regularly. If a link
				has a line through it, it is a section that is incomplete.</p>
				<div id="ie6"></div>
			</div>
			<div id="mainBox">
				<h2>About Eric</h2>
				<p>I am an experienced PHP programmer that has experience with small scripts up to
				large scale enterprise applications. Through PHP I have also experienced working with
				HTML, CSS, and even Javascript. I have been striving to learn more and experience
				more in the programming world, so I have started to take on other languages like
				python, C and C#.</p>
				<p>This site is to display and list some of the technologies that I have encountered
				and used in my experience. Please have a look around and get in touch with me if you
				have any questions or issues!</p>
				<div id="php" class="examples">
					<h3>PHP Technologies</h3>
					<div class="projects">
						<a href="/diff">PHP Diff</a>
						<a href="/gallery">Gallery</a>
						<del><a href="/incomplete">SiTech Library</a></del>
					</div>
				</div>
				<div id="jquery" class="examples">
					<h3>JQuery</h3>
					<div class="projects">
						<del><a href="/incomplete">Example 1</a></del>
						<del><a href="/incomplete">Example 2</a></del>
						<del><a href="/incomplete">Example 3</a></del>
					</div>
				</div>
				<div id="csharp" class="examples">
					<h3>C/C++/C#</h3>
					<div class="projects">
						<del><a href="/incomplete">IrssiProxy (C#)</a></del>
						<a href="/liboscar">liboscar (C)</a>
					</div>
				</div>
			</div>
