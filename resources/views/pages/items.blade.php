@extends('layouts.app', ['title' => 'Items'])

@section('content')
    <div class="container">
        <section class="my-5">
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-md-0 mb-3">
                        <div class="card-body bg-white p-md-5 p-3">
                            <div class="text-center mb-5">
                                <img src="{{ asset($item->image) }}" class="img-fluid" alt="blue car">
                            </div>
                            <div class="table-responsive mb-5">
                                <table class="table table-primary table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-nowrap">{{ __('Name') }}</th>
                                            <th class="text-center text-nowrap">{{ __('Value') }}</th>
                                            <th class="text-center text-nowrap">{{ __('Price') }}</th>
                                            <th class="text-center text-nowrap">{{ __('Type') }}</th>
                                            <th class="text-center text-nowrap">{{ __('Max Speed') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center text-nowrap">{{ $item->name }}</td>
                                            <td class="text-center text-nowrap">{{ $item->value()}}</td>
                                            <td class="text-center text-nowrap">{{ $item->price }}</td>
                                            <td class="text-center text-nowrap">{{ $item->type }}</td>
                                            <td class="text-center text-nowrap">{{ $item->maxspeed }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-header">
                            <h5>{{ __('Update Value') }}</h5>
                        </div>
                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success">{{ session()->get('success') }}</div>
                            @endif
                            <form method="post" action="{{ route('item.value.update', $item->id) }}">
                                @csrf
                                <input type="number" name="value" class="form-control"
                                    placeholder="{{ $item->value() }}" value="{{ old('value') }}">
                                @error('value')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <button class="btn btn-primary mt-2">{{ __('Submit') }}</button>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title h5 text-center mb-0">
                                {{ __('Recent Submissions') }}
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                {{-- latest 3 Items --}}
                                @foreach ($items as $_item)
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div class="card card-hover">
                                                <div class="card-header bg-info">
                                                    <p class="card-title h6 mb-0 text-center fw-bold">
                                                        {{ $_item->name }}
                                                    </p>
                                                </div>
                                                <div class="card-body bg-white">
                                                    <div class="card-img text-center">
                                                        <img src="{{ asset($_item->image) }}" class="img-fluid w-50"
                                                            alt="blue car">
                                                    </div>
                                                    <p class="card-text text-center">
                                                        <span class="text-success fw-bold h6 mb-0">
                                                            {{ __('Type : ' . $_item->type) }}
                                                        </span>
                                                    </p>
                                                    <p class="card-text text-center">
                                                        <span class="text-success fw-bold h6 mb-0">
                                                            {{ __('Value : ' . $_item->value()) }}
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="card-footer border-0 bg-transparent text-center">
                                                    <a href="{{ route('item.show', $_item->id) }}"
                                                        class="btn btn-sm btn-primary">{{ __("View More") }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-12">
                                    <a class="btn btn-secondary w-100" href="{{ route('home') }}">{{ __('View All') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @php
        $graphData = $item
            ->valueHistory()
            ->select(DB::raw('AVG(value) as avg_value'), DB::raw('DATE(created_at) as date'), 'value')
            ->groupBy('date')
            ->get()
            ->pluck('avg_value', 'date')
            ->toArray();
    @endphp

    @push('js')
        <!-- chartjs custom script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('myChart');
                const graphData = @json($graphData);

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: Object.keys(graphData),
                        datasets: [{
                            label: 'Value',
                            data: Object.values(graphData),
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
