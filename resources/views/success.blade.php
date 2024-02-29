@if (session()->has('success'))
<div class="alert alert-success text-center" role="alert">
    {{session()->get('success')}}
</div>
{{-- <div class="alert alert-solid-success text-center" role="alert">
    {{session()->get('success')}}
</div> --}}
@endif

@if (session()->has('faild'))
<div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-danger">
        <img src="../../assets/img/avatars/1.png" class="d-block w-px-20 h-auto rounded me-2" alt="">
        <div class="me-auto fw-semibold">Bootstrap</div>
        <small>{{ date('Y-m-d') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <h1> {{session()->get('faild')}}</h1>
</div>  






@endif