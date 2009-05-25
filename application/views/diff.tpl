			<div id="description">
				<h3>The Diff</h3>
				<p>The diff is used to show differences between HTML documents in
				a way that shows visible changes in wording and even HTML tags.
				This page shows you the original version and the new version which
				should contain additions and/or removals from the original document.
				Then the output from the diff will show additions and removals of
				individual words and HTML tags.</p>
			</div>
			<div id="mainBox">
				<h2>Original Version</h2>
				<p><?php echo $original; ?></p>
				<hr>
				<h2>New Version</h2>
				<p><?php echo $new; ?></p>
				<hr>
				<h2>Diff Output</h2>
				<p><?php echo $diff; ?></p>
			</div>