@extends('layouts.admin.app')

@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">user baru</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah user</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Tambah user</h1>
                <p class="mb-0">Form untuk menambahkan data user baru.</p>
            </div>
            <div>
                <a href="" class="btn btn-primary"><i class="far fa-question-circle me-1"></i> Kembali</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-lg-4 col-sm-6">
                                <!-- nama lengkap -->
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">nama lengkap</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>


                                <!-- email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">email</label>
                                    <input type="text" name="email" id="email" class="form-control" required>
                                </div>
                            </div>


                            <div class="col-lg-4 col-sm-6">
                                <!-- passwprd -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>



                                <div class="col-lg-4 col-sm-12">
                                    <!-- confirmation password -->
                                    <div class="mb-3">
                                        <label for="confirmation password" class="form-label">confirmation password</label>
                                        <input type="confirmation password" name="confirmation password" id="confirmation password" class="form-control" required>
                                    </div>




                                    <!-- Buttons -->
                                    <div class="">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ route('user.index') }}"
                                            class="btn btn-outline-secondary ms-2">Batal</a>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
