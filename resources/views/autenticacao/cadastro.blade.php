@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="">
                <div class="card">
                    <div class="card-header bg-secondary text-light">
                        <h3 class="text-center">Cadastro</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cadastro') }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <input type="text" name="name" id="name" placeholder="Seu nome" class="form-control @error('name') border-danger @enderror" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-center">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <input type="text"name="email" id="email" placeholder="Seu email" class="form-control @error('email') border-danger @enderror" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-center">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <input type="password" name="password" id="password" placeholder="Defina uma senha" class="form-control @error('password') border-danger @enderror">
                                @error('password')
                                    <div class="text-center">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme a senha" class="form-control @error('password_confirmation') border-danger @enderror">
                                @error('password_confirmation')
                                    <div class="text-center">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                            <div class="d-grid gap-2">
                                <input type="submit" value="Salvar" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection