<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="cropper.css">
<script src="cropper.js"></script>
 
 <img id="image" style="width: 1000px;" src="pic.jpg" >

 <script>
    
    $("#image").cropper();
 
    function crop()
    {
        $("#image").cropper('getCroppedCanvas').toBlob(function(blob)
        {
            var formData = new FormData();

            formData.append('croppedImage',blob);

            $.ajax('upload.php',
            {
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function()
                {
                    console.log('Upload success');
                },
                error: function()
                {
                    console.log('Upload error');
                }
            });
        });
        
    }
 </script>

 <style>
 
    .cropper-crop
    {
        display: none;
    }

    .cropper-bg
    {
        background: none;
    }

 
 </style>

<button onclick="crop()">Crop</button>