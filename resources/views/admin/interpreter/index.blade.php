@extends('admin.common.page')
@section('content')


<style type="text/css">
   .card-body .addBtn {
    float: right;
    margin-top: 15px;
    margin-right: 15px;
  }

</style>

  <main id="main" class="main">

    <div class="pagetitle">
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <a href="{{ route('interpreter.create') }}" class="addBtn"> <button type="button" class="btn btn-primary">Add New</button> </a>
              <h5 class="card-title">Users</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable data-table">
                <thead>
                  <tr>
                    <!-- <th>First Name</th>
                    <th>Last Name</th> -->
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City Name</th>
                    <th>State Name</th>
                    <th>Country Name</th>
                    <th>Dob</th>
                    <th>Gender</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>


                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


@endsection


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>   -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('interpreter.index') }}",
                    // data: function (d) {

                    //     console.log('Request Data:', d);
                    // },
                    // success: function (response) {
                    //     console.log('AJAX Response:', response);
                    // },
                    // error: function (xhr, status, error) {
                    //     console.error('AJAX Error:', status, error);
                    // }
                },
                columns: [
                    { data: 'id', name: 'id', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'city_name', name: 'city_name' },
                    { data: 'state_name', name: 'state_name'},
                    { data: 'country_name', name: 'country_name'},
                    { data: 'dob', name: 'dob' },
                    { data: 'gender', name: 'gender' },
                    { data: 'subject', name: 'subject' },
                    { data: 'description', name: 'description' },
                    { data: 'image', name: 'image', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });



            // $(document).on('click', '.editProduct', function() {
            //     var userId = $(this).data('id');
            //     //alert('Edit button clicked for user ID: ' + userId);
            //     // You can handle the edit action here

            //         $.ajax({
            //             url: "",
            //             type: 'POST',
            //             data: {
            //                 _token: '', // Add CSRF token
            //                 id: userId // Send the user ID
            //             },
            //             success: function(response) {
            //                 alert('Form submitted successfully!');
            //                 // Handle the response from the server if needed
            //             },
            //             error: function(xhr, status, error) {
            //                 alert('An error occurred: ' + error);
            //                 // Handle errors if needed
            //             }
            //         });

            // });
        });
    </script>
