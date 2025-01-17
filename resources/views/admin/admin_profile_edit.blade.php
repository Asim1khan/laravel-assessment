@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="content">
    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Admin Profile Edit</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form novalidate="" action="{{ route('admin.profile.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <h5>Admin Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" required="">
                                    <div class="help-block"></div>
                                  </div>
                            </div>
                         </div>

                         <div class="col-md-6">
                            <div class="form-group">
                                <h5>Admin Email <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="email" name="email" class="form-control" required="" > <div class="help-block"></div></div>
                            </div>
                         </div>

                   </div>
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h5>Profile Image <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="image" class="form-control" required="" id="image">
                                </div>
                        </div>

                    </div>
                      <div class="col-md-6">
                         <div class="form-group">
                            <img id="showImage"  src="{{(!empty($adminData->profile_photo_path)) ? url ('upload/admin_image/'.$adminData->profile_photo_path) :url('upload/no_image.jpg') }}
                            "class="rounded-circle" style="width:100px; height:100px;">
                         </div>
                      </div>
                    </div>
                   <div class="text-xs-right">
                      <input type="submit" name="" class="btn btn-rounded btn-primary mb-5" value="Update">
                 </div>
               </form>

           </div>
           <!-- /.col -->
         </div>
         <!-- /.row -->
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->

   </section>
<script>
    $(document).ready(function()
    {
$('#image').change(function(e)
{
 var reader= new FileReader();
reader.onload=function(e)
{

$('#showImage').attr('src',e.target.result);
}
reader.readAsDataURL(e.target.files['0']);
});
    });
</script>
@endsection
