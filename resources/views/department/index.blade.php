@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- Breadcrumb Start --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        </ol>
    </nav>
    {{-- Breadcrumb End --}}
@stop

@section('content')
    <div class="container-fluid">
        @php
            $keyword = $_GET['keyword'] ?? '';
            $page = $_GET['page'] ?? 1;
        @endphp
        <div class="my-2 p-0 d-flex justify-content-between">
            <div class="col-md-8 p-0">
                <form action="" id="search-form">
                    <div class="d-flex">
                        <div class="form-group col-md-6 p-0">
                            <input type="text" class="form-control" name="keyword" placeholder="Search.."
                                value="{{ old('keyword', $keyword) }}">
                        </div>
                    </div>
                </form>
            </div>

            <div class="d-flex">
                <div>
                    <a class="btn btn-outline-primary btn-sm" href="{{ route('create_department') }}">Create New</a>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($departments as $department)
                    <tr>
                        <td>1</td>
                        <td>{{ $department->name }}</td>
                        <td>
                            <div class="d-flex">
                                <div class="mr-1">
                                    <a href="{{ route('edit_department', $department->id) }}"
                                        class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                                </div>
                                <form action="{{ route('delete_department', $department->id) }}" method="POST"
                                    id="confirm_delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger delete-btn"><i
                                            class="fas fa-trash"></i></button>

                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" align="center">No Data..</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- {!! $departments->appends(request()->input())->links() !!} --}}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            @if (Session::has('success'))
                Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: '{{ Session::get('success') }}',
                    showConfirmButton: false,
                    timer: 1500
                })
            @endif

            @if (Session::has('error'))
                Swal.fire({
                    position: 'top-end',
                    type: 'error',
                    title: '{{ Session::get('error') }}',
                    showConfirmButton: false,
                    timer: 1500
                })
            @endif

            // delete btn
            $("#confirm_delete").submit(function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Once deleted, you will not be able to recover this item!',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Delete'
                }).then(function(result) {
                    if (result.value) {
                        // Proceed with form submission
                        $("#confirm_delete").off("submit").submit();
                    }
                    // $("#confirm_delete").off("submit").submit();
                }, function(dismiss) {
                    // dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                    if (dismiss === 'cancel') {
                        swal('Cancelled', 'Delete Cancelled :)', 'error');
                    }
                })
            });
        });
    </script>
@stop
