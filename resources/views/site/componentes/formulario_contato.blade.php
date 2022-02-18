<form action="{{route('site.contato.create')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" placeholder="Nome" value="{{old('nome')}}">
        @error('nome')
            <div class="alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="tel" class="form-control" name="telefone" placeholder="Telefone" value="{{old('telefone')}}">
        @error('telefone')
            <div class="alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
        @error('email')
            <div class="alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div>
        <label for="motivo_contato_id" class="form-label">Motivo:</label>
        <select class="form-select mb-3" aria-label="Motivo de contato:" name="motivo_contato_id">
            @foreach ($motivo_contatos as $motivo_contato)
                <option value="{{$motivo_contato->id}}" {{$motivo_contato->id == old('motivo_contato_id')? 'selected': '' }}>{{$motivo_contato->motivo_contato}}</option>
            @endforeach
        </select>
        @error('motivo_contato_id')
            <div class="alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="mensagem" class="form-label">Preencha aqui sua mensagem:</label>
        <textarea class="form-control" name="mensagem" rows="3">{{old('mensagem')}}</textarea>
        @error('mensagem')
            <div class="alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Enviar</button>
</form>
