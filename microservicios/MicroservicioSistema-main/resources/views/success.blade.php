
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Registro Completado</h2>

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <p>Gracias por registrarte. Tu cuenta ha sido creada exitosamente.</p>
    
        </div>
    </div>
</div>

