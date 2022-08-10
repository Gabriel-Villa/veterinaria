@extends('layouts.layout', ['noFooter' => true])

@section('title', 'Feedback')

@section('content')
    @include('partials.navbar-dashboard')
    <section class="page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-0">
                    <h1>Listado Feedbacks</h1>
                    <x-alerta />
                    
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr>
                                <th scope="col" class="text-dark">#</th>
                                <th scope="col" class="text-center text-dark">Cliente</th>
                                <th scope="col" class="text-center text-dark">Mensaje</th>
                                <th scope="col" class="text-center text-dark">Tipo</th>
                                <th scope="col" class="text-center text-dark">Fecha Feedback</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($feedbacks as $index => $feedback)
                                <tr>
                                    <th scope="row" class="text-dark">{{ $index + 1 }}</th>
                                    <th scope="row" class="text-center text-dark">{{ $feedback->orden->cliente->name ?? '' }}</th>
                                    <td class="text-center text-dark">{{ $feedback->comentario }}</td>
                                    <td class="text-center text-dark">{{ $feedback->tipo_feedback->valor ?? '' }}</td>
                                    <td class="text-center text-dark">
                                        {{ Carbon\Carbon::parse($feedback->fecha_creacion)->format('d/m/Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="4">Aun no existe ni un feedback</th>
                                </tr>
                            @endforelse
                            {{ $feedbacks->links() }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
