<div id="rightside">
            <p class="title-intro">联系人&gt;&gt;添加联系人</p>
            <form method="post">
                <table>
                    <tr>
                        <td class="blue"><span class="red">*</span>联系人姓名</td>
                        <td><input name="cname" type="text"  class="input-length"/></td>
                    </tr>
                    <tr>
                        <td class="blue"><span class="red">*</span>联系人号码</td>
                        <td><p>
                                <input name="cnumber" type="text"  class="input-length"/>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="blue"><span class="red">*</span>联系人邮箱</td>
                        <td><input name="cmail" type="text"  class="input-length"/></td>
                    </tr>
                    <tr>
                        <td class="blue"><span class="red">*</span>联系人公司</td>
                        <td><input name="ccompany" type="text"  class="input-length"/></td>
                    </tr>
                    <tr>
                        <td class="blue"><span class="red">*</span>联系人所属联系人组</td>
                        <td><label for="select"></label>
                            <select name="cgid" class="input-length">
                                <option value="无">无</option>
                                <?php foreach($cgroup as $item):?>
                                    <option value="<?=$item['cgid']?>"><?=$item['cgname']?></option>
                                <?php endforeach ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td class="blue">联系人备注</td>
                        <td>
                            <textarea name="cinfo" id="" cols="30" rows="10"></textarea>
                            <p>联系人备注最多为<span class="number">100</span>字，已输入<span class="number">0</span>字。</p>
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