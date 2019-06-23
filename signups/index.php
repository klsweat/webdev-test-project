<?php
require('../config/db.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Webdev Test Project</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- Custom styles -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="https://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css" rel="stylesheet">


    <style type="text/css">

        /* Sticky footer styles
        -------------------------------------------------- */

        html,
        body {
            height: 100%;
            /* The html and body elements cannot have any padding or margin. */
        }

        /* Wrapper for page content to push down footer */
        #wrap {
            min-height: 100%;
            height: auto !important;
            height: 100%;
            /* Negative indent footer by it's height */
            margin: 0 auto -60px;
        }

        /* Set the fixed height of the footer here */
        #push,
        #footer {
            height: 60px;
        }

        #footer {
            background-color: black;
        }

        /* Lastly, apply responsive CSS fixes as necessary */
        @media (max-width: 767px) {
            #footer {
                margin-left: -20px;
                margin-right: -20px;
                padding-left: 20px;
                padding-right: 20px;
            }
        }

        /* Custom page CSS
        -------------------------------------------------- */
        /* Not required for template or sticky footer method. */

        #wrap > .container {
            padding-top: 60px;
        }

        .container .credit {
            margin: 20px 0;
        }

        code {
            font-size: 80%;
        }

    </style>
</head>

<body>

<!-- Part 1: Wrap all page content here -->
<div id="wrap">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="header">
                <img src="../assets/images/scad-logo-cropped.png" alt="logo"/>
                <h1>TEST PROJECT</h1>
            </div>
        </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
        <div class="row">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign Ups</h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?
                    $sql = "select * from subscriptions";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_array()) {
                        $sid = $row['sid'];
                        $name = $row['name'];
                        $email = $row['email'];
                        echo "<tr><td>$sid</td><td>$name</td><td>$email</td></tr>";
                    }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div id="footer">
    <div class="copyright">
        © <strong>SCAD</strong>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script src="../assets/js/js.js?v=1" type="text/javascript"></script>

</body>


</html>

