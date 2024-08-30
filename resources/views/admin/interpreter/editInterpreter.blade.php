@extends('admin.common.page')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
 
  <main id="main" class="main">
    <div class="pagetitle"><h1>Edit Interpreter</h1></div>
    <ol class="breadcrumb"><li class="breadcrumb-item"><a href="https://thor.softgetix.com/nadmin/modules/sadmin/assignments/">Tuition Assignments</a></li>
      <li class="breadcrumb-item active">Add Interpreter</li></ol>
    <section class="section profile">
      <div class="row">
     
        <form id="myForm"> 
         
          <div class="col-xl-12">

            <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
               <h5>Interpreter Information</h5>
                    <div class="row mb-3">
                      <div class="col-sm-12 col-lg-4 mb-3">
                        <label for="you_are" class="col-form-label">Name</label>
                        <input type="hidden" name="int_id" value="{{$data['interpreter']->id}}">
                        <input type="text" name="name" id="name" class="form-control" value="{{$data['interpreter']->name}}">
                      </div>

                      <div class="col-sm-12 col-lg-4 mb-3">
                          <label for="you_are" class="col-form-label">Email</label>
                      <input type="email" name="email" id="email" class="form-control" value="{{$data['interpreter']->email}}">
                      </div> 

                      <div class="col-sm-12 col-lg-4 mb-3">
                          <label for="you_are" class="col-form-label">Phone</label>
                      <input type="text" name="phone" id="phone" class="form-control" value="{{$data['interpreter']->phone}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-sm-12 col-lg-4 mb-3">
                      <label for="city" class="col-form-label">City:*</label>
                        <select name="city" id="city" class="form-control">
                        @foreach($data['cities'] as $city)
                            <option value="{{$city->id}}"  @if($city->id == $data['interpreter']->city_id) selected @endif>{{$city->city_name}}</option>   
                        @endforeach
                        </select>
                      </div>

                      <div class="col-sm-12 col-lg-4 mb-3">
                      <label for="state" class="col-form-label">State:*</label>
                        <select name="state" id="state" class="form-control">
                        @foreach($data['states'] as $state)
                            <option value="{{$state->id}}" @if($state->id == $data['interpreter']->state_id) selected @endif>{{ $state->state_name}}</option>
                        @endforeach
                        </select>
                      </div> 

                      <div class="col-sm-12 col-lg-4 mb-3">
                      <label for="country" class="col-form-label">Country:*</label>
                        <select name="country" id="country" class="form-control">
                        @foreach($data['countries'] as $country)
                           <option value="{{$country->id}}" @if($country->id == $data['interpreter']->country_id) selected @endif>{{$country->country_name}}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">

                      <div class="col-sm-12 col-lg-6 mb-3">
                          <label for="you_are" class="col-form-label">DOB:</label>
                      <input type="date" name="dob" class="form-control" id="dob" value="{{$data['interpreter']->dob}}">
                      </div> 
                     
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-6 mb-3">
                            <label for="you_are" class="col-form-label">Gender</label><br>
                            <input type="radio" id="male" name="gender" value="male" {{ $data['interpreter']->gender == 'male' ? 'checked' : '' }}>
                            <label for="male">Male</label>&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="female" name="gender" value="female" {{ $data['interpreter']->gender == 'female' ? 'checked' : ''}}>
                            <label for="female">Female</label>&nbsp;&nbsp;&nbsp;
                            <input type="radio" id="other" name="gender" value="other" {{$data['interpreter']->gender == 'other' ? 'checked' : ''}}>
                            <label for="other">Other</label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12 col-lg-6 mb-3">
                            <label for="you_are" class="col-form-label">Subject</label><br>
                            <input type="checkbox" id="hindi" name="subject[]" value="hindi"   {{ in_array('hindi', $data['interpreter']->subject ?? []) ? 'checked' : '' }}>
                            <label for="hindi"> Hindi</label><br>
                            <input type="checkbox" id="english" name="subject[]" value="english" {{ in_array('english', $data['interpreter']->subject ?? []) ? 'checked' : ''}}>
                            <label for="english"> English </label><br>
                            <input type="checkbox" id="maths" name="subject[]" value="maths" {{ in_array('maths', $data['interpreter']->subject ?? []) ? 'checked' : ''}}>
                            <label for="maths"> Maths</label><br><br>
                        </div>
                    </div>

                    <div class="row mb-3">
                      
                    <div class="col-sm-12 col-lg-6 mb-3">
                        <label for="description" class="col-form-label">Description*</label>
                     
                        <textarea class="form-control" name="description" id="description">{{$data['interpreter']->description}}</textarea>
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
                url: '{{ route('interpreter.update') }}',
                type: 'PUT',
                data: formData,
                success: function(){

                    alert('submit');
                }

            });




        });
    })
</script>
