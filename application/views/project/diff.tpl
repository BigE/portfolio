						<div id="description" class="ui-widget ui-widget-content ui-corner-all">
							<div class="ui-widget-header ui-corner-top"><h3>The Diff</h3></div>
							<p>
								The diff is used to show differences between HTML documents in
								a way that shows visible changes in wording and even HTML tags.
								This page shows you the original version and the new version which
								should contain additions and/or removals from the original document.
								Then the output from the diff will show additions and removals of
								individual words and HTML tags.
							</p>
							<p><a href="source/diff.phps">View Source</a></p>
						</div>
						<div id="box" class="ui-widget ui-widget-content ui-corner-all">
							<div class="ui-widget-header ui-corner-top">
								<h2>Original Version</h2>
							</div>
							<p id="original"><?php echo $original; ?></p>
							<div class="ui-widget-header">
								<h2>New Version</h2>
							</div>
							<p id="new"><?php echo $new; ?></p>
							<div class="ui-widget-header">
								<h2>Diff Output</h2>
							</div>
							<p id="diff"><?php echo $diff; ?></p>
						</div>