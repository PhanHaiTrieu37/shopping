
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How to Install Froala Editor in Laravel App?</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.13/css/froala_editor.pkgd.min.css">
</head>
<body>
<div class="container">
    <div class="row mt-5 pt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h1 class="text-center">How to Install Froala Editor in Laravel App?</h1>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mt-3">
                            <label>Title:</label>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="mt-3">
                            <label>Description:</label>
                            <textarea id="description" name="description" class="form-control" rows="3" placeholder="description" required>{{ isset($post) ? $post->description : ''}}</textarea>
                            <div class="invalid-tooltip">This field is required</div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class=" btn btn-primary">Submit post create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.13/js/froala_editor.pkgd.min.js"></script>
<script>
    $(document).ready(function() {
        var editor = new FroalaEditor('#description');
    });
</script>
</html>
