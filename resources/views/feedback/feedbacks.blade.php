@extends("main")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3>Все отзывы</h3>
        </div><!-- /col-sm-12 -->
    </div><!-- /row -->

    <?php
    if($feeds){
        foreach ($feeds as $value){

            echo '  <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>'.$value["user"]["email"].'</strong> <span class="text-muted">'.$value["created_at"].'</span>
                        </div>
                        <div class="panel-body">
                           '.$value["text"].'
                        </div><!-- /panel-body -->
                    </div><!-- /panel panel-default -->
                </div><!-- /col-sm-5 -->
        
            </div><!-- /row -->';
        }
    }
    ?>
    {{--@include("feedback.feedback_form")--}}
</div><!-- /container -->

@endsection