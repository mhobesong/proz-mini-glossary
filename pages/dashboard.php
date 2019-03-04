<?php
$pageTitle = "Glossaries";
include (BASEDIR.'/pages/header.php');
include (BASEDIR.'/functions/db.php');
?>

<div class="container">
	<h1>Mini Glossary</h2>

	<form class="form well" id="create-glossary-form" method="POST" action="<?= BASEURL?>/api/glossary">
		<h3>Add Glossary</h3>
		<hr>
		<div class="form-group">
			<label for="">Title</label>
			<input type="text" name="glossary-name" placeholder="Glossary name" />
		</div>

		<div id="create-glossary-form-terms">
			<ul class="list-group">
			</ul>
		</div>

		<div class="form-group">
			<label for="">Term</label>
			<input type="text" name="glossary-item" placeholder="Glossary name" />
			<button type="button" id="add-glossary-term-button" class="btn btn-default">Add</button>
		</div>
		<button type="submit" class="btn btn-primary">Create</button>
	</form>

	<hr>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand">Glossary listing</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<form class="navbar-form navbar-right">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Find glossary">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<div id="glossary-listing"></div>

</div>

<script src="<?= BASEURL?>/assets/js/glossary.js"></script>
<?php
include (BASEDIR.'/pages/footer.php');
?>
