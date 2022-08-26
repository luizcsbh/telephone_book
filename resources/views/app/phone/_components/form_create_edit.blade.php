@if(isset($phone->id))
<form method="POST" action="{{ route('app.phone.update', ['phone' => $phone->id]) }}">
    @csrf 
    @method('PUT')
@else
<form method="POST" action="{{ route('app.phone.store') }}">
    @csrf 
@endif
    <div class="form-group">
        <select name="contact_id">
            <option>-- Selecione um Contato --</option>

            @foreach ($contacts as $contact)
                <option value="{{ $contact->id }}" {{ ($phone->contact_id ?? old('contact_id')) == $contact->id ? 'selected' : '' }}>{{$contact->name}}</option>    
            @endforeach
        </select>
    </div>
    {{ $errors->has('contact_id') ? $errors->first('contact_id') : '' }}
    <div class="form-group">
        <input type="text" name="number" value="{{ $phone->number ?? old('number') }}" placeholder="Número" class="borda-preta">
        {{ $errors->has('number') ? $errors->first('number') : '' }}
    </div>
   
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>