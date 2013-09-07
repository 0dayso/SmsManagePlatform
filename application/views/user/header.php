<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?=base_url('styles/main.css')?>" type="text/css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="<?=base_url('styles/datePicker.css')?>"/>
    <title>恒洲信通短信平台</title>
    <?php if($this->session->flashdata('err')):?>
        <script type="text/javascript">
            alert("<?=$this->session->flashdata('err')?>");
        </script>
    <?php endif ?>
    <script type="text/javascript" src="http://cdn.staticfile.org/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.staticfile.org/jquery.form/3.32/jquery.form.min.js"></script>
    <script type="text/javascript" src="<?=base_url('js/upload.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('js/date.js')?>"></script>
</head>
<body>
<div id="wrapper">
    <div id="head">
    </div>
    <div id="user-massage">
        <span>企业：<?=$fname?></span>
        <span>用户：<?=$usrname?></span>
        <a href="<?=base_url('start/logout')?>">退出登录</a>
    </div>