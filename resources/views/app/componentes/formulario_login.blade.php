<form action="{{route('app.loginIn')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="login" class="form-label">Login</label>
        <input type="text" class="form-control" name="login" placeholder="Login" value="{{old('login')}}">
        @error('login')
            <div class="alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" class="form-control" name="senha" placeholder="Senha" value="{{old('senha')}}">
        @error('senha')
            <div class="alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Logar</button>
    {{isset($erro) && $erro != '' ? $erro : ''}}
</form>
