<div class="card">
  <h2>About Me</h2>
  <div class="fakeimg" style="height:100px;">Image</div>
  <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
</div>
<div class="card">
  <h3>Category</h3>
  <div class="category">
  @php 
    $category = DB::table('categories')->get();
    @endphp
    @if($category)
    @foreach ($category as $cat)                          
      <ul>
        <li><a href="{{ route('home.category', $cat->id) }}">{{ $cat->title}}</a></li>
      </ul>                          
  @endforeach
  @endif 
  </div>
</div>
<div class="card">
  <h3>Follow Me</h3>
  <p>Some text..</p>
</div>