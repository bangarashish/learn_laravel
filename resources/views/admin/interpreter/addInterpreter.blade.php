@extends('admin.common.page')
@section('content')


<meta name="csrf-token" content="{{ csrf_token() }}">
 
  <main id="main" class="main">
    <div class="pagetitle"><h1>Add Job Post</h1></div>
    <ol class="breadcrumb"><li class="breadcrumb-item"><a href="https://thor.softgetix.com/nadmin/modules/sadmin/assignments/">Tuition Assignments</a></li>
      <li class="breadcrumb-item active">Add Job Post</li></ol>
    <section class="section profile">
      <div class="row">
        <form id="myForm"> 
          <input type="hidden" name="selected_ids[]" id="selected_ids" />
          <div class="col-xl-12">

            <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
               <h5>Job Post Information</h5>
                    <div class="row mb-3">
                      <div class="col-sm-12 col-lg-4 mb-3">
                        <label for="you_are" class="col-form-label">Name</label>
                     
                        <input type="text" name="name" id="name" class="form-control">
                      </div>

                      <div class="col-sm-12 col-lg-4 mb-3">
                          <label for="you_are" class="col-form-label">Email</label>
                      <input type="email" name="email" id="email" class="form-control">
                      </div> 

                      <div class="col-sm-12 col-lg-4 mb-3">
                          <label for="you_are" class="col-form-label">Phone</label>
                      <input type="text" name="phone" id="phone" class="form-control" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-sm-12 col-lg-4 mb-3">
                      <label for="city" class="col-form-label">City:*</label>
                        <select name="city" id="city" class="form-control">
                        <option value="1">Indore</option>
                        </select>
                      </div>

                      <div class="col-sm-12 col-lg-4 mb-3">
                      <label for="state" class="col-form-label">State:*</label>
                        <select name="state" id="state" class="form-control">
                        <option value="1">Bhopal</option>
                        </select>
                      </div> 

                      <div class="col-sm-12 col-lg-4 mb-3">
                      <label for="country" class="col-form-label">Country:*</label>
                        <select name="country" id="country" class="form-control">
                        <option value="1">India</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">

                      <div class="col-sm-12 col-lg-6 mb-3">
                          <label for="you_are" class="col-form-label">DOB:</label>
                      <input type="date" name="dob" class="form-control" id="dob">
                      </div> 
                     
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-6 mb-3">
                            <label for="you_are" class="col-form-label">Gender</label><br>
                            <input type="radio" id="male" name="gender" value="Male">
                            <label for="male">Male</label>&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="female" name="gender" value="Female">
                            <label for="female">Female</label>&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="other" name="gender" value="Other">
                            <label for="other">Other</label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-6 mb-3">
                            <label for="you_are" class="col-form-label">Subject</label><br>
                            <input type="checkbox" id="hindi" name="subject" value="Hindi">
                            <label for="hindi"> Hindi</label><br>
                            <input type="checkbox" id="english" name="subject" value="English">
                            <label for="english"> English </label><br>
                            <input type="checkbox" id="maths" name="subject" value="Maths">
                            <label for="maths"> Maths</label><br><br>
                        </div>
                    </div>

                    <div class="row mb-3">
                      
                    <div class="col-sm-12 col-lg-6 mb-3">
                        <label for="description" class="col-form-label">Description*</label>
                     
                        <textarea class="form-control" id="description"></textarea>
                    </div>

                    <!-- <div class="col-sm-12 col-lg-6 mb-3">
                        <label for="you_are" class="col-form-label">Image*</label>
                     
                        <input type="file" name="image" class="form-control" value="">
                    </div> -->
                      
                    </div>

                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary add-new" id="create_int">Submit</button>
                </div>

                    
            </div>
            </div>
        </div>
      

       
        </form>
      </div>
    </section>

  </main><!-- End #main -->


@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       
        $('#create_int').on('click', function(e){
            e.preventDefault();
            
             
            var formData = $('#myForm').serialize();
            
            $.ajax({
                url: '',
                type: 'POST',
                data: formData,
                success: function(){

                    alert('submit');
                }

            });




        });
    })
</script>
