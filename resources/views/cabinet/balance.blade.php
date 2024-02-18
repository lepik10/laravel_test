@extends('templates.main')

@section('content')
    <div class="py-5">
        <h2 class="mb-5">Баланс</h2>
        <div id="app">
            <last-operations
                balance="{{ $balance->amount_formatted }}"
                :operations="{{ $operations }}"
                csrf="{{ csrf_token() }}"
            ></last-operations>
        </div>
    </div>
@endsection
