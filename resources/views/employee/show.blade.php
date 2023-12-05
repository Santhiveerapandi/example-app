<x-app-layout>
    <x-slot name="header">
        Employee Management
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <div class="card">
    <div class="card-body">
        <p style="font-size:20px; font-weight:bold;">Employee details</p>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" value="{{$employee->name}}" readonly>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" value="{{$employee->email}}" readonly>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="numeric" class="form-control" value="{{$employee->phone}}" readonly>
        </div>

        <div class="form-group">
            <label for="joining_date">Joining date</label>
            <input type="date" class="form-control" value="{{$employee->joining_date}}" readonly>
        </div>

        <div class="form-group">
            <label for="joining_salary">Joining salary</label>
            <input type="number" class="form-control" value="{{$employee->salary}}" readonly >
        </div>

        <div class="form-group">
            <label for="is_active" >Active</label><br>
            <input type="checkbox" {{$employee->is_active ? 'Checked': ''}}  readonly />
        </div>
        <a href="{{route('employee.index')}}" class="btn btn-primary">Back</a>
    </div>
    </div>
    </div>
        </div>
    </div>
</x-app-layout>