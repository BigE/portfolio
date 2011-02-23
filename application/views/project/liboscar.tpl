		<div id="description" class="ui-widget ui-widget-content ui-corner-all">
			<div class="ui-widget-header ui-corner-top">
				<h3>liboscar</h3>
			</div>
			<p>liboscar is a library written in C to help aid the development
			and use of the OSCAR protocol. The OSCAR protocol is used by the
			AIM and ICQ instant messengers. While there are other libraries
			such as libpurple that support this, liboscar aims to be an easy
			interface for applications to use without having to deal with the
			intricate peices of OSCAR itself.</p>
			<p><a href="http://websvn.php-oop.net/C.liboscar" class="new-window">Browse Source</a></p>
		</div>
		<div id="box" class="ui-widget ui-widget-content ui-corner-all">
			<div class="ui-widget-header ui-corner-top">
				<h2>liboscar</h2>
			</div>
			<p>The OSCAR protocol is used by AIM and ICQ to support instant
			messenger clients. Anyone who has dealt with the protocol itself
			knows that it is a very large and complex protocol. What liboscar is
			aimed to do, is to break down the protocol and simplify it. It will
			make it easier to interface with less direct interaction to the
			protocol by the programs that use it.</p>
			<p>While liboscar is still in early alpha stages, you can view and
			download the source through SVN. To view the source, you can click
			the "Browse Source" link to the left side. To download the source,
			you will need a SVN client which you can get from
			<a href="http://subversion.tigris.org/" class="new-window">http://subversion.tigris.org/</a>.
			Once you have a client, just enter the following command:
			<code>
				svn co https://svn.php-oop.net/C/liboscar/trunk liboscar
			</code>
			Once it is checked out of SVN, you can then build the source. Unfortunately
			so far, I have only been able to support the GNU make tools. I plan
			in the future to add support for Windows and Visual Studio.
			</p>
		</div>