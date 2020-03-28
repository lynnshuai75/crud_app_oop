<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- Latest DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>


    <title>CRUD APP Using PHP  </title>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><i class="fab fa-wolf-pack-battalion"></i>&nbsp; TaguMeda</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact </a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <h4 class="text-center text-danger fonr-weight-normal my-3">CRUD Application Using bootstrap 4 PHP-OOP, PDO-MySQLI, Ajax, DataTables, & SweetAlert 2</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
        <h4 class="mt-2 text-primary"> All Users in Database!</h4>
        </div>
 
        <div class="col-lg-6">
         <button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#myModal" ><i class="fas fa-user-plus fa-lg"></i>&nbsp; Add New User </button>
         
         <a href="action.php?export=excel" class="btn btn-success m-1 float-right"><i class="fas fa-table fa-lg"></i> &nbsp;&nbsp;Export to Excel</a>
        </div>

    </div>
    <hr class="my-2">
    <div class="row">
       <div class="col-lg-12">
          <div class="table-responsive" id="showUser">
          <h3 class="text-center text-success" style="margin-top:150px;"> Loading...</h3>
            
          </div>
       </div>
    </div>


</div><!--/end of Container -->

  <!-- ============  Add New User Modal ========== -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title bg-secondary text-white"> Add New User </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body px-4">
           <form action="" method="post" id="form-data">

               <div class="form-group">
                  <input type="text" name="fname" class="form-control" placeholder="First Name" required>
               </div>

               <div class="form-group">
                  <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
               </div>

               <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="E-mail" required>
               </div>

               <div class="form-group">
                  <input type="tel" name="phone" class="form-control" placeholder="Phone" required>
               </div>

               <div class="form-group">
                  <input type="submit" name="insert" id="insert" class="btn btn-info btn-block btn-sm"  >
               </div>
           
           </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>    <!--/Add New User Modal End -->
  
  <!-- ============Edit User Modal ========== -->
  <div class="modal fade" id="editModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"> Edit User </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body px-4">
           <form action="" method="post" id="edit-form-data">
             <input type="hidden" id="id" name="id">

               <div class="form-group">
                  <input type="text" name="fname" class="form-control" id="fname"  required>
               </div>

               <div class="form-group">
                  <input type="text" name="lname" class="form-control" id="lname"  required>
               </div>

               <div class="form-group">
                  <input type="email" name="email" class="form-control"  id="email" required>
               </div>

               <div class="form-group">
                  <input type="tel" name="phone" class="form-control" id="phone" required>
               </div>

               <div class="form-group">
                  <input type="submit" value="Update User" name="update" id="update" class="btn btn-info btn-block btn-sm"  >
               </div>
           
           </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>    <!--/Edit User Modal End -->


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!-- Latest Fontawesome 5 
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<!-- Latest DataTables  -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

<!-- Latest  SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
$(document).ready(function(){
   

    //** show all users */
    showAllUsers();
    function showAllUsers(){
        $.ajax({
            url:"action.php",
            type:"POST",
            data:{action: 'view'},
            success:function(response){
               // console.log(response);
               $("#showUser").html(response);
               $("table").DataTable({
                 order: [0, 'desc']
               });

            }
        });
    }

  //** Insert Record using Ajax  */
  $("#insert").click(function(e){
    if($("#form-data")[0].checkValidity()){
      e.preventDefault();
      $.ajax({
        url: "action.php",
        type:"POST",
        data:$("#form-data").serialize()+'&action=insert',
        success:function(response){
          //console.log(response);
          Swal.fire({
            title: 'User Added Successfully!',
            type: 'success'
          })
          $("#myModal").modal('hide');
          $("#form-data")[0].reset();
          showAllUsers();
        }
      });
    }
  })

  //** Edit User - Pulling User Record */
  $("body").on("click", ".editBtn", function(e){
    
    e.preventDefault();
    edit_id = $(this).attr('id');

    $.ajax({
      url:"action.php",
      type:"POST",
      data:{edit_id:edit_id},
      success:function(response){
          data = JSON.parse(response);
        // data = JSON.parse(response);
         // console.log(data);
          $("#id").val(data.id);
          $("#fname").val(data.first_name);
          $("#lname").val(data.last_name);
          $("#email").val(data.email);
          $("#phone").val(data.phone);
      }
    });
  }); //*
  
  //** Edit  Record using Ajax  */
  $("#update").click(function(e){
    if($("#edit-form-data")[0].checkValidity()){
      e.preventDefault();
      $.ajax({
        url: "action.php",
        type:"POST",
        data:$("#edit-form-data").serialize()+'&action=update',
        success:function(response){
          //console.log(response);
          Swal.fire({
            title: 'User Updated Successfully!',
            type: 'success'
          })
          $("#editModal").modal('hide');
          $("#edit-form-data")[0].reset();
          showAllUsers();
        }
      });
    }
  })



//** Delete user */
$("body").on("click", ".delBtn", function(e){
  e.preventDefault();
  var tr = $(this).closest('tr');
  del_id  = $(this).attr('id');
  Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {

        $.ajax({
          url: "action.php",
          type: "POST",
          data:{del_id:del_id},
          success:function(response){
            //console.log(response);
            tr.css('background-color', '#ff6666');
            Swal.fire(
              'Deleted!',
              'User deleted successfully!',
              'success'
            )
            showAllUsers();
          }
        });
      }
    });
});

//** show user details  */
$("body").on("click", ".infoBtn", function(e){
  e.preventDefault();
  info_id  = $(this).attr('id');
  $.ajax({
    url: "action.php",
    type: "POST",
    data:{info_id:info_id},
    success:function(response){
     
     data = JSON.parse(response);
      //console.log(response);
     Swal.fire({
       title:'<strong>User Info : ID('+data.id+')</strong>',
       type: 'info', 
       html:'<b>First Name : </b>'+data.first_name+'<br><br><b>Last Name : </b>'+data.last_name+
        '<br><br><b>Email: </b>'+data.email+'<br><br><b>Phone: </b>'+data.phone,
       
                showCancelButton: true,

     })
    }
  });
});


});


</script>
</body>
</html>