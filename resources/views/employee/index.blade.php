<x-app-layout>
    <x-slot name="header">
        Employee Management
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
        @endif
        <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <strong>Employee List</strong>
                <a href="{{route('employee.create')}}" class="btn btn-primary btn-xs float-end py-0">Create Employee</a>
                <table class="table table-responsive table-bordered table-stripped" style="margin-top:10px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joining Date</th>
                            <th>File</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $key => $employee)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->joining_date}}</td>
                            <td><a target="_blank" href="{{asset(str_ireplace('public', 'storage',$employee->file));}}">{{basename($employee->file)}}</a></td> 
                            <td><span type="button" class="btn {{($employee->is_active == 1)?'btn-success':'btn-danger'}} btn-xs py-0">{{($employee->is_active == 1)?'Active':'Inactive'}}</span></td>
                            <td>
                                <div class="d-flex">
                                <a href="{{route('employee.show',$employee->id)}}" class="btn btn-primary btn-xs py-0 mx-1">Show</a>
                                <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-warning btn-xs py-0 mx-1">Edit</a>
                                <form action="{{route('employee.destroy', $employee->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-xs py-0 mx-1">Delete</button>
                                </form>
                                </div>
                                
                            </td>
                        </tr>
                        @empty 
                            <tr class="text-center"><th colspan="7">No Records Found</th></tr>
                        @endforelse
                    </tbody>
                </table>
                {{$employees->links()}}
            </div>
        </div>
    </div>
    </div>
        </div>
    </div>
</x-app-layout>