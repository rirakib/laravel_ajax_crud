<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Crud!</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header d-flex justify-content-between">
                    <div class="left_side">
                        <h3>Student List</h3>
                        <p id="msg"></p>
                    </div>
                    <div class="create_btn">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                            Create
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Father Name</th>
                                <th scope="col">Mobile Number</th>
                                <th scope="col">View</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="root">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!--Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Student </br>
                        <span id="success_msg" class="text-success"></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="submit_form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name here"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="father_name">Father Name</label>
                            <input type="text" class="form-control" id="father_name" name="father_name"
                                placeholder="Father name here">
                        </div>

                        <div class="form-group">
                            <label for="mobile_number">Mobile Number</label>
                            <input type="number" class="form-control" id="mobile_number" name="mobile_number"
                                placeholder="01xxxxxxx">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="abc@gmail.com"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="sign_image">Signature image</label>
                            <input type="file" class="form-control" name="sign_image" required id="sign_image">
                        </div>

                        <div class="form-group">
                            <label for="student_image">Student image</label>
                            <input type="file" class="form-control" name="student_image" required id="student_image">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--View Modal -->
    <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="view" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="view">View</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Name : <span id="v_name"></span></p>
                    <p>Father Name : <span id="v_father_name"></span></p>
                    <p>Mobile Number : <span id="v_mobile_number"></span></p>
                    <p>Email : <span id="v_email"></span></p>

                    <p>Student Image</p>
                    <div style=" margin:10px;">
                        <img id="v_student_image" src=""
                            style="width:300px; height:300px; object-fit:cover; ojbect-position:center center;"
                            alt="student_image" class="partDiagram">
                    </div>

                    <p>Sign Image</p>
                    <div style=" margin:10px;">
                        <img id="v_sign_image" src=""
                            style="width:300px; height:300px; object-fit:cover; ojbect-position:center;"
                            alt="sign_image" class="partDiagram">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Edit Modal -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="update_form" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name here"
                                required>
                        </div>

                        <input type="hidden" name="hidden_id">

                        <div class="form-group">
                            <label for="father_name">Father Name</label>
                            <input type="text" class="form-control" id="father_name" name="father_name"
                                placeholder="Father name here">
                        </div>

                        <div class="form-group">
                            <label for="mobile_number">Mobile Number</label>
                            <input type="number" class="form-control" id="mobile_number" name="mobile_number"
                                placeholder="01xxxxxxx">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="abc@gmail.com"
                                required>
                        </div>

                        <div class="form-group">

                            <label for="sign_image">Signature image</label>
                            <input type="file" class="form-control" name="sign_image"  id="sign_image">
                        </div>

                        <div class="form-group">
                            <label for="student_image">Student image</label>
                            <input type="file" class="form-control" name="student_image"  id="student_image">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>






    <!-- Jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer">
    </script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>





    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });






        function clearInput() {
            $('#name').val('');
            $('#father_name').val('');
            $('#mobile_number').val('');
            $('#email').val('');
            $('#sign_image').val('');
            $('#student_image').val('');
        }





        $('#msg').html('');
        let root = document.getElementById('root');



        //index all data ajax  
        function index() {
            $.ajax({
                url: "{{route('student.create')}}",
                dataType: 'json',
                method: 'get',
                success: function (data) {
                    let output = '';
                    data.map((item, index) => {
                        output += `<tr>
                                    <th scope="row">${index + 1}</th>
                                    <td><img src="students/image/${item.student_image}" style="height:60px; width:60px; border-radius:50%; object-fit:cover; object-position:center;"/></td>
                                    <td>${item.name}</td>
                                    <td>${item.father_name}</td>
                                    <td>${item.mobile_number}</td>
                                    <td><button class="btn btn-warning" data-toggle="modal" id="viewData"
                                        data-id="${item.id}" data-target="#view"><i class="fas fa-eye"></i></button></td>

                                    <td><button class="btn btn-success" data-toggle="modal" id="editData"
                                        data-id="${item.id}" data-target="#edit" ><i class="fas fa-edit"></i></button></td>
                                    <td><button class="btn btn-danger" onclick="deleteFunc(${item.id})"><i class="fas fa-trash"></i></button></td>  
                                </tr>`;
                    });

                    root.innerHTML = output;
                }
            })
        };

        index();


        $('#submit_form').on('submit', function (e) {


            e.preventDefault();
            var formData = new FormData(this);


            $.ajax({
                url: "{{route('student.store')}}",
                method: 'POST',
                "_token": "{{ csrf_token() }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('.modal').each(function(){
                            $(this).modal('hide');
                    });
                    if (response.success) {
                        let msg = response.message;
                        clearInput();
                        
                        $('#msg').html('<span class="text-success">Student Create Successfully</span>');
                        vanish();
                        clearInput();
                        $('.validation_part').hide();
                        index();
                    } 
                },
                error: function (err) {
                    if (err.status == 422) {
                        
                        
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="'+i+'"]');
                            el.after($('<span class="validation_part" style="color: red;">'+error[0]+'</span>'));
                        });

                        


                    }
                }

            });

        });


        $('body').on('click', '#viewData', function (event) {
            event.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                type: 'get',
                url: `student/${id}`,
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    $('#v_name').html(response['name']);
                    $('#v_father_name').html(response['father_name']);
                    $('#v_mobile_number').html(response['mobile_number']);
                    $('#v_email').html(response['email']);
                    $("#v_student_image").attr('src', 'students/image/' + response[
                        'student_image']);
                    $("#v_sign_image").attr('src', 'students/image/' + response[
                        'sign_image']);
                }
            });
        });


        $('body').on('click', '#editData', function (event) {
            event.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                type: 'get',
                url: `student/${id}/edit`,
                dataType: 'json',
                success: function (response) {
                    
                    $('input[name=hidden_id]').val(response.id);
                    $('input[name=name]').val(response.name);
                    $('input[name=father_name]').val(response.father_name);
                    $('input[name=mobile_number]').val(response.mobile_number);
                    $('input[name=email]').val(response.email);
                    
                }
            });
        });


        $('#update_form').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        let id = $('input[name=hidden_id]').val();
      
            $.ajax({
                url: `student/${id}`,
                method: 'POST',
                // "_token": "{{ csrf_token() }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('.modal').each(function(){
                            $(this).modal('hide');
                    });
                    $('#msg').html('<span class="text-success">Student Update Successfully</span>');
                    if (response.success) {
                        let msg = response.message;
                        $('#success_msg').html(msg);
                        vanish();
                        index();
                    } else {

                    }
                },

            });

        });



        function deleteFunc(id) {

            var confirmText = "Are you sure you want to delete this student?";

            if(confirm(confirmText)){
                    $.ajax({
                    url: "/delete/" + id,
                    type: 'get',
                    data: {
                        "id": id,
                    },
                    success: function (response) {
                        $('#msg').html('<span class="text-danger">Student Delete Successfully</span>');
                        vanish();
                        index();
                    }
                });
            }else{
                return false ;
            }
            


        }

       function vanish(){
        setTimeout(() => { 
            $('#msg').html('');
        }, 2000);
       }
    </script>

</body>

</html>