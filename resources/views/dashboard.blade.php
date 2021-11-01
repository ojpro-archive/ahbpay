@extends('components.admin.master')
@section('context')


    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Users</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive !overflow-auto">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        User
                                    </th>
                                    <th>
                                        Country
                                    </th>
                                    <th>
                                        e-mail
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Max Transactions
                                    </th>
                                    <th>
                                        Transactions Amount
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="flex gap-1">
                                            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="w-6 h-6">
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->country }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->phone }}
                                        </td>
                                        <td  class="text-center">
                                            {{ $user->max_transactions }}
                                        </td>
                                        <td class="text-center">
                                            {{ $user->max_transaction_amount }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
