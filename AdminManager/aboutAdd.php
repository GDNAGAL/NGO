<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Panel</title>
    <link rel="stylesheet" href="Assets/Bootstrap/Bootstrap.css">
    <link rel="stylesheet" href="Assets/Custom/Style.css">
    <script src="Assets/Bootstrap/Bootstrap.js"></script>
    <script src="Assets/JQuery/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <!-- <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script> -->
    <script src="ckeditor/ckeditor.js"></script>
    <style>

    </style>
</head>
<body style="background:#EDEFF7">
<!-- <?php require("include/header.php"); ?> -->

<div class="container-fluid pt-3">
    <div class="m-1">
        <div class="d-flex bg-white shadow-sm align-items-center p-2 mb-3 rounded-3 justify-content-between">
            <div class="d-flex align-items-center">
                <i class="bi bi-arrow-left rounded-pill fw-bold me-2 ps-2 pe-2" style="font-size:24px; cursor:pointer"></i>
                <!-- <img src="https://www.blogger.com/img/logo_blogger_40px_2x.png" width="30px" height="30px" alt=""> -->
            </div>
            <button class="btn btn-dark ms-3 shadow-none">Publish <i class="bi bi-cloud-arrow-up ms-2"></i></button>
        </div>
    </div>
    <div class="bg-white shadow-sm align-items-center p-2 mb-3 rounded-3 m-1">
        <form method="POST">
            <div class="mb-3 d-flex">
                <input type="text" class="form-control" placeholder="Enter Page Title">
            </div>
            <textarea id="editor" name="editor"></textarea>
        </form>
    </div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>    
<script src="Assets/Custom/script.js"></script>
<script>
    CKEDITOR.replace('editor',{
        height:'60vh'
    });
</script>
</body>
</html>