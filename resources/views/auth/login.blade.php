@extends('layouts.login')

@section('title', app_name() . ' | ' . __('Iniciar Sesión'))

@section('content')
<div class="centered">
    <div class="form">
        <div class="form-toggle"></div>
        <div class="form-panel one">
            <div class="form-header">
                <h1>INICIAR SESIÓN</h1>
            </div>

            <div class="form-content">
                <form>
                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input type="text" id="username" name="username" />
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" />
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="kt-checkbox kt-checkbox--bold kt-checkbox--info">
                                <input type="checkbox"> Recordarme
                                <span></span>
                            </label>
                        </div>

                        <div class="col-6 text-right">
                            <a class="form-recovery" href="#">Olvidó su contraseña?</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit">Iniciar Sesión</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="form-panel two">
            <div class="form-header">
                <h1>Registrar Cuenta</h1>
            </div>

            <div class="form-content">
                <form>
                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input type="text" name="username" />
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" />
                    </div>

                    <div class="form-group">
                        <label for="cpassword">Confirmar Contraseña</label>
                        <input type="password" name="cpassword" />
                    </div>

                    <div class="form-group">
                        <label for="email">Dirección de Correo</label>
                        <input type="email" name="email" />
                    </div>

                    <div class="form-group">
                        <button type="submit">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
