@extends('layouts.app')

@section('title')
管理ページ
@endsection

@section('content')
<div class="card-header">管理システム</div>
<div class="container">
  <form method="post" action="{{ route('manage') }}">
    @csrf
  <div class="Form">
    <div class="Form-Item">
      <p class="Form-Item-Label">お名前</p>
      <input type="text" name="fullname">
    </div>
    <div class="Form-Item">
      <p class="Form-Item-Label">性別</p>
      <label><input type="radio" name="sex" value="1,2" checked="checked">全て</label>
      <label><input type="radio" name="sex" value="1" >男</label>
      <label><input type="radio" name="sex" value="2">女 </label>
    </div>
    <div class="Form-Item">
      <p class="Form-Item-Label">登録日</p>
      <input type="date" name="created_at" placeholder="from_date">
        <span class="mx-3 text-grey">~</span>
      <input type="date" name="created_at" placeholder="until_date">
    </div>
    <div class="Form-Item">
        <p class="Form-Item-Label">メールアドレス</p>
      <input type="text" name="email" class="Form-Item-Input" ><br>
    </div>
    <div class="Form-Item">
    <input type="submit" class="Form-button" value="検索">
    </div>
  </div>
  </form>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>ご意見</th>
      </tr>
    </thead>
    <tbody>
      @foreach($contact as $contact)
        <tr>
          <td>{{ $contact->id }}</td>
          <td>{{ $contact->fullname}}</td>
          @if($contact->gender === 1)
          <td>男</td>
          @else
          <td>女</td>
          @endif
          <td>{{ $contact->email}}</td>
          <td>{{ $contact->opinion}}</td>
          <form action="/managepage{{ $contact->id }}" method="post" class="delete" >
          @csrf
          @method('delete')
          <td>
          <input type="submit"  value="削除" class="delete-button">
          </td>
          </form>
        </tr>
      @endforeach
    </tbody>
  </table>  
</div>
@endsection