
@extends('admin.common.page')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
  <main id="main" class="main">

  <div class="pagetitle"><h1>Add User</h1></div>
    <ol class="breadcrumb"><li class="breadcrumb-item"><a href="https://thor.softgetix.com/nadmin/modules/sadmin/users/">Users</a></li>
      <li class="breadcrumb-item active">Add User</li></ol>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New Articles</h5>

              <!-- General Form Elements -->
              <form id="myForm">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Full Name </label>
                  <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Company Name: </label>
                  <div class="col-sm-10">
                    <input type="text" name="company_name" id="company_name" class="form-control">
                  </div>
                </div>

                 <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control" id="phone">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Expiry Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="expiry_date" id="expiry_date">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password">
                  </div>
                </div>


                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select Role</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="role" id="role">
                      <option value="">Select Role</option>
                      <option value="administrator">Super Administrator</option>
                      <option value="Coordinators">Coordinators</option>
                      <option value="Clerical">Clerical</option>
                      <option value="Sales">Sales</option>
                      <option value="Blogadmin">Blogadmin</option>
                    </select>
                  </div>
                </div>


                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="button" id="btn-submit" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>

              </form>
              <!-- End General Form Elements -->

            </div>
          </div>

        </div>

       
      </div>
    </section>

  @endsection
 
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  

  <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // $(document).on('click', '.editProduct', function() {
            $('#btn-submit').on('click', function(e) {
                e.preventDefault(); 
            
                var formData = $('#myForm').serialize(); 

                $.ajax({
                    url: "{{ route('store-user') }}", 
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Form submitted successfully!');
                        // Handle the response from the server if needed
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + error);
                        // Handle errors if needed
                    }
                });
            });
        });
    </script>