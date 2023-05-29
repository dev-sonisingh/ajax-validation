<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container" style="margin-top: 40px">
        <div class="row">
            <div class="col-lg-6 col-offset-6">
                <div class="alert alert-success" role="alert" id="successMsg" style="display: none">
                    Thank you for getting in touch!
                </div>

                <form id="SubmitForm">
                    <div class="mb-3">
                        <label for="InputName" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="InputName">
                    </div>

                    <div class="mb-3">
                        <label for="InputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="InputEmail">
                        <span class="text-danger" id="emailErrorMsg"></span>
                    </div>

                    <div class="mb-3">
                        <label for="InputPhone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" name="phone" id="InputPhone">
                        <span class="text-danger" id="phoneErrorMsg"></span>
                    </div>

                    <div class="mb-3">
                        <label for="InputMessage" class="form-label">Message</label>
                        <textarea class="form-control" name="message" id="InputMessage" cols="30" rows="4"></textarea>
                        <span class="text-danger" id="messageErrorMsg"></span>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script type="text/javascript">
        $('#SubmitForm').on('submit', function(e) {
            e.preventDefault();

            let name = $('#InputName').val();
            let email = $('#InputEmail').val();
            let mobile = $('#InputMobile').val();
            let message = $('#InputMessage').val();

            $.ajax({
                url: "/submit-form",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: name,
                    email: email,
                    mobile: mobile,
                    message: message,
                },
                success: function(response) {
                    $('#successMsg').show();
                    console.log(response);
                },
                error: function(response) {
                    $('#nameErrorMsg').text(response.responseJSON.errors.name);
                    $('#emailErrorMsg').text(response.responseJSON.errors.email);
                    $('#mobileErrorMsg').text(response.responseJSON.errors.mobile);
                    $('#messageErrorMsg').text(response.responseJSON.errors.message);
                },
            });
        });
    </script>
</body>

</html>
