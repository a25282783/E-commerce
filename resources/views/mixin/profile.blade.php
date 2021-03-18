<div class="item-wrap">
    <label for="first_name">
        <span class="form-required">*</span>FIRST NAME
    </label>
    <div class="input-wrap">
        <input id="first_name" name="first_name" type="text" value="{{ old('first_name')?old('first_name'):$user->first_name }}"  placeholder="First Name" >
        @error('first_name')
        <span class="form-required">
            {{ $message }}
        </span>
        @enderror
    </div>
</div>
<div class="item-wrap">
    <label for="last_name">
        <span class="form-required">*</span>
        LAST NAME
    </label>
    <div class="input-wrap">
        <input id="last_name" name="last_name" type="text" value="{{ old('last_name')?old('last_name'):$user->last_name }}" placeholder="Last Name" required>
        @error('last_name')
        <span class="form-required">
            {{ $message }}
        </span>
        @enderror
    </div>
</div>
<div class="item-wrap">
    <label for="mobile">
        <span class="form-required">*</span>
        PHONE NUMBER
    </label>
    <div class="input-wrap">
        <input id="mobile" name="mobile" type="number" placeholder="PHONE NUMBER" required value="{{ old('mobile')?old('mobile'):$user->mobile }}">
        @error('mobile')
        <span class="form-required">
            {{ $message }}
        </span>
        @enderror
    </div>
</div>
<div class="item-wrap">
    <label for="address">
        <span class="form-required">*</span>
        ADRESS
    </label>
    <div class="input-wrap">
        <input id="address" name="address" type="text" placeholder="please enter your address" required value="{{ old('address')?old('address'):$user->address }}">
        @error('address')
        <span class="form-required">
            {{ $message }}
        </span>
        @enderror
    </div>
</div>
<div class="item-wrap item-wrap-6">
    <div class="item">
        <label for="city">CITY</label>
        <div class="input-wrap">
            <input id="city" name="city" type="text" placeholder="ex:Xizhi Dist." value="{{ old('city')?old('city'):$user->city }}">
        </div>
    </div>

    <div class="item">
        <label for="state">STATE/PROVINCE/REGION</label>
        <div class="input-wrap">
            <input id="state" name="state" type="text" placeholder="ex:Taipei" value="{{ old('state')?old('state'):$user->state }}">
        </div>
    </div>
</div>
<div class="item-wrap item-wrap-6">
    <div class="item">
        <label for="zip_code">ZIP</label>
        <div class="input-wrap">
            <input id="zip_code" name="zip_code" type="text" placeholder="ex:106" value="{{ old('zip_code')? old('zip_code'):$user->zip_code }}">
        </div>
    </div>
    <div class="item">
        <label for="country">COUNTRY</label>
        <div class="input-wrap">
            <input id="country" name="country" type="text" placeholder="ex:TAIWAN" value="{{ old('country')?old('country'):$user->country }}">
        </div>
    </div>
</div>
