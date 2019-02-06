<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">

  <!-- This places a title specific to what the page is-->
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>

	<div class="container-fluid">
	    <!-- Yield tags are like copy and paste -->
	    @yield('main')

	</div>
</body>
</html>

<!--  So all this stuff it's basically like anythign that extends/implements 'layout' with a tag,
            it can use this template for other styling. So all the pages will look similar. -->
