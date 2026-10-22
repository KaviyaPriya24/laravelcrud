<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://jsdelivr.net" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="crossorigin">

</head>

<body>

    <div>
        <p class="text-danger">Login</p>
        <form action="" id="loginForm">
            @csrf
            <label for="">Email</label>
            <input type="email" name="email" id="email">
            <span id="emailerror" class="text-danger"></span>
            <label for="">Password</label>
            <input type="password" name="password" id="password">
            <span id="passworderror" class="text-danger"></span>

            <button type="submit" id="loginBtn">Login</button>
        </form>
    </div>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/4.0.0/jquery.min.js"></script>
    <script src="https://jquery.com" integrity="sha256-6ov986DGr2R9S+5vU5H2g" crossorigin="anonymous"></script>
    <script src="https://jsdelivr.net" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="crossorigin"></script>


    <script>
        $(document).ready(function() {
            $("#loginForm").submit(function(e) {
                $("#loginBtn").prop('disabled', true).text('loading');
                e.preventDefault();
                let email = $("#email").val();
                let password = $("#password").val();
                let formData = new FormData(this);
                let isValid = true;

                if (email == '') {
                    $("#emailerror").text("email is required")
                    isValid = false
                }
                if (password == '') {
                    $("#passworderror").text("Password is required")
                    isValid = false

                }
                if (!isValid) {
                    return;
                }
                $.ajax({
                    url: "/login",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                       console.log(res);
                       window.location.href=res.redirect
                        $("#loginBtn").prop('disabled', false).text('login');

                    },
                    error: function(xhr) {
                        console.log(xhr);
                        if (xhr.status == 400) {
                            console.log(xhr.responseJSON.message);

                        }
                        alert(xhr.responseJSON.message)
                        $("#loginBtn").prop('disabled', false).text('login');

                    }
                })
            })

        });
    </script>
</body>

</html>