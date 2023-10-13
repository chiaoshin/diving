@extends("layouts/app")


@section("head")
<link href="{{ asset("css/partnerAdd.css") }}" rel="stylesheet">

@endsection

@section("body")
<div class="container">  
			
    <form id="contact" action="" method="post">
        <img src="{{ asset('img/partnerAdd/user.png') }}" alt="Profile Picture" class="profile-picture">
          @csrf
          <fieldset>
            <br><label><b>出團日</b></label>
            <input type="date" name="dateofbirth" id="dateofbirth">
          </fieldset>
          <fieldset>
            <br><label><b>地點</b></label>
            <input placeholder="地點" type="text"  required autofocus>
          </fieldset>
          <fieldset>
            <br><label><b>金額</b></label>
            <input placeholder="金額" type="text"  required autofocus>
          </fieldset>
          <fieldset>
            <br><label><b>Email</b></label>
            {{-- <input placeholder="Email" type="email" value="{{ $partner->email }}"  required autofocus> --}}
            <input placeholder="Email" type="email" value="{{ auth()->user()->email }}"  required autofocus>
          </fieldset>
        
        </fieldset>
        <fieldset>
            <br><label><b>人數限制</b></label>
            <input placeholder="人數限制" type="number" autocomplete="off" name="passengers" class="input-field" min="0" required>
        </fieldset>
        
        <!-- <fieldset>
            <label><b>敘述</b></label>
            <textarea placeholder="請輸入文章內容" type="text" required></textarea>
          </fieldset>
          -->
    
                            
        <div class="options-container">
            <div class="left-options">
                <br><label><b>類型</b></label><br>
                <br>
                <div class="radio-buttons-container">
                    <div class="radio-button">
                      <input name="radio-group" id="radio2" class="radio-button__input" type="radio">
                      <label for="radio2" class="radio-button__label">
                        <span class="radio-button__custom"></span>
                            <b>浮潛</b>
                      </label>
                    </div>
                    <div class="radio-button">
                      <input name="radio-group" id="radio1" class="radio-button__input" type="radio">
                      <label for="radio1" class="radio-button__label">
                        <span class="radio-button__custom"></span>
                            <b>自由潛水</b>
                      </label>
                    </div>
                    <div class="radio-button">
                      <input name="radio-group" id="radio3" class="radio-button__input" type="radio">
                      <label for="radio3" class="radio-button__label">
                        <span class="radio-button__custom"></span>
                            <b>水肺潛水</b>
                      </label>
                    </div>
                </div>
            </div>

            <!-- 有無考照按鈕組 -->
            <div class="right-options">
                <br><label><b>有無考照</b></label><br>
                <br>
                <div class="radio-buttons-container">
                    <div class="radio-button">
                      <input name="radio-group-license" id="radio-license-yes" class="radio-button__input" type="radio">
                      <label for="radio-license-yes" class="radio-button__label">
                        <span class="radio-button__custom"></span>
                        <b>有</b>
                      </label>
                    </div>
                    <div class="radio-button">
                      <input name="radio-group-license" id="radio-license-no" class="radio-button__input" type="radio">
                      <label for="radio-license-no" class="radio-button__label">
                        <span class="radio-button__custom"></span>
                        <b>無</b>
                      </label>
                    </div>
                </div>
            </div>
        </div>  
    
        <fieldset class="button-container">
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">送出</button>
            <button name="cancel" type="cancel" id="contact-cancel" data-cancel="...Sending">取消</button>
        </fieldset>
          
      
    </form>
  </div>
@endsection

@section("script")

@endsection