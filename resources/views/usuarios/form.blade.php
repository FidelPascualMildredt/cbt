
<h1>{{$modo}} usuarios</h1>

<label for="nombre">Nombre del usuario</label>
<input type="text"  name="nombre"   id="nombre"    value="{{isset($usuarios->nombre)?($usuarios->nombre):''}}"><br>

    <label for="app">Apellido Paterno</label>
<input type="text"  name="app"  id="app"    value="{{isset($usuarios->app)?($usuarios->app):''}}"><br>

    <label for="fn">Fn</label>
<input type="text"  name="fn"   id="fn"     value="{{isset($usuarios->fn)?($usuarios->fn):''}}"><br>

    <label for="gen">Genero</label>
<input type="text"  name="gen"  id="gen"    value="{{isset($usuarios->gen)?($usuarios->gen):''}}"><br>

    <label for="email">Correo</label>
<input type="email"  name="email"    id="email"     value="{{isset($usuarios->email)?($usuarios->email):''}}"><br>

    <label for="pass">Contraseña</label>
<input type="password"  name="pass"     id="pass"   value="{{isset($usuarios->pass)?($usuarios->pass):''}}"><br>

    <label for="datos">Datos</label>
<input type="text"  name="datos"    id="datos"      value="{{isset($usuarios->datos)?($usuarios->datos):''}}"><br>

    <label for="Foto">Foto</label>
    @if(isset($usuarios->Foto))
    <img src="{{asset('storage').'/'.$usuarios->Foto}}" width="100" alt="">
    @endif
    <input type="file"  name="Foto"    id="Foto"    value=""><br>

<input type="submit"  value="{{ $modo }} DATOS">
<a href="{{ url('usuarios/') }}">Regresar</a>

<br>

