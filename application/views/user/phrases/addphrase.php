<div id="rightside">
    <p class="title-intro">短信短语&gt;&gt;增加自定义短语</p>
    <form action="<?=base_url('user/addphrase')?>" method="post">
        <table>
            <tr>
                <td class="blue"><span class="red">*</span>自定义短语类别名称</td>
                <td><label for="select"></label>
                    <select name="pgid" class="input-length" >
                        <?php foreach($pgroup as $item):?>
                            <option value="<?=$item['pgid']?>"><?=$item['pgname']?></option>
                        <?php endforeach ?>
                    </select></td>
            </tr>
            <tr>
                <td class="blue"><span class="red">*</span>自定义短语内容</td>
                <td>
                    <textarea name="pcontent" id="content" cols="30" rows="10"></textarea>
                    <p>最多为70字，已输入<span class="number" id="textnumber">0</span>字。</p>
                </td>
            </tr>
            <tr>
                <td class="blue">自定义短语描述</td>
                <td ><label for="textfield"></label>
                    <input name="pinfo" type="text" class="input-length" id="textfield"></td>
            </tr>
            <tr>
                <td colspan="2" class="blue">
                    <button type="submit" class="button-s">提交</button>
                    <button type="reset"  class="button-s">重置</button>
                </td>
            </tr>
        </table>

    </form>
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