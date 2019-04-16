<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Сайт</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Сайт" />
    <meta name="keywords" content="Сайт" />
    <meta name="author" content="by any">
    <link type="text/css" rel="stylesheet" href="/public/css/bootstrap.min.css"/>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="row">
            <div class="col-md-12">
                <h1>Сайт</h1>
            </div>
        </div>
    </div>

    <?php require_once 'App/Views/navigation_view.php'; ?>
    <?php require_once 'App/Views/'.$content_view . '.php'; ?>

    <div class="footer">
        <div class="row">
            <div class="col-md-12">
                <p>здесь должен быть футер</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>