@if (auth()->user()->role !='blogger')
    @extends('layouts.homemaster')

    @section('content')
    <x-breadcum slogan="User Requests" subslogan="User Messages"></x-breadcum>


    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">User Messages</h4>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <th scope="row">
                                        {{ $messages->firstItem() + $loop->index}}
                                    </th>
                                    <td>{{$message->user_id}} </td>
                                    <td>{{$message->name}} </td>
                                    <td>{{$message->email}} </td>
                                    <td>{{$message->message}} </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end card -->
    </div>

    {{-- pagination --}}

    <div class="pagination">
        <div class="container-fluid">
            <div class="pagination-area">
                <div class="row">
                    <div class="col-lg-12">
                        {{$messages->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection

@else

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="">
                <div class="card-body">
                    <h1 style="text-align:center; margin-top:25%">
                        This Page Is Not For You
                    </h1>
                </div>
            </div>
        </div>
    </div>

    @endsection

@endif
