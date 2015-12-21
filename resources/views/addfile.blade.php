<html>
    <head>
        <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Codetest</h1>
                    <h2>Test form</h2>
                    <form id="codetest-form" method="post" action="/">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" name="type" id="type" maxlength="30" value="file" />
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" maxlength="512" value="" />
                        </div>
                        <div class="form-group">
                            <label for="type">Body</label>
                            <textarea name="body" class="form-control" id="body" value="" ></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Go!</button>
                    </form>
                    <h2>Result</h2>
                    <div id="result"></div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('js/codetest-form.js') }}"></script>
    </body>
</html>