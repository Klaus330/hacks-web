@extends("layouts.main")
@section("content")

    <div class="container">
        <section class="row feed-section flex justify-content-center align-items-center">
            <div class="col-11">
                <form action="/feedback" method="POST">
                    @csrf
                    <div class="mt-5" style="white-space: nowrap;">
                        <h2 class="font-weight-bolder text-xl display-4"
                            style="text-overflow: ellipsis;overflow: hidden;">{{request()->get('p')}}</h2>
                    </div>
                    <input type="hidden" name="process" value="{{request()->get('p')}}">
                    <div class="form-group">

                        <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="Username"
                               value="{{session()->get('user')->username}}" name="username">
                    </div>

                    <div class="form-group mt-10">
                        <h5>Informațiile oferite de site-ul nostru v-au fost de folos în vederea finalizării procesului
                            birocratic dorit ?</h5>
                        <div class="answers">
                            <label class="radio-inline mr-4">
                                <input type="radio"  class="option-input radio" name="q1" value=true>DA
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="option-input radio" name="q1" value=false>NU
                            </label>
                        </div>

                    </div>


                    <div class="form-group">
                        <h5>Cum evaluați calitatea îndrumărilor oferite de personalul instituțiilor cu care ați
                            interacționat?</h5>
                        <div class="answers">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input option-input radio" id="q2-a1" name="q2" value=1>
                                <label class="form-check-label" for="a2-a1">Foarte slaba</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input option-input radio" id="q2-a2" name="q2" value=2>
                                <label class="form-check-label" for="q2-a2">Slaba</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input option-input radio" id="q2-a3" name="q2" value=3>
                                <label class="form-check-label" for="q2-a3">Medie</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input option-input radio" id="q2-a4" name="q2" value=4>
                                <label class="form-check-label" for="q2-a4">Buna</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input option-input radio" id="q2-a5" name="q2" value=5>
                                <label class="form-check-label" for="q2-a5">Foarte buna</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <h5>Care a fost timpul mediu de așteptare în decursul desfășurării întregului proces
                            biroctratic</h5>
                        <div class="answers">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input option-input radio" id="q3-a1" name="q3" value="0-30">
                                <label class="form-check-label" for="q3-a1">0-30 minute</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input option-input radio" id="q3-a2" name="q3" value="30-45">
                                <label class="form-check-label" for="q3-a2">30-45 minute</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input option-input radio" id="q3-a3" name="q3" value="45-60">
                                <label class="form-check-label" for="q3-a3">45-60 minute</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input option-input radio" id="q3-a4" name="q3" value="60-90">
                                <label class="form-check-label" for="q3-a4">60-90 minute</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input option-input radio" id="q3-a5" name="q3" value="90+">
                                <label class="form-check-label" for="q3-a5">Mai mult de 90 de minute</label>
                            </div>
                        </div>

                    </div>


                    <div class="form-group mt-5">
                        <div class="feedback-process-rating">
                            <h5>Evaluează întreaga experiență</h5>
                            <div class="star-rating mt-5"><input type="radio" name="q4" value="5" id="5">
                                <label for="5"></label>
                                <input type="radio" name="q4" value=4 id="4">
                                <label for="4"></label>
                                <input type="radio" name="q4" value=3 id="3">
                                <label for="3"></label>
                                <input type="radio" name="q4" value=2 id="2">
                                <label for="2"></label>
                                <input type="radio" name="q4" value=1 id="1">
                                <label for="1"></label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Așteptăm părerea ta pentru a ne îmbunătăți calitatea serviciilor oferite</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"
                                  name="comment"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <button class="btn button-accent-secondary">Oferă feedback</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>


@endsection
