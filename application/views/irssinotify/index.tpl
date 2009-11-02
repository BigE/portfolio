<div id="description">
	<h3>About IrssiNotify</h3>
	<p>
		IrssiNotify is based on the <a href="http://irssi.org/">irssi</a> IRC
		client and the <a href="http://irssi.org/documentation/proxy">irssi-proxy
		plugin</a> used with the client. The purpose behind it is to add a simple
		popup notification when a highlight is triggered for Windows users
		who use irssi.
	</p>
	<p><a href="/irssinotify/screens">Screen Shots</a></p>
</div>
<div id="mainBox">
	<h2>IrssiNotify</h2>
	<p>
		Written in C#, this application is primarily focused for Windows users
		who use PuTTY or similar to connect to irssi. The purpose behind it is
		to allow more control over irssi using the Windows GUI. When you first
		start the application, it will open the configuration window where you
		enter the information to connect to the proxy. Once connected, it will
		then display popup notifications in the tray to alert you of when your
		nickname is mentioned.
	</p>
	<p>
		Another feature I added to this application is to be able to control the
		away feature of irssi. When IrssiNotify connects to the proxy, it learns
		if the user is set to away or not. Then from the tray icon, you can
		set away or back. You can also set and change an away message.
	</p>
	<p>
		Future development for this application will include making it work with
		<a href="http://www.mono-project.com/Main_Page">mono</a> so it will be
		platform independant. Another feature I would like to add (if possible)
		is loading the irssi highlight settings and using them to control popup
		notifications.
	</p>
</div>