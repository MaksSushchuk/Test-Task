@extends('layouts.main')
@section('content')

<div class="container">

    <form method="POST" action="{{route('admin.company.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">{{__('company/create.name')}}</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">{{__('company/create.email')}}</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">{{__('company/create.logo')}}</label>
            <input type="file" name="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">{{__('company/create.website')}}</label>
        <input type="text" name="website" class="form-control" id="exampleInputPassword1">
        </div>
    
        <button type="submit" class="btn btn-primary">{{__('company/create.submit')}}</button>
    </form>
</div>

@endsection