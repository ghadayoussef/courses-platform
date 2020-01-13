<!DOCTYPE html>
<html>
<head>
    <title>Datatables Server Side Processing in Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>       
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <br />
    <h3 algin="center">Datatables Server Side Processing in Laravel</h3>
    <br />
    <table id="teacher_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>National ID</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
</div>

<div id="studentModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="student_form">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title">Add Data</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Enter First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Enter Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                     <input type="hidden" name="student_id" id="student_id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>




<script type="text/javascript">
$(document).ready(function() {
     $('#teacher_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('ajaxdata.getdata') }}",
        "columns":[
            { "data": "name" },
            { "data": "email" },
            { "data": "national_id" },
            { "data": "action" , orderable:false, searchable: false}
        ]
     });
});



$(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        var token = $("meta[name='csrf-token']").attr("content");
        if(confirm("Are you sure you want to Delete this data?"))
        {           
            $.ajax({
                url:"{{route('ajaxdata.removedata',['teacher' => $(this).attr('id')])}}",
                //url:"/ajaxdata/removedata/"+$(this).attr('id'),                
                method:'GET',
                data:{
                    "teacher": $(this).attr('id'),
                    "_token": $("meta[name='csrf-token']").attr("content")
                },
                success:function()
                {
                    alert("the user has been deleted");
                    $('#teacher_table').DataTable().ajax.reload();
                },
                error: function() {             
                    //successmessage = 'Error';
                    alert("errrorrr");
                }
                
            })
        }
        else
        {
            return false;
        }
    }); 





</script>
</body>
</html>
