<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Form Validation</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



</head>
<body>


<div class="container-fluid">
        {!! Session::has('success') ? '<div class="alert alert-success alert-dismissible">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'. Session::get("success") .'</div>' : '' !!}
        {!! Session::has('error') ? '<div class="alert alert-danger alert-dismissible">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'. Session::get("error") .'</div>' : '' !!}
        <form action="/store" method="post" id="form_id">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" minlength="2" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="01633613553">
                    </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleInputFile">File input</label>--}}
{{--                            <input type="file" id="exampleInputFile">--}}
{{--                            <p class="help-block">Example block-level help text here.</p>--}}
{{--                        </div>--}}
{{--                        <div class="checkbox">--}}
{{--                            <label>--}}
{{--                                <input type="checkbox"> Check me out--}}
{{--                            </label>--}}
{{--                        </div>--}}
                    <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
</div>




<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
</body>
</html>

<script>
    $( document ).ready(function() {
        $("#form_id").validate({
            rules: {
                phone: {
                    required: true,
                    minlength: 11
                }
            },
            messages: {
                phone: {
                    required: "Required input",
                    minlength: jQuery.validator.format("Please, at least {11} characters are necessary")
                }
            },
            highlight: function(element) {
                $(element).parent().addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).parent().removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'validation-error-message help-block form-helper bold',
            errorPlacement: function(error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });
    });
</script>
