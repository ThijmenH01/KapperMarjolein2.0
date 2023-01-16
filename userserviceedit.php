<?php
session_start();
include("db.php");
include("function.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Edit Accounts</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Bewerk & Update Gebruikers.
                            <a href="accountdashboard.php" class="btn btn-danger float-end">BACK</a>
                        </h3>
                    </div>
                    <div class="card-body">
                    <strong><label for="naam">email kapper</label></strong><br>
                        <select name="fileselect">
                        

                            <?php
                           
                            $stmt = $conn->prepare("SELECT * FROM users");
                            $stmt->execute();
    

                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['id'] . "" . $row['email'] . "'>" . $row['id'] . "&nbsp&nbsp" . $row['email'] . "</option>";

                            }



                            ?>
                        </select><br><br>
                        <strong><label for="naam">keuze service</label></strong><br>

                        <select name="fileselect">
                            <?php
                            $stmt = $conn->prepare("SELECT id, servicenaam FROM services");
                            $stmt->execute();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . $row['id'] . "" . $row['servicenaam'] . "'>" . $row['id'] . "&nbsp&nbsp" . $row['servicenaam'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>