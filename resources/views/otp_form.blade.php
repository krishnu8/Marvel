<style>
    .height-100 {
        height: 100vh
    }

    .card {
        width: 400px;
        border: none;
        height: 300px;
        box-shadow: 0px 5px 20px 0px #d2dae3;
        z-index: 1;
        display: flex;
        justify-content: center;
        align-items: center
    }

    .card h6 {
        color: red;
        font-size: 20px
    }

    .inputs input {
        width: 40px;
        height: 40px
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0
    }

    .card-2 {
        background-color: #ffffff00;
        padding: 10px;
        width: 350px;
        height: 100px;
        bottom: -50px;
        left: 20px;
        position: absolute;
        border-radius: 5px
    }

    .card-2 .content {
        margin-top: 50px
    }

    .card-2 .content a {
        color: red
    }

    .form-control:focus {
        box-shadow: none;
        border: 2px solid red
    }

    .validate {
        border-radius: 20px;
        height: 40px;
        background-color: red;
        border: 1px solid red;
        width: 140px
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body style="background-image: url('{{ URL::to('/') }}/pictures/walll.jpg');background-color: aqua;">
    @if (session('forget'))
        <div class="alert forget alert-warning alert-dismissible fade show" role="alert"
            style="min-width: 350px; right: 20px; top: 50px; z-index:1; position: absolute;">
            {{ session('forget') }}
        </div>

        <script>
            // Automatically close the alert after 5 seconds
            setTimeout(function() {
                $('.forget').alert('close');
            }, 3000);
        </script>
    @endif
    <div class="container height-100 d-flex justify-content-center align-items-center"
        style="background-color: #d2dae300">
        <div class="position-relative">
            <div class="card p-2 text-center" style="background-color: #fdfdfdbd">
                <h6>Please enter the one time password <br> to verify your account</h6>
                <div> <span>A code has been sent to your email</span> <small></small> </div>
                {{-- <b>{{ $email }} </b> --}}
                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                    <input class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" />
                    <input class="m-2 text-center form-control rounded" type="text" id="second" maxlength="1" />
                    <input class="m-2 text-center form-control rounded" type="text" id="third" maxlength="1" />
                    <input class="m-2 text-center form-control rounded" type="text" id="fourth" maxlength="1" />
                    <input class="m-2 text-center form-control rounded" type="text" id="fifth" maxlength="1" />
                    <input class="m-2 text-center form-control rounded" type="text" id="sixth" maxlength="1" />
                </div>
                <div class="mt-4"> <button class="btn btn-primary px-4 validate"
                        onclick="submit_data()">Validate</button> </div>
            </div>
            <div class="card-2">
                <div class="content d-flex justify-content-center align-items-center"> <a href="login_form"><button
                            class="btn btn-danger px-4 validate">Cancel</button></a></div>
            </div>
        </div>
    </div>

    <form action="{{ URL::to('/') }}/check_otp" style="display:none;" method="get">

        <input type="text" name="entered_otp" id="entered_otp">
        {{-- <input type="text" name="email" value="{{ $email }}"> --}}
        <input type="submit" value="submit" id="submit" hidden>
    </form>
</body>


<script>
    document.addEventListener("DOMContentLoaded", function(event) {

        function OTPInput() {
            const inputs = document.querySelectorAll('#otp > *[id]');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener('keydown', function(event) {
                    if (event.key === "Backspace") {
                        inputs[i].value = '';
                        if (i !== 0) inputs[i - 1].focus();
                    } else {
                        if (i === inputs.length - 1 && inputs[i].value !== '') {
                            return true;
                        } else if (event.keyCode > 47 && event.keyCode < 58) {
                            inputs[i].value = event.key;
                            if (i !== inputs.length - 1) inputs[i + 1].focus();
                            event.preventDefault();
                        } else if (event.keyCode > 64 && event.keyCode < 91) {
                            inputs[i].value = String.fromCharCode(event.keyCode);
                            if (i !== inputs.length - 1) inputs[i + 1].focus();
                            event.preventDefault();
                        }
                    }
                });
            }
        }
        OTPInput();

    });
</script>

<script>
    function submit_data() {
        // Get values of all input fields
        var firstValue = document.getElementById('first').value;
        var secondValue = document.getElementById('second').value;
        var thirdValue = document.getElementById('third').value;
        var fourthValue = document.getElementById('fourth').value;
        var fifthValue = document.getElementById('fifth').value;
        var sixthValue = document.getElementById('sixth').value;

        // Concatenate thevalues
        var concatenatedValue = firstValue + secondValue + thirdValue + fourthValue + fifthValue + sixthValue;
        document.getElementById('entered_otp').value = concatenatedValue;

        document.getElementById('submit').addEventListener('click', function() {});


        // setTimeout(function() {
        document.getElementById("submit").click();
        // }, 2000);

    }
</script>
