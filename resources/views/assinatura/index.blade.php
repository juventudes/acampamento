@extends('layouts.default')

@section('content')
    <section>
        <h1>Pessoas que vão aparecer ;)</h1>
        <h3><a href="{{ route('assinatura.create') }}">{{ trans('msg.assine') }}</a></h3>
        <ul>
            @forelse($assinaturas as $assinatura)
                <li>
                    {{ "$assinatura->nome," }} <em>{{ $assinatura->local_politico }}</em>
                </li>
                @empty
                <li>Nenhuma pessoa assinou ainda :(</li>
            @endforelse
        </ul>
    </section>
@endsection
