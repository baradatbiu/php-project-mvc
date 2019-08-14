<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="/css/starter-template.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index">Авторизация</a></li>
                <li><a href="reg">Регистрация</a></li>
                <li><a href="list">Список пользователей</a></li>
                <li><a href="index">Список файлов</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <div class="form-container">
        <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
            <div class="form-group">
                <label for="inputLogin" class="col-sm-2 control-label">Логин</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputLogin" placeholder="Логин"
                           name="name" value="<?= $this->user['login'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Имя</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="Имя"
                           name="name" value="<?= $this->user['name'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAge" class="col-sm-2 control-label">Возраст</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputAge" placeholder="Возраст"
                           name="age" value="<?= $this->user['age'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputDesc" class="col-sm-2 control-label">О себе</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputDesc" placeholder="О себе"
                           name="description" value="<?= $this->user['description'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPhoto" class="col-sm-2 control-label">Фото</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="inputPhoto" name="photo">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Сохранить</button>
                </div>
            </div>
        </form>
    </div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/bootstrap.min.js"></script>

</body>
</html>
