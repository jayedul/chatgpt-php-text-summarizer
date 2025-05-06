<!doctype html>
<html data-theme="light">
	<head>
		<title>Article or Job post Summarizer</title>

		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Summarize any article and save your time."/>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

		<script src="./static/scripts.js"></script>
	</head>
	<body>
		<header class="text-center">
			<br/>
			<h2>Content Summarizer</h2>
			<p>
				Write or paste any type of text contents and click Summarize.
			</p>
		</header>
		<br/>
		<br/>
		<main id="summarizer" class="container" style="max-width: 600px;">
			<div>
				<textarea id="content-input" type="text" class="form-control" placeholder="Paste any article here.." style="height: 200px; resize: both;"></textarea>
			</div>
			<br/>
			<div class="text-center">
				<span id="notice" class="d-block"></span>
				<button class="btn btn-primary">Summarize <span></span></button>
			</div>

			<br/>

			<div class="container" id="output">

			</div>
		</main>

		<br/>
		<br/>
	</body>
</html>
