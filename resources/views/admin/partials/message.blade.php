


@if ($errors->any())
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-danger">

                <button type="button" class="close" data-dismiss="alert">×</button>

                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
