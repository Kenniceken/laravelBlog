<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>New Blog Posted</title>
</head>
<body>
	<h2>Hi {{ $user->name }} !</h2>
	<hr>
	<p>A new Blog titled "{{ $blog->title }}" has been Published on obiomablog.com by {{ $blog->user->name }}
	</p>
</body>
</html>