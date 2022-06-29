<form action="" method="POST" id="formvideo" enctype="multipart/form-data">
    <table>
      <tr>
        <td><label for="">Nama</label></td>
        <td><input type="text" name="txtn" id="txtn"></td>
      </tr>
      <tr>
        <td><label for="">Link</label></td>
        <td><input type="url" name="txtl" id="txtl"></td>
      </tr>
      <tr>
        <td><label for="">Longitude</label></td>
        <td><input type="text" name="txtlo" id="txtlo"></td>
      </tr>
      <tr>
        <td><label for="">Latitude</label></td>
        <td><input type="text" name="txtla" id="txtla"></td>
      </tr>
        <td colspan="2"><input type="submit" value="Submit" name="btnSubmit" id="submitId"></td>
      </tr>
    </table>
</form>
<script>
  $(document).ready(function(){
    let url = window.location.search;
    let allParam = new URLSearchParams(url);
    let id= allParam.get('did');
    fetchVideo(id,video=>{
        document.getElementById('txtn').value = video.name;
        document.getElementById('txtl').value = video.links;
        document.getElementById('txtlo').value = video.long;
        document.getElementById('txtla').value = video.lat;
    })
    $('#submitId').click(function(){
        let name=$('#txtn').val();
        let links=document.getElementById("txtl").value;
        let long=document.getElementById("txtlo").value;
        let lat=document.getElementById("txtla").value;
        updateVideo(id,name,links,long,lat);
        window.location='indexadmin.php?mn=home';
    });
  });
</script>