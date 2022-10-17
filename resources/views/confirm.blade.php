@extends('layouts.app')

@section('title')
確認ページ
@endsection


@section('content')
<div class="card-header">内容確認</div>
<div class="container">
  <form method="POST" action="{{ route('create') }}">
    @csrf
  <div class="Form">
    <div class="Form-Item">
      <p class="Form-Item-Label">お名前</p>
      <div class="Confirm-Item">{{ $input["name"]}}</div>
    </div>
    <div class="Form-Item">
      <p class="Form-Item-Label">性別</p>
      <div class="Confirm-Item">{{ $input["sex"] }}</div>
    </div>
    <div class="Form-Item">
      <p class="Form-Item-Label">メールアドレス</p>
      <div class="Confirm-Item">{{ $input["email"] }}</div>
    </div>
    <div class="Form-Item">
      <p class="Form-Item-Label">郵便番号</p>
      <div class="Confirm-Item">{{ $input["postcode"] }}</div>
    </div>
    <div class="Form-Item">
      <p class="Form-Item-Label">住所</p>
      <div class="Confirm-Item">{{ $input["address"] }}</div>
    </div>
    <div class="Form-Item">
      <p class="Form-Item-Label">ご意見</p>
      <div class="Confirm-Item">{{ $input["opinion"] }}</div>
    </div>
  </div>
  <input type="submit" class="Form-button" value="送信">
  <input name="back" type="submit" value="修正する" />
  </form>
    
  </div>
</div>
@endsection