<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,700);
@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);
body, html {
  height: 100%;
}

body {
  font-family: "Open Sans";
  font-weight: 100;
  display: flex;
  overflow: hidden;
}

input ::-webkit-input-placeholder {
  color: rgba(255, 255, 255, 0.7);
}
input ::-moz-placeholder {
  color: rgba(255, 255, 255, 0.7);
}
input :-ms-input-placeholder {
  color: rgba(255, 255, 255, 0.7);
}
input:focus {
  outline: 0 transparent solid;
}
input:focus ::-webkit-input-placeholder {
  color: rgba(0, 0, 0, 0.7);
}
input:focus ::-moz-placeholder {
  color: rgba(0, 0, 0, 0.7);
}
input:focus :-ms-input-placeholder {
  color: rgba(0, 0, 0, 0.7);
}

.login-form {
  min-height: 10rem;
  margin: auto;
  max-width: 50%;
  padding: 0.5rem;
}

.login-text {
  color: white;
  font-size: 1.5rem;
  margin: 0 auto;
  max-width: 50%;
  padding: 0.5rem;
  text-align: center;
}
.login-text .fa-stack-1x {
  color: black;
}

.login-username, .login-password {
  background: transparent;
  border: 0 solid;
  border-bottom: 1px solid rgba(255, 255, 255, 0.5);
  color: white;
  display: block;
  margin: 1rem;
  padding: 0.5rem;
  transition: 250ms background ease-in;
  width: calc(100% - 3rem);
}
.login-username:focus, .login-password:focus {
  background: white;
  color: black;
  transition: 250ms background ease-in;
}

.login-forgot-pass {
  bottom: 0;
  color: white;
  cursor: pointer;
  display: block;
  font-size: 75%;
  left: 0;
  opacity: 0.6;
  padding: 0.5rem;
  position: absolute;
  text-align: center;
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
  padding: 0.25rem;
  transition: 250ms background ease-in;
}
.login-submit:hover, .login-submit:focus {
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
  background: url("https://31.media.tumblr.com/41c01e3f366d61793e5a3df70e46b462/tumblr_n4vc8sDHsd1st5lhmo1_1280.jpg");
  background-size: cover;
  -webkit-filter: grayscale(30%);
  z-index: -1;
}

.underlay-black {
  background: rgba(0, 0, 0, 0.7);
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
    <form class="login-form" action="/admin/login" method="post">
    <p class="login-text">
        <span class="fa-stack fa-lg">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-lock fa-stack-1x"></i>
        </span>
    </p>
        <input type="text" name="email" class="login-username" autofocus="true" required="true" placeholder="Login" />
        <input type="password" name="password" class="login-password" required="true" placeholder="Password" />
        @csrf
        @if(isset($_GET['err']))
        <span style="color: red">{{$_GET['err']}}</span>
        @endif
        <input type="submit" name="Login" value="Login" class="login-submit" />
    </form> 
    <div class="underlay-photo"></div>
    <div class="underlay-black"></div> 
</body>
</html>