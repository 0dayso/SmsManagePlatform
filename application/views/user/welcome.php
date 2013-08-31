    <div id="main">
        <div id="leftside">
            <ul>
                <li><a href="<?=base_url('user/generalsms')?>">短信发送</a></li>
                <li><a href="<?=base_url('user/smsbox')?>">收件箱</a></li>
                <li><a href="<?=base_url('user/sendbox')?>">发件箱</a></li>
                <li><a href="<?=base_url('user/addcontact')?>">联系人</a></li>
                <li><a href="<?=base_url('user/addphrase')?>">短信短语</a></li>
                <li><a href="<?=base_url('user/manage')?>">用户管理</a></li>
            </ul>
        </div>
        <div id="rightside">
            <div id="intro">
                <p>欢迎您使用恒洲信通！祝您使用愉快！</p>
                <p>今天是<?=date('Y年n月j日 g点i分 A', time())?></p>
                <p>您可使用的条数为：移动<span><?=$fee[0].'条'?></span>联通<span><?=$fee[1].'条'?>
                    </span>电信<span><?=$fee[2].'条'?>
                    </span></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>