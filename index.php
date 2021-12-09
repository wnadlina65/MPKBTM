<?php
    include('../head.php');
?>
<!DOCTYPE html>
<head>
<link rel="icon" href="img/majlis-perbandaran-kuantan-300x262_esW.png" type="image/x-icon">
<link rel="shortcut icon" href="majlis-perbandaran-kuantan-300x262_esW.png" type="image/x-icon" />
<style>
body {

    background: url('img/blue_plain.jpg') no-repeat fixed center center;
    background-size: cover;
    font-family: Arial;
}

.logo {
    width: 154px;
    height: 161px;
    background: url('images/pbtlogo.png') no-repeat;
    margin: 30px auto;
}

.login-block {
    width: 320px;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    border-top: 5px solid #0a3d62;
    margin: 0 auto;
}

.login-block h1 {
    text-align: center;
    color: #000;
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 20px;
}

.login-block input {
    width: 100%;
    height: 50px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 14px;
    font-family: Arial;
    padding: 0 20px 0 50px;
    outline: none;
}

.login-block input#username {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#username:focus {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input#password {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#password:focus {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input:active, .login-block input:focus {
    border: 1px solid #1962AD;
}

.login-block button {
    width: 100%;
    height: 40px;
    background:#0a3d62;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #0a3d62;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Arial;
    outline: none;
    cursor: pointer;
}

.login-block button:hover {
    background:  #88C2EA;
}

</style>
</head>

<body>

<div class="logo"><img src="img/majlis-perbandaran-kuantan-300x262_esW.png" width="154" height="121"></div>
<div class="login-block">
    <h1><font face="arial" >Login</font></h1>
    <form name="form1" method="post" action="">
    <input type="text" value="" placeholder="No Pekerja" id="username" name="username" autocomplete="off" />
    <input type="password" value="" placeholder="Katalaluan" id="password" name="password" />
    <button type="submit" name="submit" class="login login-submit" value="login">Login</button></form>
</div>
</body>

</html>
