<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CPSLMS</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');
                
            * {
                font-family: 'Poppins', sans-serif;
            }

            .divider:after,
            .divider:before {
                content: "";
                flex: 1;
                height: 1px;
                background: #eee;
            }
            .h-custom {
             height: calc(100% - 73px);
            }
            @media (max-width: 450px) {
                .h-custom {
                    height: 100%;
                }
            }
            
            .blink_text {
            -webkit-animation-name: blinker;
            -webkit-animation-duration: 1s;
            -webkit-animation-timing-function: linear;
            -webkit-animation-iteration-count: infinite;

            -moz-animation-name: blinker;
            -moz-animation-duration: 1s;
            -moz-animation-timing-function: linear;
            -moz-animation-iteration-count: infinite;

            animation-name: blinker;
            animation-duration: 1s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;

            color:red;
            font-size:16px;
            text-align: center;
            }

            @-moz-keyframes blinker {  
            0% { opacity: 1.0; }
            50% { opacity: 0.0; }
            100% { opacity: 1.0; }
            }

            @-webkit-keyframes blinker {  
            0% { opacity: 1.0; }
            50% { opacity: 0.0; }
            100% { opacity: 1.0; }
            }

            @keyframes blinker {  
            0% { opacity: 1.0; }
            50% { opacity: 0.0; }
            100% { opacity: 1.0; }
            }

            body{
                background-image: url('dist/img/20180309_161009.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: top;
            }

            #login{
                border: 1px solid white;
                background-color: white;
                padding: 3%;
                border-radius: 10px;
            }

        </style>
    </head>
    <body>
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        
                    </div>
                    <div id="login" class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form action="/sessions" method="post" id = 'form'>
                            <div class="divider d-flex align-items-center my-4">
                                <p class="text-center fs-1 mx-3 mb-0">LOGIN</p>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="form3Example3" class="form-control form-control-lg"
                                placeholder="Enter username" name="username" autofocus='autofocus' required />
                                <label class="form-label" for="form3Example3">Username</label>
                                <?php if (isset($errors['username'])) : ?>
                                    <p class="fs-6 text-danger"><?= $errors['username'] ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="form-outline mb-3">
                                <input type="password" id="form3Example4" class="form-control form-control-lg"
                                placeholder="Enter password"  name="password" />
                                <label class="form-label" for="form3Example4">Password</label>
                                <?php if (isset($errors['password'])) : ?>
                                    <p class="fs-6 text-danger"><?= $errors['password'] ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="d-grid gap-2">
                                <button class="btn btn-success btn-lg" type="submit" name="login">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </section>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    </body>
</html>