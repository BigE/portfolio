<script type="text/javascript">
$(document).ready(function () {
	$('#types').accordion({active: false, collapsible: true});
});
</script>
<div id="description" class="ui-widget ui-widget-content ui-corner-all">
	<div class="ui-widget-header ui-corner-top"><h3>About SimpleIRC</h3></div>
	<p>
		SimpleIRC is an IRC bot that started out written in PHP and was later
		converted to Python. Its purpose is to receive commands and return info
		useful to users. It also supports user registration, and user elevation
		for special commands.
	</p>
	<p>
		<a href="http://kenai.com/projects/simpleirc/sources/simpleirc-repository/show" class="new-window">Browse Source</a>
	</p>
</div>
<div id="box" class="ui-widget ui-widget-content ui-corner-all">
	<div class="ui-widget-header ui-corner-top"><h2>SimpleIRC</h2></div>
	<p>
		<ul id="types">
			<li>
				<h4><a href="#python">Python Version</a></h4>
				<div>
					<p>
						The Python version of SimpleIRC is actually the second language the bot
						has been written in. The first language was PHP where the limitations of
						the language itself were harder to overcome for the bot. The main limitation
						is that there has not been a good way in PHP to reload code on the fly.
						Since SimpleIRC is made to support reloadable modules while its running,
						this presented quite a problem.
					</p>
					<p>
						Once making the switch to Python, I have noticed a lot of good qualities
						about it over PHP for such a program. First off is the reloadable code
						for modules in the bot. Python supports code reloading by default, so
						this was an easy task to do. Another good thing about Python is the
						support for threading. Threading is a major plus for any kind of daemon
						style process. Threading has also enabled the bot to execute commands
						and wait for data to come in, while still replying to other commands
						issued by users.
					</p>
					<p>
						Future development plans for SimpleIRC include a full GUI and curses (cli)
						clients. Currently I'm working on rebuilding the core base of the code
						after it was lost not long ago.
					</p>
				</div>
			</li>
			<li>
				<h2><a href="#php">PHP Version</a></h2>
				<div>
					<p>
						While the PHP version of SimpleIRC doesn't exist code wise anymore, the
						ideas and concepts used to make it, still exist. Coding it in PHP was
						very informative and helped me learn a lot. However, PHP itself was very
						limiting in what I wanted to accomplish. I found that it would prove
						more useful to build the bot in another language that actually supported
						the features I wanted in the bot. That's when the switch from PHP to
						Python started.
					</p>
					<p>
						I had written code to take PHP files and parse them up using the
						tokenizer extension. This would then load all the functions inside the
						file and using lmbada functions, create reloadable modules. This was the
						basics of the idea behind the bot, to create a program that could
						continue to run, and allow parts of it to update the code used without
						ending the program.
					</p>
				</div>
			</li>
		</ul>
	</p>
</div>
