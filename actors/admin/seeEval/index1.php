<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .required
        {
            color: red;
        }
    </style>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="code/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="code/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="code/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="code/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="code/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Teacher Evaluations</h2>
                    <form action = "see_eval.php" method="get">
                        <div class="input-group">
                            <span class="required">*</span>
                            <input class="input--style-3" type="text" placeholder="Enter faculty ID" name="facultyID">
                        </div>
                        <div class="input-group">
                            <span class="required">*</span>
                            <input class="input--style-3" type="text" placeholder="Enter course ID" name="courseID">
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="secID">
                                    <option value = "0">sec ID </option>
                                    <option value = "1">1</option>
                                    <option value = "1">2</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="year">
                                    <option value = "0">year:</option>
                                    <option value = "2020">2020</option>
                                    <option value = "2019">2019</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="semester">
                                    <option value = "0">semester:</option>
                                    <option value = "fall">fall</option>
                                    <option value = "spring">spring</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit">See results</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="code/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="code/vendor/select2/select2.min.js"></script>
    <script src="code/vendor/datepicker/moment.min.js"></script>
    <script src="code/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="code/js/global.js"></script>

</body>

</html>