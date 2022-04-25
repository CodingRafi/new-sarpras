@extends('mylayouts.main')

@section('container')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <form action="/kompeten" method="POST">
                    @csrf
                    <input type="hidden" name="profil_id" value="{{ $profil_id }}">
                    @foreach ($komlis as $komli)
                        @if (count($profilKompetens) > 0)
                            @foreach ($profilKompetens as $profilKompeten)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $komli->id }}"
                                        id="flexCheckChecked" name="komli[]"
                                        {{ $profilKompeten->komli_id == $komli->id ? 'disabled' : '' }}>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        {{ $komli->kompetensi }}
                                    </label>
                                </div>
                            @endforeach
                        @else
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $komli->id }}"
                                    id="flexCheckChecked" name="komli[]">
                                <label class="form-check-label" for="flexCheckChecked">
                                    {{ $komli->kompetensi }}
                                </label>
                            </div>
                        @endif
                    @endforeach
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection
