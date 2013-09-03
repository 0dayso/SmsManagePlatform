<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="<?=base_url('styles/main.css')?>" type="text/css" rel="stylesheet"/>
    <title>恒洲信通短信平台</title>
</head>
<body>
<div id="s-wrapper">
    <div id="s-main">
        <form action="<?=base_url('start/login')?>" method="post">
            <div id="factory">
                <label for="factory">企业账号：</label><input type="text" name="fname"/>
            </div>
            <div id="username">
                <label for="username">用户名：</label><input type="text" name="usrname"/>
            </div>
            <div id="password">
                <label for="password">密码：</label><input type="password" name="passwd"/>
            </div>
            <div id="check">
                <label for="check">验证码：</label><input type="text" name="check"/>
                <div id="check-img"><?=$image?></div>
            </div>
            <div id="submit">
                <input type="submit" value="登录"/>
            </div>
        </form>
    </div>
</div>
</body>
</html>