@extends("layouts.main")
@section("content")

    <div class="container">
        <section class="row feed-section flex justify-content-center align-items-center">
            <div class="col-11">
                <form action="/feedback" method="post">
                @csrf
                    <div style="white-space: nowrap;">
                        <h2 class="font-weight-bolder text-xl display-4" style="text-overflow: ellipsis;overflow: hidden;">{{request()->get('p')}}</h2>
                    </div>
                    <input type="hidden" name="process" value="{{request()->get('p')}}">
                    <div class="form-group">

                        <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="Username"
                               value="{{session()->get('user')->username}}" name="username">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Cum vi s-a părut acest proces?</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="comment"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <button  class="btn button-accent-secondary">Ofera feedback</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>





@endsection
