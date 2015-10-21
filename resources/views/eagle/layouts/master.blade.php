<html>
<head>
    <meta charset="UTF-8">
    <title>Eagle App Maker</title>
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2//css/bootstrap.min.css" rel="stylesheet">
        <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
        <link href="/css/roboto.min.css" rel="stylesheet">
        <link href="/css/material.min.css" rel="stylesheet">
        <link href="/css/ripples.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/">Eagle</a>
            </div>
 
          </div>
        </nav>
    @yield('content')


    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2//js/bootstrap.min.js"></script>

        <script src="/js/ripples.min.js"></script>
        <script src="/js/material.min.js"></script>
        <script src="/js/main.js"></script>
        <script>
            $(document).ready(function() {
                // This command is used to initialize some elements and make them work properly
                $.material.init();
            });
        </script>
</body>
</html>