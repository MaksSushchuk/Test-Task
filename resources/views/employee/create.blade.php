@extends('layouts.main')
@section('content')

<div class="container">

    <form method="POST" action="{{route('admin.employee.store')}}" >
        @csrf

        <div class="mb-3">
            <label for="company_id" class="form-label">{{__('employee/create.employee')}}</label>
            <select name="company_id" class="form-control" id="company_id">
                <option value="" disabled selected>{{__('employee/create.select_company')}}</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">{{__('employee/create.name')}}</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">{{__('employee/create.surname')}}</label>
            <input type="text" name="surname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">{{__('employee/create.email')}}</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">{{__('employee/create.number')}}</label>
            <input type="text" name="number" class="form-control" id="exampleInputPassword1">
        </div>
    
        <button type="submit" class="btn btn-primary">{{__('employee/create.submit')}}</button>
    </form>
</div>

@endsection