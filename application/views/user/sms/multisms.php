<div id="rightside">
        <p class="title-intro">
            短信发送>>短信群发
						<span class="title">您的可用条数：&nbsp;&nbsp;&nbsp;移动：
							<span class="number"><?=$fee[0]?></span>条 联通：<span class="number"><?=$fee[1]?></span>条 电信:<span class="number"><?=$fee[2]?></span>条
						</span>
        </p>
        <div style="margin: 20px 0px 0px 30px;">
            <table>
                <tr>
                    <td class="blue">发送主题</td>
                    <td>
                        <input type="text" id="title" class="input-length" name="title"/>
                    </td>
                </tr>
                <tr>
                    <td class="blue">短信内容</td>
                    <td>
                        <textarea style="width:600px;height: 80px" name="content" id="content" cols="30" rows="10"></textarea>
                        <p>最多可输入<span class="number">70</span>字，已输入<span class="number" id="textnumber">0</span>字</p>
                    </td>
                </tr>
                <tr>
                    <td class="blue">选择自定义短语</td>
                    <td>
                        <select name="customphrases" id="customphrases">
                            <option value="">不使用</option>
                            <?php foreach($customphrases['result'] as $item):?>
                                <option value="<?=$item['pcontent']?>"><?=$item['pcontent']?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="blue">选择被叫号码</td>
                    <td>
                        <form id="fileform" action="<?=base_url('/user/uploadcallback')?>" method="post" enctype="multipart/form-data">
                            <input type="file" name="userfile" style="width: 150px">
                            <button type="submit">提交</button>
                            <span style="color: red">文件必须是txt格式</span>
                        </form>
                        <p><span>提交的合法号码数量<span class="number" id="submitnumber">0</span>个</span></p>
                        <p>下载被叫号码模板请点击：<a href="#">模板下载</a></p>
                    </td>
                </tr>
                <tr>
                    <td class="blue">发送时间</td>
                    <td>
                        <input type="text" style="width: 600px" disabled/>
                    </td>
                </tr>
                <tr>
                    <td class="blue">优先等级</td>
                    <td><input type="radio" value="l">低<input type="radio" value="m">中<input type="radio" value="h">高</td>
                </tr>
            </table>
            <button id="submitsms" class="send">短信发送</button>
        </div>
        <div style="display: none" id="number"></div>
        <div class="hold">
            <p class="blue border">说明</p>
            <p class="border">·被叫号码的填写格式：号码之间以英文输入法状态下的逗号隔开，如“12300000000,12300000000”</p>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#submitsms').click(function(){
            var title = $('#title').val();
            var content = $('#content').val();
            var number = $('#number').text();
            $.post("<?=base_url('user/multisms')?>", {
                'title':title,
                'content':content,
                'number':number
            },function(data){
                document.location.reload();
            })
        });
        $('#content').keydown(function(){
            if($('#content').val().length+1 > 70){
                alert('字数超过限制');
                $('#content').val($('#content').val().slice(0, 70));
            }
            $('#textnumber').text($('#content').val().length+1);
        })
        $('#customphrases').change(function(){
            var checkValue = $('#customphrases').val();
            $('#content').val(checkValue);
        })
    })
</script>
</body>
</html>