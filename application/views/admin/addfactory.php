<div id="main">
    <div id="leftside">
        <ul>
            <li><a href="<?=base_url('user/generalsms')?>">短信发送</a></li>
            <li><a href="<?=base_url('user/smsbox')?>">收件箱</a></li>
            <li><a href="<?=base_url('user/sendbox')?>">发件箱</a></li>
            <li><a href="<?=base_url('user/addcontact')?>">联系人</a></li>
            <li><a href="<?=base_url('user/addphrase')?>">短信短语</a></li>
            <li><a href="<?=base_url('admin/manage')?>">用户管理</a></li>
            <ul id="next">
                <li><a href="<?=base_url('admin/manage')?>">企业管理</a></li>
                <li><a href="<?=base_url('admin/usermanage')?>">用户管理</a></li>
                <li><a href="<?=base_url('admin/operatehistory')?>">操作记录查询</a></li>
                <li><a href="<?=base_url('admin/charge')?>">账号充值</a></li>

            </ul>
        </ul>
    </div>
    <div id="rightside">
        <p class="title-intro">用户管理</p>
            <form action="<?=base_url('admin/manage/add')?>" method="post">
                <table>
                    <tr>
                        <td class="blue"><span class="red">*</span>名称</td>
                        <td>
                            <label for="fname"></label>
                            <input name="fname" type="text" class="input-length" id="textfield">
                        </td>
                    </tr>
                    <tr>
                        <td class="blue"><span class="red">*</span>联系人</td>
                        <td>
                            <input name="contactman" type="text" class="input-length" id="textfield2">
                        </td>
                    </tr>
                    <tr>
                        <td class="blue"><span class="red">*</span>手机号</td>
                        <td>
                            <input name="contactnumber" type="text" class="input-length" id="textfield3">
                        </td>
                    </tr>
                    <tr>
                        <td class="blue">备注</td>
                        <td>
                            <textarea name="info" id="content" cols="30" rows="10"></textarea>
                            <p>最多为100字，已输入<span class="number" id="textnumber">0</span>字。</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="blue">
                            <button type="submit" class="button-s">提交</button>
                            <button type="reset" class="button-s">重置</button>
                        </td>
                    </tr>
                </table>

            </form>
    </div>
</div>
</div>
<script type="text/javascript">
    $(function(){
        $('#content').keyup(function(){
            if($('#content').val().length > 100){
                alert('字数超过限制');
                $('#content').val($('#content').val().slice(0, 100));
            }
            $('#textnumber').text($('#content').val().length);
        })
    })
</script>
</body>
</html>