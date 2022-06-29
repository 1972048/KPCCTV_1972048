<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.5.4/css/colReorder.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.6.4/css/keyTable.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/keytable/2.6.4/js/dataTables.keyTable.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    
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

<table id="linkTable">
    <thead>
        <td>ID</td>
        <td>Nama</td>
        <td>Link</td>
        <td>Longitude</td>
        <td>Latitude</td>
        <td></td>
    </thead>
    <tbody>
        
    </tbody>
</table>
<script>
  $(document).ready(function(){
    $('#submitId').click(function(){
      let name=$('#txtn').val();
      let links=document.getElementById("txtl").value;
      let long=document.getElementById("txtlo").value;
      let lat=document.getElementById("txtla").value;
      addNewVideo(name,links,long,lat);
      return false;
    });

    fetchAllVideo(videos=>{
      $('#linkTable').DataTable().clear();
      $('#linkTable').DataTable().rows.add(videos).draw();
    });

    $('#linkTable').DataTable({
      columns:[
        {data:'id'},
        {data:'name'},
        {data:'links'},
        {data:'long'},
        {data:'lat'},
        {
          data:null,
          render: function(data, type, row){
            return '<button onclick="editVideo(\''+row.id+'\')">Edit</button><button onclick="deleteVideo(\''+row.id+'\')">Delete</button>'
          }
        }
      ]
    });
  });
</script>