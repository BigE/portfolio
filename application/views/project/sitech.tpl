<script type="text/javascript">
$(document).ready(function () {
	$('#sitech-accord').accordion({active: false, collapsible: true});
});
</script>
		<div id="description" class="ui-widget ui-widget-content ui-corner-all">
			<div class="ui-widget-header ui-corner-top">
				<h3>SiTech</h3>
			</div>
			<p>This is a very simlistic and minimal library that I have created
			to help aid the development of sites. The point behind SiTech is not
			just to speed the development of applications, but to use minimal
			amounts of code to aid them.</p>
			<p><a href="http://github.com/BigE/SiTech" class="new-window">Browse Source</a></p>
		</div>
		<div id="box" class="ui-widget ui-widget-content ui-corner-all">
			<div class="ui-widget-header ui-corner-top">
				<h2>SiTech Library</h2>
			</div>
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
				<ul id="sitech-accord">
					<li>
						<h4><a name="SiTech_ConfigParser">SiTech\ConfigParser</a></h4>
						<div>
							Configuration parser that can parse INI files, XML files, and PHP files that assign a $config variable array.
							This works very similar to the python <a href="http://docs.python.org/library/configparser.html#module-ConfigParser" class="new-window">ConfigParser</a> module.
						</div>
					</li>
					<li>
						<h4><a name="SiTech_Console">SiTech\Console</a></h4>
						<div>
							Currently only supports a SiTech_Console_GetOpts class that works somewhat similar
							to the python <a href="http://docs.python.org/library/getopt.html#module-getopt" class="new-window">getopt</a> module.
						</div>
					</li>
					<li>
						<h4><a name="SiTech_Controller">SiTech\Controller</a></h4>
						<div>
							While SiTech is not a framework, I have included very basic controller code to aid in
							development. This can be used in combination with <a href="project/sitech.html#SiTech_Template">SiTech_Template</a>
							to create a simple framework.
						</div>
					</li>
					<li>
						<h4><a name="SiTech_DB">SiTech\DB</a></h4>
						<div>
							Database objects extending PDO and adding functionality like getting permissions
							for MySQL and easy delete/insert/update methods.
						</div>
					</li>
					<li>
						<h4><a name="SiTech_Filter">SiTech\Filter</a></h4>
						<div>
							This extends the filter extension from PHP ot make things a bit more streamlined.
							Future plans for this include adding more validation and sanitaion of values that
							aren't included in the filter extension. I would also like to make this independent of
							the filter extension at some point.
						</div>
					</li>
					<li>
						<h4><a name="SiTech_Loader">SiTech\Loader</a></h4>
						<div>
							This extends the built in SPL autoload functionality. It provides some error
							checking when loading classes, and it provides a method to load controllers
							if you're using SiTech to create a framework style application.
						</div>
					</li>
					<li>
						<h4><a name="SiTech_Session">SiTech\Session</a></h4>
						<div>
							Session management made easy. This uses the default PHP session extension and
							builds functionality on top of it. It's got handlers for storage that can use
							the traditional flat files, or a database engine that uses the <a href="project/sitech.html#SiTech_DB">SiTech\DB</a>
							object to store data. It also adds some functionality to remember the session
							data, and also strict IP checking to help security.
						</div>
					</li>
					<li>
						<h4><a name="SiTech_Template">SiTech\Template</a></h4>
						<div>
							Template classes to help aid in the site design itself. You must assign variables
							to the template object, then you can render or display the template itself. It
							includes a very	simple PHP style template engine that allows you to use PHP code
							in your templates. Another engine, Macro, is based off of Smarty style templates,
							but without all the functionality of Smarty. It makes a simpler way to use
							variables and simple statements in your templates.
						</div>
					</li>
					<li>
						<h4><a name="SiTech_Uri">SiTech\Uri</a></h4>
						<div>
							The Uri class is for managing the URL used to navigate to the site. If no URL
							is passed to the constructor, it will generate a URL based on preset variables
							found in $_SERVER. This is used within the controller code in SiTech to make it
							easier to parse information being sent to the program.
						</div>
					</li>
				</ul>
			</p>
		</div>