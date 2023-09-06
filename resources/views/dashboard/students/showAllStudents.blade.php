@extends('dashboard.layouts.master')


@section('dashContent')
    <h1 class="headerOne">Student</h1>
    <h5 class="headerFive">all Students</h5>
      <button data-toggle="modal" data-target="#exampleModal" class="AddButton">
        <i class="fas fa-plus"></i> Create New Student
      </button>      
      <table class="table" id="basic_table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">SSN</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Photo</th>
          <th scope="col">Courses</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      @foreach($students as $student)
        <tr>
        <td>
          {{$student->SSN}}
          </td>
          <td>
            {{$student->Fname}} {{$student->Lname}}
          </td>
          <td>
          {{$student->email}}
          </td>
          <td>
            <img src="{{ asset('assets/Uploads/Student/' . $student->photo) }}" alt="Student" class="ShowImgTable">
          </td>
          <td>
            @foreach($student->StudentCourse as $course)
                ({{$course->name}})
                <br>
            @endforeach
          </td>
          <td>
            <div class="d-flex align-items-center">
              
              <button class="ActionButton" data-toggle="modal" data-target="#modal2"
                data-ID="{{ $student->id }}" data-Ssn="{{ $student->SSN }}"
                data-FName="{{ $student->Fname }}" data-LName="{{ $student->Lname }}"
                data-email="{{ $student->email }}" data-Password="{{ $student->password }}"
                data-photo="{{ $student->photo }}">

                <i class="fas fa-edit"></i>
              </button>
              <button class="ActionButton" data-toggle="modal" data-target="#modal3"
                data-id="{{ $student->id }}" data-fname="{{ $student->Fname }}">
                <i class="fas fa-trash-alt"></i>
              </button>
            </div>
          </td>   
        </tr>
      @endforeach
    </table>

    
    <!--Add Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" id="modal_basic" role="document" >
        <div class="modal-content" id="modal_content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/Student/store" method="post" autocomplete="off" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="AddImgDiv">
                <img id="previewImage" src="" alt="Preview">
                <br>
                <div class="form-group">
                  <input type="file" id="photo" name="photo" style="display: none;" required>
                  <label for="photo" class="EditPhotoLabel">
                    Upload
                  </label>
                </div>
              </div>
              <div class="AddInputDiv">
                <div class="form-group" >
                  <label for="SSN" class="AddLabel">SSN</label>
                  <input type="text" class="form-control" id="SSN" name="SSN" required>
                </div>
                <div class="form-group" >
                  <label for="Fname" class="AddLabel">First Name</label>
                  <input type="text" class="form-control" id="Fname" name="Fname" required>
                </div>
                <div class="form-group" >
                  <label for="Lname" class="AddLabel">Last Name</label>
                  <input type="text" class="form-control" id="Lname" name="Lname" required>
                </div>
                <div class="form-group" >
                  <label for="email" class="AddLabel">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group" >
                  <label for="password" class="AddLabel">Password</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>
              </div>
              <button type="submit" class="btn btn-primary" id="Submit">Create</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!--Edit Modal-->
    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" id="modal_basic" role="document" >
        <div class="modal-content" id="modal_content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/Student/update" method="post" autocomplete="off" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="AddImgDiv">
                <input type="hidden" name="id" id="edit-id">
                <label for="edit-photo" id="edit-photo-label" style="font-weight:600;color:white;font-size:17px;">Upload Image</label>
                <input type="file" class="form-control-file" id="edit-photo" name="photo" style="display: none;">
                <label for="edit-photo-label" id="edit-photo-preview-label" class="EditPhotoLabel"style="display:flex;width:95px">
                  Update
                </label>
                <img id="edit-photo-preview" src="" alt="photo" style="width: 210px; height: 210px; margin-top: 10px;">                                    
              </div>
              <div class="AddInputDiv">
                <div class="form-group">
                <input type="hidden" class="form-control" id="ID" name="id" value="">
                  <label for="SSN" class="AddLabel">SSN</label>
                  <input type="text" class="form-control" id="SSN" name="SSN" required>
                </div>
                <div class="form-group">
                  <label for="Fname" class="AddLabel">First Name</label>
                  <input type="text" class="form-control" id="Fname" name="Fname" required>
                </div>
                <div class="form-group">
                  <label for="Lname" class="AddLabel">Last Name</label>
                  <input type="text" class="form-control" id="LName" name="Lname" required>
                </div>
                <div class="form-group">
                  <label for="Email" class="AddLabel">Email</label>
                  <input type="email" class="form-control" id="Email" name="email" required>
                </div>
                <div class="form-group">
                  <label for="password" class="AddLabel">Password</label>
                  <input type="password" class="form-control" id="Password" name="password" required>
                </div>
                
              </div>
              <button type="submit" class="btn btn-primary" id="Submit">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!--Delete Modal-->
    <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" id="modal_delete_basic" role="document" >
        <div class="modal-content" id="modal_content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/Student/delete" method="post" autocomplete="off" enctype="multipart/form-data">
              {{csrf_field()}}
              {{ method_field('DELETE') }}
                <div class="form-group" >
                  <input type="hidden" class="form-control" id="id" name="id" value="">
                </div>
                <div class="form-group" >
                  <label class="DeleteLabel">Do you want to delete this Student ?</label>
                  <input type="text" class="form-control" id="fname" name="Fname" value="" readonly>
                </div>
              <button type="submit" class="btn btn-primary" id="Delete">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('dashJS')

  <!--Upload Add Modal-->
  <script>
    document.getElementById('photo').addEventListener('change', function(event) {
      var input = event.target;
      var reader = new FileReader();
      reader.onload = function() {
        var imgElement = document.getElementById('previewImage');
        imgElement.src = reader.result;
        imgElement.style.display = 'block';
      };
      reader.readAsDataURL(input.files[0]);
    });
  </script>

  <!--Edit-->
  <script>
    $(document).ready(function() {
      
      // Display image and data in the edit modal
      $('#modal2').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var ID = button.data('id');
          var Ssn = button.data('ssn');
          var FName = button.data('fname');
          var LName = button.data('lname');
          var Email = button.data('email');
          var Password = button.data('password');
          var photo = button.data('photo');

          var modal = $(this);
          modal.find('.modal-body #ID').val(ID);
          modal.find('.modal-body #SSN').val(Ssn);
          modal.find('.modal-body #Fname').val(FName);
          modal.find('.modal-body #LName').val(LName);
          modal.find('.modal-body #Email').val(Email);
          modal.find('.modal-body #Password').val(Password);
          modal.find('#edit-photo-preview').attr('src', '{{ asset('assets/Uploads/Student/') }}/' + photo);
          
      });

      // Reset image preview when the edit modal is closed
      $('#modal2').on('hidden.bs.modal', function () {
          var modal = $(this);
          modal.find('#edit-photo-preview').attr('src', '');
      });

      // Update the image preview when a new image is selected
      $('#edit-photo').on('change', function (event) {
          var input = event.target;
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#edit-photo-preview').attr('src', e.target.result);
              };
              reader.readAsDataURL(input.files[0]);
          }
      });

      // Show file input when the label is clicked
      $('#edit-photo-preview-label').on('click', function () {
          $('#edit-photo').click();
      });

    });
  </script>

  <!--Delete-->
  <script>
    $('#modal3').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var Fname = button.data('fname');
        var modal = $(this);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #fname').val(Fname);
    });
  </script>
@endsection