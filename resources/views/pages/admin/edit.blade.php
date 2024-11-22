@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body flex flex-col p-6">
        <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
            <div class="flex-1">
                <div class="card-title text-slate-900 dark:text-white">Vertical Form With Icons</div>
            </div>
        </header>
        <div class="card-text h-full ">
            <form class="space-y-4" id="form">
                @csrf
                <div class="input-area relative">
                    <label for="largeInput" class="form-label">Full Name</label>
                    <div class="relative">
                        <input id="name" name="name" value="{{ $data->name }}" type="text" class="form-control !pl-9"
                            placeholder="Full Name">
                        <iconify-icon icon="heroicons-outline:user"
                            class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                    </div>
                </div>
                <div class="input-area relative">
                    <label for="largeInput" class="form-label">Email</label>
                    <div class="relative">
                        <input id="email" name="email" value="{{  $data->email }}" type="email"
                            class="form-control !pl-9" placeholder="Your Email">
                        <iconify-icon icon="heroicons-outline:mail"
                            class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                    </div>
                </div>
                <div class="input-area relative">
                    <label for="largeInput" class="form-label">Phone</label>
                    <div class="relative">
                        <input id="phone" name="phone" value="{{  $data->phone }}" type="tel" class="form-control !pl-9"
                            placeholder="Phone Number" pattern="[0-9]">
                        <iconify-icon icon="heroicons-outline:phone"
                            class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                    </div>
                </div>
                <button type="button" onclick="update({{ $data->id }})" id="submit-btn"
                    class="btn inline-flex justify-center btn-dark">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    function update(id) {
            // let formData = new FormData();

            axios.put(`/dash/admin/${id}`, {
                'name' :document.getElementById('name').value,
                'email' : document.getElementById('email').value,
                'phone': document.getElementById('phone').value,
            }).then(function(response) {
                toastr.success(response.data.message);
                // window.location.href= {{ route('admin.index') }}
                document.getElementById('form').reset();
            }).catch(function(error) {
                toastr.error(error.response.data.message);

            });

        // let formData = new FormData();
        //     formData.append('name', document.getElementById('name').value);
        //     formData.append('email', document.getElementById('email').value);
        //     formData.append('phone', document.getElementById('phone').value);
        //     axios.patch(`/dash/admin/${id}`, formData).then(function(response) {
        //         toastr.success(response.data.message);
        //         document.getElementById('form').reset();
        //         }).catch(function(error) {
        //             toastr.error(error.response.data.message);

        //             });

        }

</script>
{{-- <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script> --}}
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
@endsection
