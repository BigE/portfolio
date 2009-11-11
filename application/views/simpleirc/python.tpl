<div id="description">
	<h3>About SimpleIRC</h3>
	<p>
		SimpleIRC is an IRC bot that started out written in PHP and was later
		converted to Python. Its purpose is to receive commands and return info
		useful to users. It also supports user registration, and user elevation
		for special commands.
	</p>
</div>
<div id="mainBox">
	<h2>SimpleIRC - Python</h2>
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