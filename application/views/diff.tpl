			<div id="description">
				<h3>The Diff</h3>
				<p>The diff is used to show differences between HTML documents in
				a way that shows visible changes in wording and even HTML tags.
				This page shows you the original version and the new version which
				should contain additions and/or removals from the original document.
				Then the output from the diff will show additions and removals of
				individual words and HTML tags.</p>
				<p><a href="/source/diff">View Source</a></p>
			</div>
			<div id="mainBox">
				<h2>Original Version</h2>
				<div id="original"><?php echo $original; ?></div>
				<hr />
				<h2>New Version</h2>
				<div id="new"><?php echo $new; ?></div>
				<hr />
				<h2>Diff Output</h2>
				<div id="diff"><?php echo $diff; ?></div>
			</div>