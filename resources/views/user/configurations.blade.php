@extends('home.index')
@section('content')
<?php
$color="success";
if(strpos(Auth::user()->style,"classic")!==false){
    $color="info";
}else if(strpos(Auth::user()->style,"dark")!==false){
    $color="dark";
}
$size="small";
if(strpos(Auth::user()->style,"normal")!==false){
    $size="normal";
}else if(strpos(Auth::user()->style,"big")!==false){
    $size="large";
}
?>
<div class="row">
    <div class="col border border-dark p-0">
        <h2 class="text-center mt-3">
            Información personal
        </h2>
        <form action="{{route('configurations.save')}}" method="post" enctype="multipart/form-data" class="px-5">
            {{csrf_field()}}
            @method('put')
            <div class="form-group">
                <label>Nombre(s)</label>
                <input type="text" name="names" class="form-control" value="{{old('names') ?? Auth::user()->names}}">
                {!!$errors->first('names','<small class="text-danger font-weight-bold">:message</small>')!!}
            </div>
            <div class="form-group">
                <label>Apellidos</label>
                <input type="text" name="last_names" class="form-control"
                    value="{{old('paternal_surname') ?? Auth::user()->last_names}}">
                {!!$errors->first('last_names','<small class="text-danger font-weight-bold">:message</small>')!!}
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Fecha de nacimiento</label>
                    <input type="date" name="birthday" class="form-control"
                        value="{{old('birthday') ?? Auth::user()->birthday}}">
                    {!!$errors->first('birthday','<small class="text-danger font-weight-bold">:message</small>')!!}
                </div>
                <div class="col">
                    <label>Número de celular</label>
                    <input type="text" name="phone_number" class="form-control"
                        value="{{old('phone_number') ?? Auth::user()->phone_number}}">
                    {!!$errors->first('phone_number','<small class="text-danger font-weight-bold">:message</small>')!!}
                </div>
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="email" class="form-control" value="{{old('email') ?? Auth::user()->email}}">
                {!!$errors->first('email','<small class="text-danger font-weight-bold">:message</small>')!!}
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Foto de perfil</label>
                    <input type="file" name="profile_picture" class="form-control-file">
                    {!!$errors->first('profile_picture','<small
                        class="text-danger font-weight-bold">:message</small>')!!}
                </div>
                <div class="col">
                    <label>Sexo</label>
                    <select name="sex" class="form-control">
                        @if(strcmp(Auth::user()->sex,"M")==-1)
                        <option value="F" selected>Femenino</option>
                        <option value="M">Masculino</option>
                        @else
                        <option value="M" selected>Masculino</option>
                        <option value="F">Femenino</option>
                        @endif
                    </select>
                    {!!$errors->first('sex','<small class="text-danger font-weight-bold">:message</small>')!!}
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label>Color de interfaz</label>
                    <select name="color" class="form-control">
                        @if($color=="info")
                        <option value="classic" class="bg-info" selected>Clasico
                        </option>
                        <option value="dark" class="bg-dark text-white">Oscuro</option>
                        <option value="colorized" class="bg-success">Colorido</option>
                        @elseif($color=="dark")
                        <option value="classic" class="bg-info">Clasico</option>
                        <option value="dark" class="bg-dark text-white" selected>Oscuro</option>
                        <option value="colorized" class="bg-success">Colorido</option>
                        @else
                        <option value="classic" class="bg-info">Clasico</option>
                        <option value="dark" class="bg-dark text-white">Oscuro</option>
                        <option value="colorized" class="bg-success" selected>Colorido</option>
                        @endif
                    </select>
                    {!!$errors->first('color','<small class="text-danger font-weight-bold">:message</small>')!!}
                </div>
                <div class="col">
                    <label>Tamaño de fuente</label>
                    <select name="font" class="form-control">
                        @if($size=="small")
                        <option value="normal" style="font-size:normal;" >Normal
                        </option>
                        <option value="small" style="font-size:small;"selected>Pequeño</option>
                        <option value="big" style="font-size:large;">Grande</option>
                        @elseif($size=="normal")
                        <option value="normal" style="font-size:normal;" selected>Normal
                        </option>
                        <option value="small" style="font-size:small;"">Pequeño</option>
                        <option value="big" style="font-size:large;">Grande</option>
                        @else
                        <option value="normal" style="font-size:normal;">Normal
                        </option>
                        <option value="small" style="font-size:small;"">Pequeño</option>
                        <option value="big" style="font-size:large;"selected>Grande</option>
                        @endif
                    </select>
                    {!!$errors->first('size','<small class="text-danger font-weight-bold">:message</small>')!!}
                </div>
            </div>
            <div class="form-group form-row">
                <input type="submit" class="btn btn-{{$color}} mx-auto" value="Guardar">
            </div>
        </form>
    </div>
</div>
<!-- CHANGE PASSWORD -->
<div class="row">
    <div class="col border border-dark p-0">
        <h2 class="text-center mt-3">
            Cambiar contraseña
        </h2>
        <form action="{{route('password.save')}}" method="post" class="px-5">
            {{csrf_field()}}
            @method('put')
            <div class="form-group">
                <label>Antigua contraseña</label>
                <input type="password" name="old_password" class="form-control" value="{{old('old_password')}}">
                {!!$errors->first('old_password','<small class="text-danger font-weight-bold">:message</small>')!!}
            </div>
            <div class="form-group">
                <label>Nueva contraseña</label>
                <input type="password" name="password" class="form-control" value="{{old('password')}}">
                {!!$errors->first('password','<small class="text-danger font-weight-bold">:message</small>')!!}
            </div>
            <div class="form-group">
                <label>Confirma tu nueva contraseña</label>
                <input type="password" name="password_confirmation" class="form-control"
                    value="{{old('password_confirmation')}}">
                {!!$errors->first('password','<small
                    class="text-danger font-weight-bold text-small">:message</small>')!!}
            </div>
            <div class="form-group form-row">
                <input type="submit" class="btn btn-{{$color}} mx-auto" value="Guardar">
            </div>
        </form>
    </div>
</div>
<!-- CHANGE TO ADMIN -->
<div class="row">
    <div class="col border border-dark p-0">
        <h5 class="text-center mt-3">
            Convertir cuenta a administrador
        </h5>
        <form action="{{route('user.admin')}}" method="post" class="px-5">
            {{csrf_field()}}
            <div class="row my-3 align-items-center">
                <div class="col-md-5">
                    <label>Contraseña de administrador</label>
                </div>
                <div class="col-md">
                    <input type="password" name="admin_password" class="form-control" value="{{old('old_password')}}">
                    {!!$errors->first('admin_password','<small
                        class="text-danger font-weight-bold">:message</small>')!!}
                </div>
            </div>
            <div class="form-group form-row">
                <input type="submit" class="btn btn-{{$color}} mx-auto" value="Convertir">
            </div>
        </form>
    </div>
</div>
<!-- DELETE ACCOUNT -->
<div class="row">
    <div class="col border border-danger p-0">
        <button class="btn btn-outline-danger btn-block btn-lg" data-toggle="modal" data-target="#deleteAccountModal">
            Eliminar cuenta
        </button>
    </div>
</div>
<!-- deleteAccountModal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar cuenta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Su cuenta será eliminada permanentemente y no podrás recuperarla.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                <a type="button" class="btn btn-danger" href="{{route('account.delete')}}">Eliminar cuenta</a>
            </div>
        </div>
    </div>
</div>

@endsection
