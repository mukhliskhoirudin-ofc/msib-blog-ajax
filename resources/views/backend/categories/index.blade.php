@extends('backend.layouts.main')

@section('title', 'Categories')

@section('content')
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Categories</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
        <h5 class="fw-semibold">Categories</h5>

        <button type="button" class="btn btn-primary" onclick="modalCreate()">
            <i class="ti ti-plus"></i> Create
        </button>
    </div>

    <div class="card">
        <div class="card-body p-3">
            <div class="table-responsive">
                <table id="category-table" class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody> {{-- biarkan kosong, DataTables yang isi --}}
                </table>
            </div>
        </div>
    </div>
    @include('backend.categories._modal-category')
@endsection

@push('js')
    <!-- Laravel js Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\CategoryRequest', '#form-category') !!}

    <script src="{{ asset('backend/assets/js/category.js') }}"></script>
    <script src="{{ asset('backend/assets/js/helper.js') }}"></script>
@endpush
