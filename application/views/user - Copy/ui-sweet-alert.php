<?php
$page = 'sweet-alert';
?>
<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="utf-8" />
<title>SweetAlert</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- App favicon -->
<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/Decision-168.png">

   <?php
include('header_links.php');
?>
</head>

<body data-sidebar="dark">
<!-- Begin page -->
<div id="layout-wrapper">

    <?php
    include('header.php');
    ?>
<!-- ========== Left Sidebar Start ========== -->
    <?php
    include('sidebar.php');
    ?>
<!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">SweetAlert</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">SweetAlert</a></li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Examples</h4>
                                <p class="card-title-desc">A beautiful, responsive, customizable
                                    and accessible (WAI-ARIA) replacement for JavaScript's popup boxes. Zero
                                    dependencies.</p>

                                <div class="row text-center">
                                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-2">
                                        <div class="p-3">
                                            <p>A basic message</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-basic">Click me</button>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-2">
                                        <div class="p-3">
                                            <p>A title with a text under</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-title">Click me</button>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-2">
                                        <div class="p-3">
                                            <p>A success message!</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-success">Click me</button>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-2">
                                        <div class="p-3">
                                            <p>A warning message, with a function attached to the "Confirm"-button...</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-warning">Click me</button>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-2">
                                        <div class="p-3">
                                            <p>By passing a parameter, you can execute something else for "Cancel".</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-params">Click me</button>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-2">
                                        <div class="p-3">
                                            <p>A message with custom Image Header</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-image">Click me</button>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-2">
                                        <div class="p-3">
                                            <p>A message with auto close timer</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-close">Click me</button>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-2">
                                        <div class="p-3">
                                            <p>Custom HTML description and buttons</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="custom-html-alert">Click me</button>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-2">
                                        <div class="p-3">
                                            <p>A custom positioned dialog</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="sa-position">Click me</button>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-2">
                                        <div class="p-3">
                                            <p>A message with custom width, padding and background</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="custom-padding-width-alert">Click me</button>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-2">
                                        <p>Ajax request example</p>
                                        <button type="button" class="btn btn-primary waves-effect waves-light" id="ajax-alert">Click me</button>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-2">
                                        <div class="p-3">
                                            <p>Chaining modals (queue) example</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="chaining-alert">Click me</button>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-sm-6 mb-2">
                                        <div class="p-3">
                                            <p>Dynamic queue example</p>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" id="dynamic-alert">Click me</button>
                                        </div>
                                    </div>

                                </div> <!-- end row -->

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <?php
        include('footer.php');
        ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
<script src="<?php echo base_url();?>assets/libs/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?php echo base_url();?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?php echo base_url();?>assets/libs/node-waves/waves.min.js"></script>


<!-- Sweet alert init js-->
<script src="<?php echo base_url();?>assets/js/pages/sweet-alerts.init.js"></script>

<?php
include('footer_links.php');
?>

</body>

</html>