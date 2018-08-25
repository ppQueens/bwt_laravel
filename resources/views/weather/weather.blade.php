@extends('main')

@section("title", "Погода на сегодня")
@section('content')

    <div class="container">
    <h2>Погода на сегодня</h2>
    <?php if($data){
        echo '<div class="row table-bordered justify-content-center">
                <div class="col-sm-1 col-sm-offset-1">
                    .'.$data["short"].'.
                </div>
                <div class="col-sm-8 col-sm-offset-1">
                    .'.$data["detailed"].'.
                </div>

           </div>';

        echo '<div class="row table-bordered">
                <div class="col-sm-5 col-sm-offset-2">

                </div>

           </div>';
    } ?>

    </div>

@endsection