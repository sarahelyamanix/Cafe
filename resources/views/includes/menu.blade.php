<nav class="tm-black-bg tm-drinks-nav">
  <ul>
    @foreach($categories as $category)
    <li>
      <a href="#category-{{ $category->id }}" class="tm-tab-link">{{ $category->name }}</a>
    </li>
    @endforeach
  </ul>
</nav>

@foreach($categories as $category)
<div id="category-{{ $category->id }}" class="tm-tab-content">
  <div class="tm-list">
    @if($category->beverages->isEmpty())
      <p>No beverages found for this category.</p>
    @else
      @foreach($category->beverages as $beverage)
      <div class="tm-list-item">
        <img src="{{ asset('assets/images/' . $beverage->image) }}" alt="{{ $beverage->title }}" class="tm-list-item-img">
        <div class="tm-black-bg tm-list-item-text">
          <h3 class="tm-list-item-name">{{ $beverage->title }}<span class="tm-list-item-price">${{ $beverage->price }}</span></h3>
          <p class="tm-list-item-description">{{ $beverage->content }}</p>
        </div>
      </div>
      @endforeach
    @endif
  </div>
</div>
@endforeach
