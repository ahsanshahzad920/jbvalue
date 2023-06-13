@extends('layouts.app', ['title' => 'Calculator'])

@section('content')
    <div class="container">
        <section class="my-5">
            <div class="card">
                <div class="card-body p-md-5 p-3">
                    <h1 class="text-center fa-3x mb-3">{{ __('Calculator') }}</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="card">
                                    <div class="card-header p-3 d-flex justify-content-center align-items-center">
                                        <div id="values-container-0" class="justify-content-center align-items-center">
                                        </div>
                                        <a href="{{ route('addvalue.index', ['i' => 0]) }}">
                                            <i class="fa-solid fa-circle-plus fa-10x"></i>
                                        </a>
                                    </div>
                                </div>
                                <h1 class="text-center mt-3">
                                    {{ __('Value: ') }} <span id="value-0">0</span>
                                </h1>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="card">
                                    <div class="card-header p-3 d-flex justify-content-center align-items-center">
                                        <div id="values-container-1" class="justify-content-center align-items-center">
                                        </div>
                                        <a href="{{ route('addvalue.index', ['i' => 1]) }}">
                                            <i class="fa-solid fa-circle-plus fa-10x"></i>
                                        </a>
                                    </div>
                                </div>
                                <h1 class="text-center mt-3">
                                    {{ __('Value: ') }} <span id="value-1">0</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('js')
    <!-- chartjs custom script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            arr = JSON.parse(localStorage.getItem('items') || "[[],[]]")

            arr.forEach((v, k) => {
                html = ['', ''];
                values = [0, 0];
                arr[k].forEach((e, k2) => {
                    html[k] += `
                <a href="javascript:void(0);" onclick="removeItem(${k},${k2})">
                    <img src="${e.image}" width="150 " alt=""/>
                </a>`;
                    values[k] += +e.value;
                });

                document.getElementById(`values-container-${k}`).innerHTML = html[k]
                document.getElementById(`value-${k}`).innerHTML = values[k]
            });

        });

        function removeItem(index, item) {
            arr = JSON.parse(localStorage.getItem('items') || "[[],[]]")
            arr[index].splice(item, 1);
            localStorage.setItem('items', JSON.stringify(arr));
            window.location.replace('/calculator')
        }
    </script>
@endpush
