<!DOCTYPE html>
<html lang="en">


<head>
<title>HYT Kırtasiye</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css">
<link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="../assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
<link rel="stylesheet" href="../assets/vendor/multi-select/css/multi-select.css">
<link rel="stylesheet" href="../assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css">
<link rel="stylesheet" href="../assets/vendor/nouislider/nouislider.min.css" />

<!-- Select2 -->
<link rel="stylesheet" href="../assets/vendor/select2/select2.css" />

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">

<!-- Demo CSS not Include in project -->
<style>
    .demo-card label{ display: block; position: relative;}
    .demo-card .col-lg-4{ margin-bottom: 30px;}
</style>

</head>
<body class="theme-cyan">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="https://thememakker.com/templates/lucid/html/assets/images/logo-icon.svg" width="48" height="48" alt="Lucid"></div>
        <p>Please wait...</p>        
    </div>
</div>
<!-- Overlay For Sidebars -->

<div id="wrapper">
<?php include "ust_menu.php";?>

<?php include "sol_menu.php";?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Ürün Ekle</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">Forms</li>
                            <li class="breadcrumb-item active">Advanced</li>
                        </ul>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                            <div class="sparkline text-left" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#00c5dc"
                                data-fill-Color="transparent">3,5,1,6,5,4,8,3</div>
                            <span>Visitors</span>
                        </div>
                        <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                            <div class="sparkline text-left" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#f4516c"
                                data-fill-Color="transparent">4,6,3,2,5,6,5,4</div>
                            <span>Visits</span>
                        </div>
                    </div>
                </div>
            </div>
            


            <!-- Advanced Select2 -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <!-- <div class="header">
                        <h2><strong>Advanced</strong> Select2 <small>Taken from <a href="http://select2.github.io/select2" target="_blank">select2.github.io/select2</a></small> </h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div> -->
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6">
                                <p> <b>Ana Kategori</b> </p>
                                <select class="form-control show-tick ms select2" data-placeholder="Select">
                                    <option></option>
                                    <option>Mustard</option>
                                    <option>Ketchup</option>
                                    <option>Relish</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <p> <b>Ara Kategori</b> </p>
                                <select class="form-control show-tick ms select2" data-placeholder="Select">
                                    <option></option>
                                    <option>Mustard</option>
                                    <option>Ketchup</option>
                                    <option>Relish</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <p> <b>Alt Kategori</b> </p>
                                <select class="form-control show-tick ms select2" data-placeholder="Select">
                                    <option></option>
                                    <option>Mustard</option>
                                    <option>Ketchup</option>
                                    <option>Relish</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <p> <b>Ürün Adı</b> </p>
                               <div class="form-group">
                                    <!-- <label>Text Input</label> -->
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                          
                        </div>
                        <br>
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6">
                                <p> <b>Marka</b> </p>
                               <div class="form-group">
                                    <!-- <label>Text Input</label> -->
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <p> <b>Model</b> </p>
                                <div class="form-group">
                                    <!-- <label>Text Input</label> -->
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <p> <b>Başlık(Kısa AÇıklama)</b> </p>
                                <div class="form-group">
                                    <!-- <label>Text Input</label> -->
                                   <input type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row clearfix">
                            
                            <div class="col-lg-4 col-md-6">
                                <p> <b>Ürün Kodu</b> </p>
                                <div class="form-group">
                                    <!-- <label>Text Input</label> -->
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <p> <b>Stok Adeti</b> </p>
                                <div class="form-group">
                                    <!-- <label>Text Input</label> -->
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <p> <b>Fiyatı</b> </p>
                                <div class="form-group">
                                    <!-- <label>Text Input</label> -->
                                   <input type="text" class="form-control money-dollar" placeholder="Ex: 99,99 TL">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row clearfix">
                            
                            <div class="col-lg-4 col-md-6">
                                <p> <b>Ürün Açıklama</b> </p>
                                 <textarea class="form-control" rows="5" required=""></textarea>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <p> <b>Ürün Açıklama</b> </p>
                                 <textarea class="form-control" rows="5" required=""></textarea>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <p> <b>Ürün Açıklama</b> </p>
                                 <textarea class="form-control" rows="5" required=""></textarea>
                            </div>
                        </div>
                            <br>
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6">
                                <p> <b>Resim Ekle</b> </p>
                                <div class="custom-file">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Resim Seç <input type="file" id="file">
                                        </span>
                                    </span>
                                    <img id='img-upload' style="width: 270px;" />
                                    <input type="text" class="form-control" style="height: auto;" name="resim" id="resim" readonly>
                                    <br>
                                    <label class="fancy-radio">
                                        <input type="radio" name="gender" value="female" data-parsley-multiple="gender">
                                        <span><i></i>Anasayfa Resim</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <p> <b>Resim Ekle</b> </p>
                                <div class="custom-file">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Resim Seç <input type="file" id="file">
                                        </span>
                                    </span>
                                    <img id='img-upload' style="width: 270px;" />
                                    <input type="text" class="form-control" style="height: auto;" name="resim" id="resim" readonly>
                                   <br>
                                    <label class="fancy-radio">
                                        <input type="radio" name="gender" value="female" data-parsley-multiple="gender">
                                        <span><i></i>Anasayfa Resim</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <p> <b>Resim Ekle</b> </p>
                                <div class="custom-file">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Resim Seç <input type="file" id="file">
                                        </span>
                                    </span>
                                    <img id='img-upload' style="width: 270px;" />
                                    <input type="text" class="form-control" style="height: auto;" name="resim" id="resim" readonly>
                                   <br>
                                    <label class="fancy-radio">
                                        <input type="radio" name="gender" value="female" data-parsley-multiple="gender">
                                        <span><i></i>Anasayfa Resim</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <p> <b>Resim Ekle</b> </p>
                                <div class="custom-file">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Resim Seç <input type="file" id="file">
                                        </span>
                                    </span>
                                    <img id='img-upload' style="width: 270px;" />
                                    <input type="text" class="form-control" style="height: auto;" name="resim" id="resim" readonly>
                                   <br>
                                    <label class="fancy-radio">
                                        <input type="radio" name="gender" value="male" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="gender">
                                        <span><i></i>Anasayfa Resim</span>
                                    </label>
                                </div>
                            </div>
                            
                          
                          
                        </div>
                        <br>
                        <div class="col-lg-12 col-md-12 text-right">
                            <button type="button" class="btn btn-success">Kaydet</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
            
        </div>
    </div>
    
</div>

<!-- Javascript -->
<script src="assets/bundles/libscripts.bundle.js"></script>    
<script src="assets/bundles/vendorscripts.bundle.js"></script>

<script src="../assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script> <!-- Bootstrap Colorpicker Js --> 
<script src="../assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js"></script> <!-- Input Mask Plugin Js --> 
<script src="../assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js"></script>
<script src="../assets/vendor/multi-select/js/jquery.multi-select.js"></script> <!-- Multi Select Plugin Js -->
<script src="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script> <!-- Bootstrap Tags Input Plugin Js --> 
<script src="../assets/vendor/nouislider/nouislider.js"></script> <!-- noUISlider Plugin Js --> 

<script src="../assets/vendor/select2/select2.min.js"></script> <!-- Select2 Js -->
    
<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/forms/advanced-form-elements.js"></script>
<script type="text/javascript">
    $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {
            
            var input = $(this).parents('.input-group').find(':text'),
                log = label;
            
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
        
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#file").change(function(){
            readURL(this);
        });     
    });
</script>
</body>
</html>

