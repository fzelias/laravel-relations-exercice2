@extends('back.layouts.app')

@section('content-back')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit User</h3>
                    <p class="text-subtitle text-muted">For user to check they list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row match-height">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('users.update', $user->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="mb-2">Nickname</label>
                                                <input type="text" class="form-control "
                                                    value="{{ $user->nickname }}" name="nickname">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="mb-2">Name</label>
                                                <input type="text" class="form-control" value="{{ $user->profil->name }}" name="name">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="mb-2">Age</label>
                                                <input type="number" class="form-control" value="{{ $user->profil->age }}" name="age">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="mb-2">Email</label>
                                                <input type="email" class="form-control" value="{{ $user->email }}" name="email">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="mb-2">Phone</label>
                                                <input type="text"
                                                    class="form-control" name="phone" value="{{ $user->profil->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-1 mt-2 mx-auto">
                                            <button class="btn btn-primary">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
