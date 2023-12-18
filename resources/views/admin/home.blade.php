@extends('layouts.main')
@section('content')

<div class="container">
    <a href="{{ route('admin.company.create') }}" class="btn btn-primary mb-3">{{__('admin/home.create_companies')}}</a>
    <a href="{{ route('admin.home.employee') }}" class="btn btn-primary mb-3">{{__('admin/home.employees')}}</a>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{__('admin/home.companies')}}</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{__('admin/home.id')}}</th>
                        <th>{{__('admin/home.name')}}</th>
                        <th>{{__('admin/home.email')}}</th>
                        <th>{{__('admin/home.website')}}</th>
                        <th></th>
                        <th>{{__('admin/home.actions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->website }}</td>
                            <td><a href="{{route('admin.company.edit',$company->id)}}">{{__('admin/home.edit')}}</a></td>
                            <td><form method="POST" action="{{route('admin.company.destroy',$company->id)}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="{{__('admin/home.delete')}}">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $companies->links() }}
        </div>
    </div>

</div>
@endsection