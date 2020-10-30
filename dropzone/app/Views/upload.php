<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url('public/assets/dropzone.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('public/assets/dropzone.css'); ?>">
</head>
<body>

<div class="container">
    <form action="<?php echo base_url(route_to('ajax_image_upload')); ?>" class="dropzone">
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
    </form>

    <div class="form-group">
        <label for="usr">Resim ID:</label>
        <input type="text" class="form-control" id="image_id">
    </div>
    <div class="form-group">
        <label for="pwd">Resim URL:</label>
        <input type="text" class="form-control" id="image_url">
    </div>
</div>

</body>
<script>
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone('.dropzone');
    myDropzone.on('complete', function (param){
        let obj = JSON.parse(param.xhr.response);
        $('#image_id').val(obj.data.id);
        $('#image_url').val(obj.data.url);
    })
</script>
</html>