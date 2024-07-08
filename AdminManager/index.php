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

    <style>
        .overlay {
        position: absolute;
        /* top: 0; */
        left: 0;
        right: 0;
        bottom: 20px;
        display: flex;
        flex-direction:column;
        justify-content: center;
        align-items: center;
        color: white;
        /* background-color: rgba(0, 0, 0, 0.5);  */
        }
    </style>
</head>
<body>
<?php require("include/header.php"); ?>

<div class="container-fluid">
    <div class="mt-3">
        <h4 class="border-start border-4 ps-2">Home Page Slider</h4>
        <div class="row text-center">
            <div class="col-md-2 col-6 pb-2">
                <div id="carouselImage" class="border simg shadow text-end rounded p-1" style="aspect-ratio: 100 / 47; background: url('https://www.doghomefoundation.com/wp-content/uploads/2024/06/thumb-1.jpg') no-repeat center center; background-size: cover;"></div>
            </div>
            <div class="col-md-2 col-6 pb-2">
                <div class="border simg shadow rounded p-1" style="aspect-ratio: 100 / 47; background: url('https://www.doghomefoundation.com/wp-content/uploads/2024/06/thumb-1.jpg') no-repeat center center; background-size: cover;"></div>
            </div>
            <div class="col-md-2 col-6 pb-2">
                <div class="border simg shadow rounded p-1" style="aspect-ratio: 100 / 47; background: url('https://www.doghomefoundation.com/wp-content/uploads/2024/06/thumb-1.jpg') no-repeat center center; background-size: cover;"></div>
            </div>
            <div class="col-md-2 col-6 pb-2">
                <div class="border simg shadow rounded p-1" style="aspect-ratio: 100 / 47; background: url('https://www.doghomefoundation.com/wp-content/uploads/2024/06/thumb-1.jpg') no-repeat center center; background-size: cover;"></div>
            </div>
            <div class="col-md-2 col-6 pb-2">
                <div class="border simg shadow rounded p-1" style="aspect-ratio: 100 / 47; background: url('https://www.doghomefoundation.com/wp-content/uploads/2024/06/thumb-1.jpg') no-repeat center center; background-size: cover;"></div>
            </div>
            <div class="col-md-2 col-6 pb-2">
                <div class="border simg shadow rounded p-1" style="aspect-ratio: 100 / 47; background: url('https://www.doghomefoundation.com/wp-content/uploads/2024/06/thumb-1.jpg') no-repeat center center; background-size: cover;"></div>
            </div>
            <div class="col-md-2 col-6 pb-2">
                <div class="border simg shadow rounded p-1" style="aspect-ratio: 100 / 47; background: url('https://www.doghomefoundation.com/wp-content/uploads/2024/06/thumb-1.jpg') no-repeat center center; background-size: cover;"></div>
            </div>
            <div class="col-md-2 col-6 pb-2">
                <div class="border simg shadow rounded p-1" style="aspect-ratio: 100 / 47; background: url('https://www.doghomefoundation.com/wp-content/uploads/2024/06/thumb-1.jpg') no-repeat center center; background-size: cover;"></div>
            </div>
            <div class="col-md-2 col-6 pb-2">
                <div class="border simg shadow rounded p-1" style="aspect-ratio: 100 / 47; background: url('Assets/images/upload.png') no-repeat center center; background-size: cover;"></div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <h4 class="border-start border-4 ps-2">Our Achivements</h4>
        <div class="border p-4 shadow rounded">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col" width="150px">Value</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Made Happy Animal</td>
                        <td>
                            <input type="text" class="form-control">
                        </td>
                        <td>
                            <button class="btn btn-dark shadow-none">Save</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Permanent Resident</td>
                        <td>
                            <input type="text" class="form-control">
                        </td>
                        <td>
                            <button class="btn btn-dark shadow-none">Save</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Successful Adoption</td>
                        <td>
                            <input type="text" class="form-control">
                        </td>
                        <td>
                            <button class="btn btn-dark shadow-none">Save</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Donation Completed</td>
                        <td>
                            <input type="text" class="form-control">
                        </td>
                        <td>
                            <button class="btn btn-dark shadow-none">Save</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    






<!-- Modal -->
<div class="modal fade" id="carouselManageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Slider Image</h1>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pt-0">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-1">
                    <label for="TitleInput" class="form-label">Enter Image Title</label>
                    <input type="text" class="form-control" id="TitleInput">
                </div>
                <div class="mb-1">
                    <label for="ButtonTextInput" class="form-label">Enter Button Text</label>
                    <input type="text" class="form-control" id="ButtonTextInput">
                </div>
                <div class="mb-1">
                    <label for="ButtonURLInput" class="form-label">Enter Button URL</label>
                    <input type="text" class="form-control" id="ButtonURLInput">
                </div>
                <div class="mb-1">
                    <label for="ButtonStyleInput" class="form-label">Select Button Style</label>
                    <select class="form-control" id="ButtonStyleInput">
                        <option>Select Button Style</option>
                        <option value="btn btn-success">btn-success</option>
                        <option value="btn btn-danger">btn-danger</option>
                        <option value="btn btn-primary">btn-primary</option>
                        <option value="btn btn-danger">btn-danger</option>
                    </select>
                </div>
                <div class="mb-1">
                    <label for="ImageInput" class="form-label">Choose Image <span class="text-danger">(Size 1440 x 675px)</span></label>
                    <input type="file" class="form-control" id="ImageInput">
                </div>
                <div class="modal-footer p-0">
                    <button type="button" class="btn btn-danger shadow-none" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-dark shadow-none me-0">Save Changes</button>
                </div>
            </div>
            <div class="col-md-8">
                <h6 class="text-center">Web Preview</h6>
                <div class="border position-relative" style="width:100%; aspect-ratio: 100 / 47;">
                    <img src="https://media.istockphoto.com/id/1226328537/vector/image-place-holder-with-a-gray-camera-icon.jpg?s=612x612&w=0&k=20&c=qRydgCNlE44OUSSoz5XadsH7WCkU59-l-dwrvZzhXsI=" id="imagePreview" alt="" width="100%" height="100%">
                    <div class="overlay">
                        <h3 class="text-dark" id="titlePreview">Title of The Image.</h3>
                        <button class="btn btn-primary" id="buttonPreview">Button</button>
                    </div>
                </div>
            </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>    
<script src="Assets/Custom/script.js"></script>
</body>
</html>