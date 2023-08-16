@extends("layouts/app")

@section("head")
{{-- css --}}
<link href="{{ asset("css/create.css") }}" rel="stylesheet">
@endsection

@section('body')
{{-- <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type='text' name='title'>
    <textarea name='content'>
    </textarea>
    <input type='file' name='preview_image'>
    <button>送出</button>
</form> --}}

<div class="container">
    <form id="contact" action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <img src="{{ asset('img/create/user.png') }}" alt="Profile Picture" class="profile-picture">

          <fieldset>
            <br><label><h5><b>標題</b></h5></label>
            <input placeholder="請輸入標題" type="text" name="title" value="{{ $post->title }}" required autofocus>
          </fieldset>
          <fieldset>
            <label><h5><b>敘述</b></h5></label>
            <textarea placeholder="請輸入文章內容" type="text" name="content" required>{{ $post->content }}</textarea>
          </fieldset>

        <fieldset class="file-upload-container">
            <label for="myfile" class="file-upload">
              <img src="{{ asset('img/create/media.png') }}" alt="Upload" class="upload-icon">
              </label>
          <input type="file" id="myfile" name="preview_image">
          </fieldset>
          
        <br><label><h5><b>類型</b></h5></label>
        
            <ul class="ks-cboxtags">
              <li><input type="checkbox" name="tags[]" value="潛點" id="checkboxOne"><label for="checkboxOne">潛點</label></li>
              <li><input type="checkbox" name="tags[]" value="潛店" id="checkboxTwo"><label for="checkboxTwo">潛店</label></li>
              <li><input type="checkbox" name="tags[]" value="背包客房" id="checkboxThree"><label for="checkboxThree">背包客房</label></li>
              <li><input type="checkbox" name="tags[]" value="潛水用品店" id="checkboxFour"><label for="checkboxFour">潛水用品店</label></li>
              <li><input type="checkbox" name="tags[]" value="秘境" id="checkboxFive"><label for="checkboxFive">秘境</label></li>
              <li><input type="checkbox" name="tags[]" value="揪團" id="checkboxSix"><label for="checkboxSix">揪團</label></li>
              <li><input type="checkbox" name="tags[]" value="心情" id="checkboxSeven"><label for="checkboxSeven">心情</label></li>
              <li><input type="checkbox" name="tags[]" value="其他" id="checkboxEight"><label for="checkboxEight">其他</label></li>
            </ul>
        <fieldset class="button-container">
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">送出</button>
            <button name="cancel" type="cancel" id="contact-cancel" data-cancel="...Sending">取消</button>
        </fieldset>
    </form>
  </div>
@endsection

@section('script')
<script>
    const tags = @json($post->tags->map(function($row){ return $row->name; }));

    tags.forEach(tag => {
      $(`input[type=checkbox][name='tags[]'][value='${tag}']`).prop('checked', true);
    })
</script>
@endsection