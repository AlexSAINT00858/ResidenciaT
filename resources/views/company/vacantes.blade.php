<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Ofertas') }}
        </h2> --}}
    </x-slot>
    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table table-bordered text-center" style="width: 80%; margin:auto">
        <tr class="table-dark">
            <th>id</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>E-mail</th>
            <th>Trabajo</th>
            <th>CV</th>
            <th>Eliminar</th>
        </tr>
        @foreach ($dataJobApplications as $data)
            <tr class="table-light">
                <td>{{ $data->idJobApplication}}</td>
                <td>{{ $data->dataCandidate->nameCandidate}}</td>
                <td>{{ $data->dataCandidate->lastName}}</td>
                <td>{{ $data->dataCandidate->phoneNumberCandidate}}</td>
                <td>{{ $data->dataCandidate->emailCandidate}}</td>
                <td>{{ $data->dataCandidate->jobTrade}}</td>
                <td><a href="{{ asset('resumes/'.$data->dataCandidate->resumeCandidate) }}" target="_blank"><img src="{{ asset('images/icon-pdf.png') }}" style="width: 40%; margin:auto" alt="pdf.jpg"></a></td>
                <td><a href="/deleteJobApplication/{{ $data->idJobApplication }}/{{ $data->idOffer }}"><img src="{{ asset('images/borrar.png') }}" alt="borrar" style="width: 25%; margin:auto"></a></td>
            </tr>
        @endforeach
    </table>
</x-app-layout>