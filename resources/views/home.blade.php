@extends('layouts.app', ['title' => 'Home'])

@section('content')
    <div class="container">
        <section class="my-5">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-7 m-auto">
                            <form action="." method="get">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <input type="text" onchange="this.form.submit()" class="form-control p-3"
                                                placeholder="Search" name="q" value="{{ request()->q }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="" class="form-label fw-bold">{{ __('Sorting') }}</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <select name="sort" onchange="this.form.submit()" class="form-select"
                                                        id="">
                                                        <option value="">None</option>
                                                        <option @selected(request()->sort == "name.desc") value="name.desc">A - Z</option>
                                                        <option @selected(request()->sort == "value_yesterday_avg_value.asc") value="value_yesterday_avg_value.asc">Least to greatest</option>
                                                        <option @selected(request()->sort == "value_yesterday_avg_value.desc") value="value_yesterday_avg_value.desc">Greatest to least</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="mb-3">
                                                    <input type="number" onchange="this.form.submit()" class="form-control"
                                                        name="value_from" value="{{ request()->value_from }}" placeholder="min">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="mb-3">
                                                    <input onchange="this.form.submit()" type="number" class="form-control"
                                                        name="value_to" value="{{ request()->value_to }}" placeholder="max">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="card bg-white shadow my-5 p-md-5 p-3">
            <div class="row">
                @foreach ($items as $item)
                    <div class="col-md-4">
                        <div class="mb-3">
                            <div class="card card-hover">
                                <div class="card-header bg-info">
                                    <p class="card-title h4 text-center fw-bold">
                                        {{ $item->name }}
                                    </p>
                                </div>
                                <div class="card-body bg-white">
                                    <div class="card-img text-center">
                                        <img src="{{ asset($item->image) }}" class="img-fluid" alt="blue car">
                                    </div>
                                    <p class="card-text text-center">
                                        <span class="text-success fw-bold h3">
                                            {{ __('Value : ' . $item->value()) }}
                                            {{-- {{ __('Type : ' . $item->type) }} --}}
                                        </span>
                                    </p>
                                </div>
                                <div class="card-footer border-0 bg-transparent text-center">
                                    <a href="{{ route('item.show', $item->id) }}" class="btn btn-primary">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
