<form action="{{ route('register') }}" id="register-form" method="POST">
    @csrf
    <div class="row">
        <div class="col-12 col-lg-6 order-1">
            <div class="item-wrap">
                <label for="email"><span class="form-required">*</span>EMAIL</label>
                <div class="input-wrap">
                    <input id="email" name="email" type="email" placeholder="email@email.com"  autocomplete="email" required value="{{ old('email') }}">
                </div>
            </div>
            @error('email')
            <span class="form-required">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="col-12 col-lg-6 order-2">
            <div class="item-wrap">
                <label for="first_name"><span class="form-required">*</span>FIRST NAME</label>
                <div class="input-wrap">
                    <input id="first_name" name="first_name" type="text" placeholder="First Name" required value="{{ old('first_name') }}">
                </div>
            </div>
            @error('first_name')
            <span class="form-required">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="col-12 col-lg-6 order-4">
            <div class="item-wrap">
                <label for="password"><span class="form-required">*</span>PASSWORD</label>
                <div class="input-wrap">
                    <input id="password" name="password" type="password" placeholder="password" required autocomplete="new-password">
                </div>
            </div>
            @error('password')
            <span class="form-required">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="col-12 col-lg-6 order-3">
            <div class="item-wrap">
                <label for="last_name"><span class="form-required">*</span>LAST NAME</label>
                <div class="input-wrap">
                    <input id="last_name" name="last_name" type="text" placeholder="Last Name" required value="{{ old('last_name') }}">
                </div>
            </div>
            @error('last_name')
            <span class="form-required">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="col-12 col-lg-6 order-5">
            <div class="item-wrap">
                <label for="password-confirm"><span class="form-required">*</span>CONFIRM PASSWORD</label>
                <div class="input-wrap">
                    <input id="password-confirm" name="password_confirmation" type="password" placeholder="the same password" required autocomplete="new-password">
                </div>
            </div>
            @error('password_confirmation')
            <span class="form-required">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="col-12 col-lg-6 order-6">
            <div class="item-wrap">
                <label for="mobile"><span class="form-required">*</span>PHONE NUMBER</label>
                <div class="input-wrap">
                    <input id="mobile" name="mobile" type="number" placeholder="PHONE NUMBER" required value="{{ old('mobile') }}">
                </div>
            </div>
            @error('mobile')
            <span class="form-required">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="col-12 order-7">
            <div class="item-wrap address-wrap">
                <label for="address1"><span class="form-required">*</span>ADDRESS LINE 1</label>
                <div class="input-wrap">
                    <div class="address-input">
                        <input id="address1" name="address1" class="address" type="text" placeholder="please enter your address" required value="{{ old('address1') }}">
                    </div>
                </div>
            </div>
            @error('address1')
            <span class="form-required">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="col-12 order-8">
            <div class="item-wrap address-wrap">
                <label for="address2">ADDRESS LINE 2</label>
                <div class="input-wrap">
                    <div class="address-input">
                        <input id="address2" name="address2" class="address" type="text" placeholder="please enter your address" value="{{ old('address2') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 order-9">
            <div class="item-wrap">
                <label for="city">CITY</label>
                <div class="input-wrap">
                    <input id="city" name="city" type="text" placeholder="ex:Xizhi Dist." value="{{ old('city') }}">
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 order-10">
            <div class="item-wrap">
                <label for="state">STATE/PROVINCE/REGION</label>
                <div class="input-wrap">
                    <input id="state" name="state" type="text" placeholder="ex:Taipei" value="{{ old('state') }}">
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 order-11">
            <div class="item-wrap">
                <label for="zip">ZIP</label>
                <div class="input-wrap">
                    <input id="zip" name="zip_code" type="text" placeholder="ex:106" value="{{ old('zip_code') }}">
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 order-12">
            <div class="item-wrap">
                <label for="country">COUNTRY</label>
                <div class="input-wrap">
                    <input id="country" name="country" type="text" placeholder="ex:TAIWAN" value="{{ old('country') }}">
                </div>
            </div>
        </div>
        <div class="col-12 order-12">
            <div class="checkbox-area">
                <p class="form-required" id="notAgree" style="display: none">
                    Please check
                </p>
            </div>
            <div class="checkbox-area">
                <input type="checkbox" id="check" name="checkterm">
                <label for="check">I agree to the the content of Terms and Conditions</label>
            </div>
        </div>
        <div class="col-12 order-12">
            <div class="btn-area apply-btn-area">
                <button type="submit" id="loginButton">Submit</button>
            </div>
        </div>
    </div>
</form>
<script>
    $(function(){
        $('#loginButton').click(function(event){
            event.preventDefault()
            var is_checked = $('#check').prop('checked');
            if(is_checked){
                $('#register-form').submit();
            }else{
                $('#notAgree').css("display","block")
            }
        });
    })
</script>
