<?php
    include_once 'model.php';
    include_once 'controller.php';
    include_once 'view.php';

    $db = new Database();
    $model = new Model($db);
    $view = new View();
    $controller = new Controller($model, $view);

    $controller->processRequest();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
    <link rel="icon" href="./assets/img/dark-vador.ico" type="image/x-icon">
    <title>The Force</title>
</head>
<body>
    <header class="bg-dark text-white text-center py-4">
        <img src="./assets/img/ForceHeader.png" class="img-fluid" alt="Image">
    </header>

    <div class="container mt-4">
        <img src="./assets/img/ForceBeWithU.png" class="img-fluid" alt="Image">

        <form method="POST" action="index.php">
            <button type="submit" name="addDarkStar" class="btn btn-dark">Add Force to Dark Star</button>
            <button type="submit" name="addJedi" class="btn btn-dark">Add Force to Jedi</button>
        </form>

        <div class="mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>Clan</th>
                        <th>Total Force</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $controller->displayDataInTable(); ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <?php echo $view->displayPercentages($controller->totalDS, $controller->totalJ); ?>
        </div>
    </div>
</body>
</html>