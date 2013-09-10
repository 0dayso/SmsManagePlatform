<div id="rightside">
        <p class="title-intro">
            短信发送>>常规短信
						<span class="title">您的可用条数：&nbsp;&nbsp;&nbsp;移动：
							<span class="number"><?=$fee[0]?></span>条 联通：<span class="number"><?=$fee[1]?></span>条 电信:<span class="number"><?=$fee[2]?></span>条
						</span>
        </p>
        <form action="<?=base_url('user/generalsms')?>" method="post">
            <table>
                <tr>
                    <td class="blue">提示</td>
                    <td>
                        <p>可以多运营商号码混合提交</p>
                    </td>
                </tr>
                <tr>
                    <td class="blue">短信内容</td>
                    <td>
                        <textarea name="content" id="content" cols="30" rows="10"></textarea>
                        <p>最多可输入<span class="number">70</span>字，已输入<span class="number" id="textnumber">0</span>字，系统会按标准自动拆分<span class="number">0</span>条短信发送</p>
                    </td>
                </tr>
                <tr>
                    <td class="blue">选择自定义短语</td>
                    <td><select name="customphrases" id="customphrases">
                            <option value="0">不使用</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="blue">被叫号码</td>
                    <td>
                        <textarea name="number" id="" cols="30" rows="10"></textarea>
                        <p>说明：输入号码最多为<span class="number">1000</span>个，每两个号码中间用逗号隔开，如<span class="number">12300000000</span>,<span class="number">12300000000</span></p>
                    </td>
                </tr>
                <tr>
                    <td class="blue">选择被叫号码</td>
                    <td>
                        <input type="radio" name="contact-check">联系人<select name="contact">
                            <option value="0">不使用</option>
                            <?php foreach($contact['result'] as $item):?>
                                <option value="<?=$item['cnumber']?>"><?=$item['cname']?></option>
                            <?php endforeach ?>
                        </select>
                        <input type="radio" name="contactgroup-check">联系人组<select name="contactgroup">
                            <option value="">不使用</option>
                            <?php foreach($contactgroup as $item):?>
                                <option value="<?=$item['cgid']?>"><?=$item['cgname']?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="blue">发送时间</td>
                    <td><input type="text"  class="input-length" disabled/></td>
                </tr>
            </table>
            <button type="submit" class="send">短信发送</button>
        </form>
        <div class="hold">
            <p class="blue border">说明</p>
            <p class="border">·被叫号码的填写格式：号码之间以英文输入法状态下的逗号隔开，如“12300000000,12300000000”</p>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(function(){
        $('#content').keydown(function(){
            if($('#content').val().length+1 > 70){
                alert('字数超过限制');
                $('#content').val($('#content').val().slice(0, 70));
            }
            $('#textnumber').text($('#content').val().length+1);
        })
    })
</script>
</body>
</html>