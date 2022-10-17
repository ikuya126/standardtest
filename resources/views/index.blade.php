@extends('layouts.app')

@section('title')
お問い合わせページ
@endsection


@section('content')
<div class="card-header">お問い合わせ</div>
<div class="container">
  <form method="POST" action="{{ route('form') }}">
    @csrf
  <div class="Form">
    <p class="Form-Item-Label">お名前<span class="Form-Item-Label-Required">※</span></p>
    <div class="Form-Item">
      <input type="text" name="name[]" autocomplete="family"/>
      <input type="text" name="name[]" autocomplete="last"/><br>
      @error('name[]')
      <li>{{$message}}</li>
      @enderror
    </div>
    <p class="Form-Item-example">例）山田</p>
    <p class="Form-Item-example">例）太郎</p>
    <p class="Form-Item-Label">性別<span class="Form-Item-Label-Required">※</span></p>
    <div class="Form-Item">
      <label><input type="radio" name="sex" value="1" checked="checked" style="transform:scale(2.0);">男性</label>
      <label><input type="radio" name="sex" value="2" style="transform:scale(2.0);">女性 </label>
    </div>
    @error('sex')
      <li>{{$message}}</li>
      @enderror
      <p class="Form-Item-Label">メールアドレス<span class="Form-Item-Label-Required">※</span></p>
    <div class="Form-Item">
      <input type="text" name="email" class="Form-Item-Input" ><br>
    </div>
    @error('email')
      <li>{{$message}}</li>
    @enderror
    <p class="Form-Item-example">例）text@example.com</p>
    <p class="Form-Item-Label">郵便番号<span class="Form-Item-Label-Required">※</span></p>
    <div class="Form-Item">
      <form class="h-adr">
      〒<input type="text" name="postcode" id="郵便番号" onKeyUp="$('#郵便番号').zip2addr('#住所');"  class="fullwidth-halfwidth" ><br><br>
    </div>
    @error('postcode')
      <li>{{$message}}</li>
      @enderror
    <p class="Form-Item-example">例）12345678</p>
    <p class="Form-Item-Label">住所<span class="Form-Item-Label-Required">※</span></p>
    <div class="Form-Item">
      <input type="text" id="住所" name="address"><br>
    </div>
    @error('address')
      <li>{{$message}}</li>
      @enderror
    <p class="Form-Item-example">例）東京都渋谷区千駄ヶ谷1-2-3</p>
    <p class="Form-Item-Label">建物名</p>
    <div class="Form-Item">
      <input type="text" name="building_name" ><br>
    </div>
    <p class="Form-Item-example">例）千駄ヶ谷マンション101</p>
    <p class="Form-Item-Label">ご意見<span class="Form-Item-Label-Required">※</span></p>
    <div class="Form-Item">
      <textarea name="opinion" class="Form-Item-Textarea"></textarea>
    </div>
    @error('opinion')
      <li>{{$message}}</li>
      @enderror
    <input type="submit" class="Form-button" value="確認">
      </form>
      
    </div>
    
  </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.zip2addr.js"></script>
@endsection
