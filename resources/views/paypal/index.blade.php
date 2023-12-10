<x-app-layout>
    <x-slot name="header">
        Paypal payment
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
            <form action="{{route('payment.pay')}}" method="post">
                @csrf
                <input type="text" class="form-control" name="amount" required>
                <button type="submit" class="btn btn-primary">Pay with Paypal</button>
            </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>