@extends('layouts.app', ['title' => 'Items'])

@section('content')
    <div class="container">
        <section class="my-5">
            <div class="card">
                <div class="card-body bg-white p-md-5 p-3">
                    <h1 class="text-center fa-3x mb-3">{{ __('Calculator') }}</h1>
                    <form action="#" method="get" class="mb-5">
                        <div class="row">
                            <div class="col-md-6 m-auto">
                                <form action="." method="get">
                                    <input type="hidden" name="i" value="{{ request()->i }}">
                                    <input type="text" class="form-control bg-light p-3" name="q" value="{{ request()->input('q') }}" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        @foreach ($items as $item)
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="card card-hover" style="width: 18rem;">
                                        <img src="{{ asset($item->image) }}" class="card-img-top" alt="blue car">
                                        <div class="card-body bg-white">
                                            <h5 class="card-title text-center">{{ $item->name }}</h5>
                                            <p class="text-center mb-0">
                                                <a href="javascript:void(0);" class="btn btn-primary w-100"
                                                    onclick="addToValue({{ $item }},{{ request()->i }})">
                                                    {{ __('Add') }}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('js')
    <!-- chartjs custom script -->
    <script>
        function addToValue(item, index) {
            arr = JSON.parse(localStorage.getItem('items')||"[[],[]]")
            data = {
                id: item.id,
                image: item.image,
                value: item.value_yesterday_avg_value,
            }
            arr[index].push(data)
            localStorage.setItem('items', JSON.stringify(arr));
            window.location.replace('/calculator')
        }
    </script>
@endpush
