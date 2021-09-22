<?php
session_start();

if(!isset($_SESSION['tbl_admin'])){
    echo "<script>location='login.php';</script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Furniture</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App Icons -->
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <!-- C3 charts css -->
    <link href="../plugins/c3/c3.min.css" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Select 2 -->
    <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- Basic Css files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">


</head>

<body class="fixed-left">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <?php include "left-sidebar.php"; ?>
        <!-- Left Sidebar End -->
        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <!-- Top Bar Start -->
                <?php include "topbar.php"; ?>
                <!-- Top Bar End -->
                <!-- ==================
                PAGE CONTENT START
                ================== -->
                <div class="page-content-wrapper">
                    <div class="container-fluid">
                        <?php include "config.php"; ?></div>
                    <!-- container -->
                </div>
                <!-- Page content Wrapper -->
            </div>
            <!-- content -->
            <footer class="footer">© 2019 Furniture</span>
            </footer>
        </div>
        <!-- End Right content here -->
    </div>
    <!-- END wrapper -->
    <!-- jQuery  -->
    <script src="https://cdnjs.com/libraries/Chart.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <!-- Peity chart JS -->
    <script src="../plugins/peity-chart/jquery.peity.min.js"></script>
    <!--C3 Chart-->
    <script src="../plugins/d3/d3.min.js"></script>
    <script src="../plugins/c3/c3.min.js"></script>
    <!-- KNOB JS -->
    <script src="../plugins/jquery-knob/excanvas.js"></script>
    <script src="../plugins/jquery-knob/jquery.knob.js"></script>
    <!-- Page specific js -->
    <script src="assets/pages/dashboard.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <!-- Datatable js -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Responsive examples -->
    <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>
    <!-- Plugins js -->
    <script src="../plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
    <!-- <script src="../plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script> -->
    <!-- select2 js -->
    <script src="../plugins/select2/js/select2.min.js"></script>
    <!--Wysiwig js-->
    <script src="../plugins/tinymce/tinymce.min.js"></script>
        <!-- SweetAlert -->
    <script src="assets/js/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
            if ($("#elm1").length > 0) {
                tinymce.init({
                    selector: "textarea#elm1",
                    theme: "modern",
                    height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [{
                            title: 'Bold text',
                            inline: 'b'
                        },
                        {
                            title: 'Red text',
                            inline: 'span',
                            styles: {
                                color: '#ff0000'
                            }
                        },
                        {
                            title: 'Red header',
                            block: 'h1',
                            styles: {
                                color: '#ff0000'
                            }
                        },
                        {
                            title: 'Example 1',
                            inline: 'span',
                            classes: 'example1'
                        },
                        {
                            title: 'Example 2',
                            inline: 'span',
                            classes: 'example2'
                        },
                        {
                            title: 'Table styles'
                        },
                        {
                            title: 'Table row 1',
                            selector: 'tr',
                            classes: 'tablerow1'
                        }
                    ]
                });
            }
        });
    </script>
</body>

</html>