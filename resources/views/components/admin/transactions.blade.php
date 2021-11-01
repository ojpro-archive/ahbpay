@extends('components.admin.master')
@section('context')
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">From</th>
                <th class="text-center">To</th>
                <th class="text-center">Type</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)

                <tr>
                    <td class="text-center">{{ $transaction->serial }}</td>
                    <td class="text-center">{{ $transaction->by_user->name }}</td>
                    <td class="text-center">{{ $transaction->for_user->name }}</td>
                    <td class="text-center">{{ $transaction->type }}</td>
                    <td class="text-center">$ {{ $transaction->amount }}</td>
                    <td class="text-center">{{ $transaction->created_at }}</td>
                    <td class="td-actions">

                        {{-- <button type="button" rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon">
                            <i class="tim-icons icon-single-02"></i>
                        </button> --}}
                        <a href="{{ route('dashboard.transactor', ['id'=>$transaction->id,'action'=>'accept']) }}" rel="tooltip"
                            class="btn btn-success btn-sm btn-round btn-icon">
                            <i class="tim-icons icon-check-2"></i>
                        </a>
                        <a href="{{ route('dashboard.transactor', ['id'=>$transaction->id,'action'=>'close']) }}" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon">
                            <i class="tim-icons icon-simple-remove"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
