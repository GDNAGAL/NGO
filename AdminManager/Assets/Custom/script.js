$(document).ready(function(){
    $(document).on("click","#carouselImage", function(){
        $("#carouselManageModal").modal('show')
    })

    //preview uploaded image
    $("#ImageInput").on('change',function(e){
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    })

    //Set Title in Preview
    $("#TitleInput").on('keyup',function(){
        if($(this).val().trim().length<1){
            $("#titlePreview").html('Title of The Image.');
        }else{
            $("#titlePreview").html($(this).val());
        }
    })

    //Set Button Text in Preview
    $("#ButtonTextInput").on('keyup',function(){
        if($(this).val().trim().length<1){
            $("#buttonPreview").html('Button');
        }else{
            $("#buttonPreview").html($(this).val());
        }
    })

    //Set Button Background in Preview
    $("#ButtonStyleInput").on('change',function(){
        $("#buttonPreview").removeClass();
        $("#buttonPreview").addClass($(this).val());
    })
})