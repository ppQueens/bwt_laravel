@extends("main")

@section("title","Оставить отзыв")
@section("content")
    <div class="container">
<form class="form-horizontal" action="/new_feedback" method="POST">
    @csrf
    <input hidden name="post" value="leave_feedback">
    <fieldset>
        <legend>Legend</legend>

        @guest
            <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputEmail" name="email" placeholder="Email" required type="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputPassword" name="password" placeholder="Password" required type="password">

                    </div>
                </div>'
        @else
            <input hidden type="email" name="email" value="{{Auth::user()->email}}">
        @endguest
        <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">Отзыв</label>
            <div class="col-lg-10">
                <textarea name="feedback" class="form-control" rows="3" required maxlength="250" minlength="30"
                          id="textArea"></textarea>
                <span class="help-block">Минимальное число знаков 30, максимальное - 250</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <img src="captcha.php"/>
                <input class="input" type="text" name="notrobot"/>

                <button type="submit" class="btn btn-primary">Отправить</button>
                <div class="alert-danger"><b>
                    </b></div>

            </div>
        </div>
    </fieldset>
</form>
    </div>
@endsection