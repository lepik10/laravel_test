@extends('templates.main')

@section('content')
    <div class="py-5">
        <h2 class="mb-5">История операций</h2>
        <form class="row mb-3">
            <div class="col-auto">
                <input type="text" name="search" class="form-control" placeholder="Поиск по описанию" value="{{ request()->get('search') ?? '' }}">
            </div>
            <button type="submit" class="btn btn-primary col-auto">Поиск</button>
        </form>
        <div class="table-wrap">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Сумма операции</th>
                    <th>Описание операции</th>
                    <th>Дата</th>
                </tr>
                </thead>
                <tbody>
                @forelse($operations as $operation)
                    <tr>
                        <td>{{ $operation->amount_formatted }} руб</td>
                        <td>{{ $operation->description }}</td>
                        <td>{{ $operation->created_at_formatted }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Операции не найдены!</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $operations->withQueryString()->links() }}
        </div>
    </div>
@endsection
