@extends('layouts.main')
@section('content')

<div class="container">
<a href="{{ route('admin.employee.create') }}" class="btn btn-primary mb-3">{{__('employee/index.create_employee')}}</a>
<a href="{{ route('admin.home') }}" class="btn btn-primary mb-3">{{__('employee/index.companies')}}</a>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{__('employee/index.employees')}}</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{__('employee/index.id')}}</th>
                        <th>{{__('employee/index.company')}}</th>
                        <th>{{__('employee/index.name')}}</th>
                        <th>{{__('employee/index.surname')}}</th>
                        <th>{{__('employee/index.email')}}</th>
                        <th>{{__('employee/index.number')}}</th>
                        <th></th>
                        <th>{{__('employee/index.actions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->company->name ?? '' }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->surname }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->number }}</td>
                            <td><a href="{{route('admin.employee.edit',$employee->id)}}">{{__('employee/index.edit')}}</a></td>
                            <td><form method="POST" action="{{route('admin.employee.destroy',$employee->id)}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="{{__('employee/index.delete')}}">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $employees->links() }}
        </div>
    </div>

</div>
@endsection