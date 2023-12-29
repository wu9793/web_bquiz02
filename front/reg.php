<fieldset>
    <legend>會員註冊</legend>
    <span style="color: red;">
        *請設定您要註冊的帳號及密碼(最長12個字元)
    </span>
    <table>
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step1:信箱(忘記密碼時使用)</td>
            <td><input type="password" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <!-- button 透過 onclick 來觸發 reg()事件 -->
                <input type="button" value="註冊" onclick="reg()">
                <input type="reset" value="清除">
            </td>
        </tr>
    </table>
</fieldset>
<script>
    function reg(){
            let user={acc:$("#acc").val(),
              pw:$("#pw").val(),
              pw2:$("#pw2").val(),
              email:$("#email").val()
            }
        // 判斷如果帳號密碼及確認密碼、郵件都不是空白
        if(user.acc!='' && user.pw!='' && user.pw2!='' && user.email!=''){
            // 判斷密碼等於確認密碼
            if(user.pw==user.pw2){
                // 發送POST請求給"./api/chk_acc.php"這個URL，傳遞帳號資料
                // 回呼函式 (res)=>{}，當從伺服器收到回應時會執行這個函式
                $.post("./api/chk_acc.php",{acc:user.acc},(res)=>{
                    console.log(res);
                    // 將回應轉換為整數，檢查是否為1
                    // "1" 代表已存在此帳號
                    if(parseInt(res)==1){
                        alert("帳號重複")
                    }else{
                        $.post('./api/reg.php',user,(res)=>{
                            alert("註冊完成，歡迎加入")
                        })
                    }
                })
            }else{
                alert("密碼錯誤")
            }
        }else{
            alert("不可空白")
        }
    }

</script>