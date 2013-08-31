<div id="main">
        <div id="leftside">
            <ul>
                <li><a href="<?=base_url('user/generalsms')?>">短信发送</a></li>
                <li><a href="<?=base_url('user/smsbox')?>">收件箱</a></li>
                <li><a href="<?=base_url('user/sendbox')?>">发件箱</a></li>
                <li><a href="<?=base_url('user/addcontact')?>">联系人</a></li>
                <li><a href="<?=base_url('user/addphrase')?>">短信短语</a></li>
                <li class="white"><a href="<?=base_url('user/manage')?>">用户管理</a></li>
            </ul>
        </div>
        <div id="rightside">
            <p class="title-intro">用户管理&gt;&gt;用户管理</p>
            <form action="" method="post">
                <table>
                    <tr>
                        <td width="305" class="blue">用户名</td>
                        <td width="483"><label for="select"></label>								  <label for="textfield2">
                                <input type="text" name="usrname" style="width:400px">
                            </label></td>
                    </tr>
                    <tr>
                        <td colspan="2" >
                            <button type="button" class="button-s" value="<?=base_url('user/manage/select')?>">查询</button>
                            <button type="button" class="button-s" value="<?=base_url('user/manage/add')?>">新增</button>
                            <button type="button" class="button-s" value="<?=base_url('user/manage/del')?>">删除</button>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td colspan="5" class="blue">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="5"><span class="result">查询结果：共<span>0</span>条记录，当前<span>0/0</span>页</span>
                            <a href="#" class="button-s">首页</a>
                            <a href="#" class="button-s">上一页</a>
                            <a href="#" class="button-s">下一页</a>
                            <a href="#" class="button-s">尾页</a></td>
                    </tr>						  <tr>
                        <td width="106" class="blue"><input type="checkbox" name="checkbox" id="checkbox">
                            <label for="checkbox">全选</label></td>
                        <td width="169" class="blue">用户名</td>
                        <td width="254" class="blue">备注</td>
                        <td width="130" class="blue">角色</td>
                        <td width="117" class="blue">操作</td>
                    </tr>
                        <?php if(isset($user)):?>
                            <?php foreach($user as $item):?>
                                <tr>
                                <td width="106">
                                    <input type="checkbox" name="checkbox" id="checkbox">
                                </td>
                                <td width="169"><?=$item['usrname']?></td>
                                <td width="254">无</td>
                                <td width="130">管理员</td>
                                <td width="117">操作</td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                </table>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('.button-s').click(function(){
            $("form").attr('action', $(this).val());
            $("form").submit();
        })
    })
</script>
</body>
</html>