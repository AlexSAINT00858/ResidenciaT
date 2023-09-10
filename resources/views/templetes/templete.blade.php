<div class="container-data row mx-auto container-fluid" style="background:white">
    <center class="row">
        <div class="encabezado col">
            @yield('header')
        </div>
    </center>
    <!-- Inicio Menu -->
    <center class="row">
        <nav class="col">
            <div id="menu"> 
                <ul class="menup"> 
                    @yield('menu')
                </ul>
            </div>
        </nav>
    </center>
    <!-- Fin Menu -->
    <section class="row">
        @yield('contenido')
    </section>
</div>