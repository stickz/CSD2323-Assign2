<!DOCTYPE html>
<html>
<head>
    <title>CSD-2323 Assignment 2 for <?php echo gethostname(); ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1 class="col-xs-12">CSD-2323 Assignment 2 for <?php echo gethostname(); ?></h1>
        </div>
        <div class="row">
            <?php
                try {
                    $db = new PDO('mysql:host=localhost;dbname=assign2', 'assign2', 'P@ssw0rd');
                    echo '<table class="col-xs-12 table">';
                    foreach ($db->query('SELECT * FROM personal') as $row) {
                        echo '<tr><td>' . $row['name'] . '</td>' .
                            '<td>' . $row['email'] . '</td>' .
                            '<td>' . $row['description'] . '</td>' .
                            '</tr>';
                    }
                    echo '</table>';
                } catch (PDOException $ex) {
                    ?>
                    <div class="alert alert-error alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Error!</strong> Database Error Occurred.
                        <script>console.log('Error: <?php echo $ex->getMessage; ?>');</script>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</body>
</html>
