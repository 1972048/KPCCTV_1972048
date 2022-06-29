<center><form action="" method="POST" id="formLogin" enctype="multipart/form-data">
<table>
  <div id="not"></div>
  <tr>
    <td><label for="nameId">Username</label></td>
    <td><input type="text" name="username" id="username" require></td>
  </tr>
  <tr>
    <td><label for="nameId">Password</label></td>
    <td><input type="password" name="password" id="password" require ></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" value="Sign In" name="btnLogin"  id="submitId"></td>
  </tr>
</table>
</form>
</center>
<script>
  $(document).ready(function(){
    $('#submitId').click(function(){
      let username=document.getElementById("username").value;
      let password=document.getElementById("password").value;
      login(username,password,admin=>{
        if(admin!=null && admin.username==username && admin.password==password){
          <?php
            $_SESSION['my_session']=true;
          ?>
          window.location='indexadmin.php?mn=menu';
        }
        document.querySelector("#not").innerHTML="Invalid Username/Password";
      });
      return false;
    });
  });
</script>