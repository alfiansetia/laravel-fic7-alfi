@extends('layouts.template')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <a href="{{ route('orders.index') }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus mr-1"></i>Add Data</a>
                        </h4>
                        <div class="card-header-form">
                            <form action="" method="GET">
                                <div class="input-group">
                                    <input name="search" type="text" class="form-control"
                                        value="{{ request('search') }}" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @if (count($data ?? []) > 0)
                            <div class="table-responsive">
                                <table class="table table-striped" style="width: 100%;">
                                    <thead>
                                        <th class="text-center">#</th>
                                        <th>Number</th>
                                        <th>Seller</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td class="p-0 text-center">
                                                    {{ $key + 1 }}
                                                </td>
                                                <td>{{ $item->number }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->total_price }}</td>
                                                <td>
                                                    <span class="badge badge-success">{{ $item->payment_status }}</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group"
                                                        aria-label="Basic example">
                                                        <a href="{{ $item->payment_url ?? '#' }}"
                                                            class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            onclick="delete_data('{{ $item->id }}')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        @else
                            <div class="m-3">
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        No Data!
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="" method="POST" id="delete_data">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('js')
    <script>
        function delete_data(id) {
            swal({
                    title: 'Are you sure?',
                    text: 'Delete data?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        let form = $('#delete_data')
                        form.attr('action', "" + id)
                        form.submit()
                    }
                });
        }
    </script>
@endpush
