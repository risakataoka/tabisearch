@extends('layouts.app')

@section('title','メールアドレス変更 | TABIサーチ')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">メールアドレス変更</div>

                <div class="card-body">
                 <form method="POST" action="/admin/change_mail">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">変更後のメールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('$changemail_form->email') ? ' is-invalid' : '' }}" name="email" value="{{ $changemail_form->email }}" required>

                                @if ($errors->has('$changemail_form->email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('$changemail_form->email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $changemail_form->id }}">


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    送信
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
