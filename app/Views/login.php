<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Generate Netflix</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,700);
        @import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);

        body, html {
        height: 100%;
        }
        body {
        font-family: 'Open Sans';
        font-weight: 100;
        display: flex;
        overflow: hidden;
        }
        input {
        ::-webkit-input-placeholder {
            color: rgba(255,255,255,0.7);
        }
        ::-moz-placeholder {
            color: rgba(255,255,255,0.7);  
        }
        :-ms-input-placeholder {  
            color: rgba(255,255,255,0.7);  
        }
        
        }

        input:focus {
            outline: 0 transparent solid;
            ::-webkit-input-placeholder {
            color: rgba(0,0,0,0.7);
            }
            ::-moz-placeholder {
            color: rgba(0,0,0,0.7);  
            }
            :-ms-input-placeholder {  
            color: rgba(0,0,0,0.7);  
            }
        }

        .login-form {
        //background: #222;
        //box-shadow: 0 0 1rem rgba(0,0,0,0.3);
        min-height: 10rem;
        margin: auto;
        max-width: 50%;
        padding: .5rem;
        }
        .login-text {
        //background: hsl(40,30,60);
        //border-bottom: .5rem solid white;
        color: white;
        font-size: 1.5rem;
        margin: 0 auto;
        max-width: 50%;
        padding: .5rem;
        text-align: center;
        //text-shadow: 1px -1px 0 rgba(0,0,0,0.3);
        
        }

        .login-text .fa-stack-1x {
            color: black;
        }

        .login-username, .login-password {
        background: transparent;
        border: 0 solid;
        border-bottom: 1px solid rgba(white, .5);
        color: white;
        display: block;
        margin: 1rem;
        padding: .5rem;
        transition: 250ms background ease-in;
        width: calc(100% - 3rem);
        
        }

        .login-username:focus, .login-password:focus {
            background: #c2c2c2;
            color: black;
            transition: 250ms background ease-in;
        }


        .login-forgot-pass {
        //border-bottom: 1px solid white;
        bottom: 0;
        color: white;
        cursor: pointer;
        display: block;
        font-size: 75%;
        left: 0;
        opacity: 0.6;
        padding: .5rem;
        position: absolute;
        text-align: center;
        //text-decoration: none;
        width: 100%;
        
        }

        .login-forgot-pass:hover {
            opacity: 1;
        }
        .login-submit {
            border: 1px solid white;
            background: transparent;
            color: white;
            display: block;
            margin: 1rem auto;
            min-width: 1px;
            padding: .25rem 1rem;
            transition: 250ms background ease-in;
            border-radius: 5px;
            cursor: pointer;
        
        }

        .login-submit:hover {
            background: white;
            color: black;
            transition: 250ms background ease-in;
        }

        .login-submit:focus {
            background: white;
            color: black;
            transition: 250ms background ease-in;
        }




        [class*=underlay] {
        left: 0;
        min-height: 100%;
        min-width: 100%;
        position: fixed;
        top: 0;
        }
        .underlay-photo {
        animation: hue-rotate 6s infinite;
        background: url('https://img.freepik.com/vector-gratis/fondo-patron-textura-fibra-carbono-negro_1017-33436.jpg');
        background-size: contain;
        -webkit-filter: grayscale(30%);
        z-index: -1;
        }
        .underlay-black {
        background: rgba(0,0,0,0.7);
        z-index: -1;
        }

        @keyframes hue-rotate {
        from {
            -webkit-filter: grayscale(30%) hue-rotate(0deg);
        }
        to {
            -webkit-filter: grayscale(30%) hue-rotate(360deg);
        }
        }
    </style>
</head>
<body>
<div class="login-form">
  <p class="login-text">
    <span class="fa-stack fa-lg">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-lock fa-stack-1x"></i>
    </span>
  </p>
  <input type="user" class="login-username" autofocus="true" required="true" placeholder="User" />
  <input type="password" class="login-password" required="true" placeholder="Password" />
  <input type="submit" name="Login" value="Login" class="login-submit" />
</div>
<a href="#" class="login-forgot-pass">forgot password?</a>
<div class="underlay-photo"></div>
<div class="underlay-black"></div> 

<script>
    $boton = document.querySelector('.login-submit');
    $boton.addEventListener('click', function(){
        $user = document.querySelector('.login-username').value;
        $password = document.querySelector('.login-password').value;
        
        $rutaHelper = '<?= base_url('api/v1/fetchLogin') ?>';
        console.log($rutaHelper);
        fetch($rutaHelper, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                user: $user,
                password: $password
            })
        })
        .then( res => {
            console.log(res);
            return res.json();
        })
        .then( data => {
            if(data.status){
                window.location.href = '<?= base_url('/dashboard') ?>';
            }else{
                alert(data.message);
                console.log(data);
            }
        })
    });
</script>
</body>
</html>