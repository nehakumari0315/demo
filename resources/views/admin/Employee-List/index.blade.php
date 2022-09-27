@include('include.header')

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/logout')}}">Logout</a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <form action="#" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Uploda Image</label>
                    <input type="file" name="image" class="form-control"  placeholder="image">
                  </div>

                  <div class="form-group">
                    <label>Employee full Name</label>
                    <input type="text" name="name" class="form-control"  placeholder="employee full name">
                  </div>

                  <div class="form-group">
                    <label>Father's Name</label>
                    <input type="text" name="father" class="form-control"  placeholder="father Name">
                  </div>
                  <div class="form-group">
                    <label>Birth Date:</label>
                    <input type="date" name="dob" class="form-control"  placeholder="birth date">
                  </div>
                  <div class="form-group">
                    <input type="radio" name="gender" value="male"> Male
                    <input type="radio" name="gender" value="female"> Female
                  </div>

                  <div class="form-group">
                    <label>Phone</label>
                    <input type="number" name="phone" class="form-control"  placeholder="phone number">
                  </div>

                  <div class="form-group">
                  <label>Local Area</label>
                  <br>
                  <textarea name="local_address" rows="3" cols="174"  placeholder="Local Address.."></textarea>
                  </div>

                  <div class="form-group">
                  <label>Permanent Address</label>
                  <br>
                  <textarea name="permanent_address" rows="3" cols="174"  placeholder="Permanent Address.."></textarea>
                  </div>

                  <div class="form-group">
                    <label>Set Email For Employee Login</label>
                    <input type="email" name="email" class="form-control"  placeholder="email">
                  </div>
                  <div class="form-group">
                    <label>Set Email-Password For Employee Login</label>
                    <input type="password" name="password" class="form-control"  placeholder="password">
                  </div>

                  <div class="form-group">
                    <label>Employee ID</label>
                    <input type="number" name="employee_id" class="form-control"  placeholder="employee id">
                  </div>

                  <div class="form-group">
                    <label>Department</label>
                    <select class="form-control category" name="department" id="dep">
                    @foreach($department_data as $item)
                        <option value="{{$item->id}}">{{$item->department}}</option>
                    @endforeach
                   </select>
                  </div>

                    <div class="form-group selectotp">
                        <h5>Designation</h5>
                        <select class="form-control" name="subdesignation" id="designationData">
                        </select>
                    </div>


                  <div class="form-group">
                    <label>Date of Joining:</label>
                    <input type="date" name="date" class="form-control"  placeholder="date of joining">
                  </div>

                  <div class="form-group">
                    <label>Joining Salary:</label>
                    <input type="number" name="salary" class="form-control"  placeholder="joining of salary">
                  </div>


                  <div class="form-group">
                    <label>Employee Bank Account Number</label>
                    <input type="number" name="account" class="form-control"  placeholder="account number">
                  </div>

                  <div class="form-group">
                    <label>Employee Bank Name</label>
                    <input type="text" name="bank" class="form-control"  placeholder="Bank Name">
                  </div>

                  <div class="form-group">
                    <label>IFSC Code(Optional)</label>
                    <input type="text" name="ifcscode" class="form-control"  placeholder="IFCE Code">
                  </div>

                  <div class="form-group">
                    <label>PAN Number(Optional)</label>
                    <input type="number" name="pan_code" class="form-control"  placeholder="Pan Code">
                  </div>
                  <div class="form-group">
                    <label>Branch</label>
                    <input type="text" name="branch" class="form-control"  placeholder="Branch">
                  </div>

                  <div class="form-group">
                    <label>Resume</label>
                    <input type="file" name="resume" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Offering Letter</label>
                    <input type="file" name="offer_letter" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Joining Letter</label>
                    <input type="file" name="joining_letter" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Agreement Letter</label>
                    <input type="file" name="agreement_letter" class="form-control">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
            </div>
            </div>
            <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>
  </div>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <script type="text/javascript">
        $(document).ready(function () {
            $('.selectotp').hide();
            $(document).on('change', '#dep', function() {
            $('.selectotp').show();

               var deprtment= $(this).val();
               $.ajax({
                    url:"{{route('get_designation.data')}}",
                    type:"get",
                    data:{
                      id:deprtment
                },
                success:function (data) {
                        $('#designationData').empty();
                        $.each(data,function(index,designationData){
                        $('#designationData').append('<option value="'+designationData.id+'">'+designationData.designation+'</option>');
                        })
                    }
                })
            });
        });
    </script>



       @include('include.footer')
  <aside class="control-sidebar control-sidebar-dark">
  </aside>

</div>

<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{url('plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<script src=".{{url('dist/js/demo.js')}}"></script>
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
