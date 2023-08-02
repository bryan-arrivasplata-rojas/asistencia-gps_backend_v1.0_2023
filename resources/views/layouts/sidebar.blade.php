<div class="sidebar">
    <div class="container" style="text-align: center;">
        <img src="{{URL::asset('img/logo_blanco.png')}}" style="width: 150px; height:200px;border-radius: 50%; margin-bottom: 30px;">
    </div>
    <ul class="sidebar-list">
        <li class="list-menu">
            <a href="{{url('/home')}}" class="bi bi-house-heart-fill value"> Home</a>
        </li>
        <li class="list-menu {{'parametros'==Request::is('parametros*')?'active':''}}">
            <a class="bi bi-motherboard value"> Parametros</a>
            <ul class="list-submenu">
                <li class="{{'parametros/tipociclo'==Request::is('parametros/tipociclo*')?'active-list':''}}">
                    <a href="{{route('parametros.tipociclo.index')}}">Tipo Ciclo</a>
                </li>
                <li class="{{'parametros/facultades'==Request::is('parametros/facultades*')?'active-list':''}}">
                    <a href="{{route('parametros.facultades.index')}}">Facultades</a>
                </li>
                <li class="{{'parametros/cursos'==Request::is('parametros/cursos*')?'active-list':''}}">
                    <a href="{{route('parametros.cursos.index')}}">Cursos</a>
                </li>
                <li class="{{'parametros/secciones'==Request::is('parametros/secciones*')?'active-list':''}}">
                    <a href="{{route('parametros.secciones.index')}}">Secciones</a>
                </li>
                <li class="{{'parametros/aulas'==Request::is('parametros/aulas*')?'active-list':''}}">
                    <a href="{{route('parametros.aulas.index')}}">Aulas</a>
                </li>
                <li class="{{'parametros/tipos'==Request::is('parametros/tipos*')?'active-list':''}}">
                    <a href="{{route('parametros.tipos.index')}}">Roles de Usuario</a>
                </li>
                <li class="{{'parametros/usuarios'==Request::is('parametros/usuarios*')?'active-list':''}}">
                    <a href="{{route('parametros.usuarios.index')}}">Usuarios</a>
                </li>
                <li class="{{'parametros/perfiles'==Request::is('parametros/perfiles*')?'active-list':''}}">
                    <a href="{{route('parametros.perfiles.index')}}">Perfiles</a>
                </li>
            </ul>
        </li>
        <li class="list-menu {{'opciones'==Request::is('opciones*')?'active':''}}">
            <a class="bi bi-gear value"> Opciones</a>
            <ul class="list-submenu">
                <li class="{{'opciones/ops'==Request::is('opciones/ops*')?'active-list':''}}">
                    <a href="{{route('opciones.ops.index')}}">Ciclo Académico</a>
                </li>
                <li class="{{'opciones/osemanas'==Request::is('opciones/osemanas*')?'active-list':''}}">
                    <a href="{{route('opciones.osemanas.index')}}">OP Semanas</a>
                </li>
                <li class="{{'opciones/ocursos'==Request::is('opciones/ocursos*')?'active-list':''}}">
                    <a href="{{route('opciones.ocursos.index')}}">OP Cursos</a>
                </li>
                <li class="{{'opciones/osecciones'==Request::is('opciones/osecciones*')?'active-list':''}}">
                    <a href="{{route('opciones.osecciones.index')}}">OP Secciones</a>
                </li>
                <li class="{{'opciones/usuariosecciones'==Request::is('opciones/usuariosecciones*')?'active-list':''}}">
                    <a href="{{route('opciones.usuariosecciones.index')}}">OP User Sección</a>
                </li>
                <li class="{{'opciones/asistenciahabilitados'==Request::is('opciones/asistenciahabilitados*')?'active-list':''}}">
                    <a href="{{route('opciones.asistenciahabilitados.index')}}">Asis. habilitado</a>
                </li>
                <li class="{{'opciones/asistencias'==Request::is('opciones/asistencias*')?'active-list':''}}">
                    <a href="{{route('opciones.asistencias.index')}}">Asistencia</a>
                </li>
            </ul>
        </li>
        <li class="list-menu">
            <a href="{{ route('logout') }}" class="bi bi-box-arrow-left value" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout</a>
        </li>
    </ul>
</div>