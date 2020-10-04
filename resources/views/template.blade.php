<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
</head>

<body>

    <div class="main">

        <div class="container">
            <form method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data">
                <h3></h3>
                <fieldset>
                    <span class="step-current"> <span class="step-current-content"><span class="step-number"><span>01</span>/03</span></span> </span>
                    <div class="fieldset-flex">
                        <figure>
                            <img src="https://colorlib.com/etc/bwiz/colorlib-wizard-18/images/signup-img-1.png" alt="">
                        </figure>
                        <div class="fieldset-content">
                            <h2>What do you think about AU services ?</h2>
                            <div class="form-flex">
                                <label for="rating_quanlity">Overall Quality</label>
                                <div class="form-rating">
                                    <input type="radio" id="rating_quanlity_5" name="rating_quanlity" value="5" checked /><label for="rating_quanlity_5" title="Rocks!"></label>
                                    <input type="radio" id="rating_quanlity_4" name="rating_quanlity" value="4" checked /><label for="rating_quanlity_4" title="Pretty good"></label>
                                    <input type="radio" id="rating_quanlity_3" name="rating_quanlity" value="3" checked /><label for="rating_quanlity_3" title="Meh"></label>
                                    <input type="radio" id="rating_quanlity_2" name="rating_quanlity" value="2" /><label for="rating_quanlity_2" title="Kinda bad"></label>
                                    <input type="radio" id="rating_quanlity_1" name="rating_quanlity" value="1" /><label for="rating_quanlity_1" title="Sucks big time"></label>
                                </div>
                            </div>
                            <div class="form-flex">
                                <label for="rating_use">Ease of Use</label>
                                <div class="form-rating">
                                    <input type="radio" id="rating_use_5" name="rating_use" value="5" /><label for="rating_use_5" title="Rocks!"></label>
                                    <input type="radio" id="rating_use_4" name="rating_use" value="4" /><label for="rating_use_4" title="Pretty good"></label>
                                    <input type="radio" id="rating_use_3" name="rating_use" value="3" /><label for="rating_use_3" title="Meh"></label>
                                    <input type="radio" id="rating_use_2" name="rating_use" value="2" /><label for="rating_use_2" title="Kinda bad"></label>
                                    <input type="radio" id="rating_use_1" name="rating_use" value="1" /><label for="rating_use_1" title="Sucks big time"></label>
                                </div>
                            </div>
                            <div class="form-flex">
                                <label for="rating_features">Features & Functionality</label>
                                <div class="form-rating">
                                    <input type="radio" id="rating_features_5" name="rating_features" value="5" /><label for="rating_features_5" title="Rocks!"></label>
                                    <input type="radio" id="rating_features_4" name="rating_features" value="4" /><label for="rating_features_4" title="Pretty good"></label>
                                    <input type="radio" id="rating_features_3" name="rating_features" value="3" /><label for="rating_features_3" title="Meh"></label>
                                    <input type="radio" id="rating_features_2" name="rating_features" value="2" /><label for="rating_features_2" title="Kinda bad"></label>
                                    <input type="radio" id="rating_features_1" name="rating_features" value="1" /><label for="rating_features_1" title="Sucks big time"></label>
                                </div>
                            </div>
                            <div class="form-flex">
                                <label for="rating_support">Custormer Support</label>
                                <div class="form-rating">
                                    <input type="radio" id="rating_support_5" name="rating_support" value="5" /><label for="rating_support_5" title="Rocks!"></label>
                                    <input type="radio" id="rating_support_4" name="rating_support" value="4" /><label for="rating_support_4" title="Pretty good"></label>
                                    <input type="radio" id="rating_support_3" name="rating_support" value="3" /><label for="rating_support_3" title="Meh"></label>
                                    <input type="radio" id="rating_support_2" name="rating_support" value="2" /><label for="rating_support_2" title="Kinda bad"></label>
                                    <input type="radio" id="rating_support_1" name="rating_support" value="1" /><label for="rating_support_1" title="Sucks big time"></label>
                                </div>
                            </div>
                            <div class="form-flex">
                                <label for="rating_value">Value of Money</label>
                                <div class="form-rating">
                                    <input type="radio" id="rating_value_5" name="rating_value" value="5" /><label for="rating_value_5" title="Rocks!"></label>
                                    <input type="radio" id="rating_value_4" name="rating_value" value="4" /><label for="rating_value_4" title="Pretty good"></label>
                                    <input type="radio" id="rating_value_3" name="rating_value" value="3" /><label for="rating_value_3" title="Meh"></label>
                                    <input type="radio" id="rating_value_2" name="rating_value" value="2" /><label for="rating_value_2" title="Kinda bad"></label>
                                    <input type="radio" id="rating_value_1" name="rating_value" value="1" /><label for="rating_value_1" title="Sucks big time"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h3></h3>
                <fieldset>
                    <span class="step-current"><span class="step-current-content"><span class="step-number"><span>02</span>/03</span></span></span>
                    <div class="fieldset-flex">
                        <figure>
                            <img src="images/signup-img-2.png" alt="">
                        </figure>
                        <div class="fieldset-content">
                            <div class="form-textarea">
                                <label for="your_review" class="form-label">Your Review</label>
                                <textarea name="your_review" id="your_review" placeholder="Write your comment here"></textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h3></h3>
                <fieldset>
                    <span class="step-current"><span class="step-current-content"><span class="step-number"><span>03</span>/03</span></span></span>
                    <div class="fieldset-flex">
                        <figure>
                            <img src="images/signup-img-3.png" alt="">
                        </figure>
                        <div class="fieldset-content">
                            <label class="form-label">Enter your information manually below</label>
                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" name="first_name" id="first_name" placeholder="First Name" />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" placeholder="Last Name" />
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Email" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone_number" id="phone_number" placeholder="Phone number" />
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

    </div>

    <!-- JS -->
    {{-- <script src="vendor/jquery/jquery.min.js"></script> --}}
    {{-- <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script> --}}
    {{-- <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script> --}}

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>

    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
    {{-- <script src="js/main.js"></script> --}}
</body>

</html>