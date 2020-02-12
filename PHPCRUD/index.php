<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php crud</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
<body>
<?php include "navbar.php"; ?>
<!-- Modal -->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">itemname</label>
                            <input type="text" class="form-control" name="itemname" id="iname" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">colour</label>
                            <input type="text" class="form-control" name="colour" id="color" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="insertdata" class="btn btn-primary" onclick="addrecord()">Save</button>
                        </div>
                        <input type="hidden" id="source" value="add">
                    </div>    
            </div>
        </div>
    </div>

 <!-- Edit  -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>itemname</label>
                            <input type="text" class="form-control" name="itemname" id="itemname" required>
                        </div>
                        <div class="form-group">
                            <label>colour</label>
                            <input type="text" class="form-control" name="colour" id="colour" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="updatedata" class="btn btn-primary" onclick="updateuserdetails()">Update</button>
                        </div>
                        <input type="hidden" class="form-control" name="update_id" id="update_id">
                    </div>    
            </div>
        </div>
    </div>

    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2>PHP CRUD</h2>
            </div>
            <div class="card">
                <div class="card-body d-flex justify-content-end">
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">Add Category</button>  
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                 <table class="table table-dark" style="background-color:#6600ff;">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">itemname</th>
                        <th scope="col">colour</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>

                        </tr>
                    </thead>
                    <tbody id="records">
                           <?php include "mid_table.php"; ?>
                   
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <script>
        function readRecords(){
            var readrecord = "readrecord";
            $.ajax({
                url:"insertcode.php",
                type:'post',
                data:{readrecord : readrecord},
                success:function(data,status){
                    $('#records').html(data);
                }
            });
        }

            function addrecord()
            {
                var source = $('#source').val();
                var itemname = $('#iname').val();
                var colour = $('#color').val();
                if (itemname == "") {
                        alert("itemname must be filled out");
                        return false;
                    }
                else if(colour =="")    
                {
                    alert("colour must be filled out");
                    return false;
                }
                else{    
                $.ajax({
                    url:"insertcode.php",
                    type:'post',
                    data: { itemname : itemname,
                            colour : colour,
                            source : source,
                    },
                    success : function(data,status){
                        $('#addCategory').modal("hide");
                        readRecords();
                    },
                });
                }
            }


            function DeleteUser(deleteid)
            {
                var conf = confirm("Are you sure")
                if(conf==true)
                {
                    $.ajax({
                        url:"insertcode.php",
                        type:'post',
                        data: { deleteid : deleteid },  
                        success : function(data,status){
                        readRecords();
                    },
                    });
                }
            }
            function GetUserDetails(id)
            {
                $('#update_id').val(id);
                $.post("insertcode.php", {
                    id:id
                },function(data,status){
                        var user=JSON.parse(data);
                        $('#itemname').val(user.Itemname),
                        $('#colour').val(user.colour)
                }
                    
                );
                $('#editmodal').modal("show");
            }
            function updateuserdetails()
            {
                var up_itemname = $('#itemname').val();
                var up_colour = $('#colour').val();

                var up_update_id =$('#update_id').val();
                $.post("insertcode.php",{
                    up_update_id : up_update_id,
                    up_itemname : up_itemname,
                    up_colour : up_colour,
                },
                function(data,status){
                    $('#editmodal').modal("hide");
                    readRecords();
                }
                );
            }
        </script>
</body>
</html> 