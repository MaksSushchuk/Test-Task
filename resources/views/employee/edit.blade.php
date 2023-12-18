@extends('layouts.main')
@section('content')

<div class="container">

    <form method="POST" action="{{route('admin.employee.update',$employee->id)}}" >
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="company_id" class="form-label">{{__('employee/edit.employee')}}</label>
            <select name="company_id" class="form-control" id="company_id">
                <option value="" disabled selected>{{__('employee/edit.select_company')}}</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">{{__('employee/edit.name')}}</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->name}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">{{__('employee/edit.surname')}}</label>
            <input type="text" name="surname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->surname}}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">{{__('employee/edit.email')}}</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->email}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">{{__('employee/edit.number')}}</label>
            <input type="text" name="number" class="form-control" id="exampleInputPassword1" value="{{$employee->number}}"> 
        </div>
    
        <button type="submit" class="btn btn-primary">{{__('employee/edit.submit')}}</button>
    </form>
</div>

@endsection