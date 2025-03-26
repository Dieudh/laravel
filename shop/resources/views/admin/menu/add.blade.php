@extends('admin.main')

@section('head')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
<div class="card card-primary card-outline mb-4">
    <!--begin::Header-->
    <div class="card-header"><div class="card-title">Add Category</div></div>
    <!--end::Header-->
    <!--begin::Form-->
    <form action="" method="POST">
      <!--begin::Body-->
      <div class="card-body">
        <div class="mb-3">
          <label for="menu">Name Category</label>
          <input type="text" name="name" class="form-control" id="menu" placeholder="Emter Name category">
        </div>

        <div class="mb-3">
          <label for="menu">Category</label>
          <select name="parent_id" id="" class="form-control">
            <option value="0">Category Head</option>
            @foreach ($menu as $menu )
              <option value="{{$menu->id}}">{{$menu->name}}</option>  
            @endforeach
          </select>
        </div>

        <div class="mb-3">
            <label for="menu">Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="menu">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
        </div>


        <div class="input-group mb-3">
          <input type="file" class="form-control" id="inputGroupFile02">
          <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>

        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
      </div>
      <!--end::Body-->
      <!--begin::Footer-->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
      <!--end::Footer-->
      @csrf
    </form>
    <!--end::Form-->
  </div>
@endsection

@section('footer')
<script>
    CKEDITOR.replace('content');
</script>
@endsection