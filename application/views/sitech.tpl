		<div id="description">
			<h3>SiTech</h3>
			<p>This is a very simlistic and minimal library that I have created
			to help aid the development of sites. The point behind SiTech is not
			just to speed the development of applications, but to use minimal
			amounts of code to aid them.</p>
			<p><a href="http://websvn.php-oop.net/PHP%20Projects.SiTech" class="new-window">Browse Source</a></p>
		</div>
		<div id="mainBox">
			<h2>SiTech Library</h2>
			<p>
				While SiTech stands for Simple Technologies, the library is very
				capable of being advanced. Its purpose is to provide an easy way
				to start a website, but still be customizable. The problem I've
				found with most frameworks, is the fact that they are very complex
				and convoluted in nature. While this works for some projects
				and people, I prefer a more minimal approach. My insparation for
				SiTech was to create a set of tools that can be expanded on to
				create a full site, instead of providing everything you'll ever
				need. This makes it much easier for the coder to customize
				behaviour of the code itself and gain much more control.
			</p>
			<p>
				SiTech uses multiple technologies and tools to aid the development
				of websites, without getting in the way. The point is to be able
				to use specific classes from SiTech, and only getting that class.
				If you load the database class, you get just the database class
				and nothing else. If you want to use the template engine, that's
				what you get, nothing else is tied into it. Currently, SiTech
				supports the following sections:
				<ul>
					<li>
						<a name="SiTech_ConfigParser"></a>
						<strong>SiTech_ConfigParser</strong> - Configuration
						parser that can parse INI files, XML files, and PHP files
						that assign a $config variable array. This works very
						similar to the python <a href="http://docs.python.org/library/configparser.html#module-ConfigParser" class="new-window">ConfigParser</a> module.
					</li>
					<li>
						<a name="SiTech_Console"></a>
						<strong>SiTech_Console</strong> - Currently only supports
						a SiTech_Console_GetOpts class that works somewhat similar
						to the python <a href="http://docs.python.org/library/getopt.html#module-getopt" class="new-window">getopt</a> module.
					</li>
					<li>
						<a name="SiTech_Controller"></a>
						<strong>SiTech_Controller</strong> - While SiTech is not
						a framework, I have included very basic controller code
						to aid in development. This can be used in combination
						with <a href="sitech#SiTech_Template">SiTech_Template</a> to
						create a simple framework.
					</li>
					<li>
						<a name="SiTech_DB"></a>
						<strong>SiTech_DB</strong> - Database objects extending
						PDO and adding functionality like getting permissions
						for MySQL and easy delete/insert/update methods.
					</li>
					<li>
						<a name="SiTech_Filter"></a>
						<strong>SiTech_Filter</strong> - This extends the filter
						extension from PHP ot make things a bit more streamlined.
						Future plans for this include adding more validation and
						sanitaion of values that aren't included in the filter
						extension. I would also like to make this independent of
						the filter extension at some point.
					</li>
					<li>
						<a name="SiTech_Loader"></a>
						<strong>SiTech_Loader</strong> - This extends the built
						in SPL autoload functionality. It provides some error
						checking when loading classes, and it provides a method
						to load controllers if you're using SiTech to create a
						framework style application.
					</li>
					<li>
						<a name="SiTech_Session"></a>
						<strong>SiTech_Session</strong> - Session management made
						easy. This uses the default PHP session extension and
						builds functionality on top of it. It's got handlers for
						storage that can use the traditional flat files, or a
						database engine that uses the <a href="sitech#SiTech_DB">SiTech_DB</a>
						object to store data. It also adds some functionality
						to remember the session data, and also strict IP checking
						to help security.
					</li>
					<li>
						<a name="SiTech_Template"></a>
						<strong>SiTech_Template</strong> - Template classes to
						help aid in the site design itself. You must assign variables
						to the template object, then you can render or display
						the template itself. It includes a very	simple PHP style
						template engine that allows you to use PHP code in your
						templates. Another engine, Macro, is based off of Smarty
						style templates, but without all the functionality of
						Smarty. It makes a simpler way to use variables and simple
						statements in your templates.
					</li>
					<li>
						<a name="SiTech_Uri"></a>
						<strong>SiTech_Uri</strong> - The Uri class is for managing
						the URL used to navigate to the site. If no URL is passed
						to the constructor, it will generate a URL based on preset
						variables found in $_SERVER. This is used within the
						controller code in SiTech to make it easier to parse
						information being sent to the program.
					</li>
				</ul>
			</p>
		</div>