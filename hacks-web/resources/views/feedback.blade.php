@extends("layouts.main")
@section("content")

<div class="container">
    <section class="row feed-section flex justify-content-center align-items-center">
    <div class="col-11">
        <form>
  
        <div>
  <h2 class="font-weight-bolder text-xl display-4"> Nume Proces birocratic</h2>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Introduceti numele de utilizator:</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Username">
  </div>
 
  
  


  <div class="form-group">
    <label for="exampleFormControlTextarea1">Cum vi s-a părut acest proces?</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
  </div>
  <div class="form-group">
  <div class="form-group">
  <a href="#" class="btn button-accent-secondary">Ofera feedback</a>
  </div>
  </div>
</form>
</div>
    </section>
    






@endsection
