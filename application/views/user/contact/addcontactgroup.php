<div id="rightside">
            <p class="title-intro">联系人&gt;&gt;添加联系人组</p>
            <form action="<?=base_url('user/addcontactgroup')?>" method="post">
                <table>
                    <tr>
                        <td class="blue"><span class="red">*</span>联系人组名称</td>
                        <td><input type="text" name="cgname" class="input-length"/></td>
                    </tr>
                    <tr>
                        <td class="blue"><span class="red">*</span>联系人组描述</td>
                        <td>
                            <textarea name="cginfo" cols="30" rows="10"></textarea>
                            <p>最多为<span class="number">100</span>字，已输入<span class="number">0</span>字。</p>
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
</body>
</html>