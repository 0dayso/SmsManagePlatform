    <div id="main">
        <div id="leftside">
            <ul>
                <li><a href="<?=base_url('user/generalsms')?>">短信发送</a></li>
                <li><a href="<?=base_url('user/smsbox')?>" class="white">收件箱</a></li>
                <li><a href="<?=base_url('user/sendbox')?>">发件箱</a></li>
                <li><a href="<?=base_url('user/addcontact')?>">联系人</a></li>
                <li><a href="<?=base_url('user/addphrase')?>">短信短语</a></li>
                <li><a href="<?=base_url('user/manage')?>">用户管理</a></li>
            </ul>
        </div>
        <div id="rightside">
            <p class="title-intro">收件箱</p>
            <form>
                <table>
                    <tr>
                        <td width="200" class="blue">主叫号码</td>
                        <td width="146"><input type="text" name="textfield" id="textfield"></td>
                        <td width="218" class="blue">被叫号码</td>
                        <td width="218"><label for="textfield2"></label>
                            <input type="text" name="textfield2" id="textfield2"></td>
                    </tr>
                    <tr>
                        <td class="blue" >起始时间</td>
                        <td ><label for="textfield3"></label>
                            <input type="text" name="textfield3" id="textfield3"></td>
                        <td class="blue" >截止时间</td>
                        <td ><label for="textfield4"></label>
                            <input type="text" name="textfield4" id="textfield4"></td>
                    </tr>
                    <tr>
                        <td colspan="4" >
                            <a href="#" class="button-s">查询</a>

                            <a href="#" class="button-s">删除</a>							    </td>
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
                        <td width="92" class="blue"><input type="checkbox" name="checkbox" id="checkbox">
                            <label for="checkbox">全选</label></td>
                        <td width="130" class="blue">主叫号码</td>
                        <td width="130" class="blue">被叫号码</td>
                        <td width="233" class="blue">短信内容</td>
                        <td width="129" class="blue">接收时间</td>
                    </tr>
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>

                </table>


            </form>
        </div>
    </div>
</div>
</body>
</html>