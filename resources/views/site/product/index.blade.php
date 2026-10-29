@extends('layout.site')

@section('body_class', 'products-catalog-page')

@section('content')
  @php
    $products = $products ?? [];
  @endphp
  @include('site._partial.ticker')

  <main class="products-catalog-page">
    @include('site._partial.breadcrumb', [
      'title' => 'Munaa Products',
      'nepali_title' => 'उत्पादनहरू',
      'subtitle' => 'Authentic farm products and indigenous agricultural staples available through Munaa Krishi outlets.',
      'bg_image' => 'assets/images/products/greens-seasonal.jpg',
      'breadcrumbs' => ['Products' => '']
    ])

    <section class="section-padding">
      <div class="container">
        <div>
          <p class="section-label">Product catalogue</p>
          <h2 class="section-title">Products from farms across Nepal</h2>
        </div>

        <!-- Category Filters -->
        <div style="margin-top: 2rem;" class="filter-bar">
          <button type="button" class="filter-pill category-filter-btn active" data-category="all">All products</button>
          <button type="button" class="filter-pill category-filter-btn" data-category="grains">Grains and Flour</button>
          <button type="button" class="filter-pill category-filter-btn" data-category="vegetables">Vegetables</button>
          <button type="button" class="filter-pill category-filter-btn" data-category="fruits">Fruits</button>
          <button type="button" class="filter-pill category-filter-btn" data-category="honey">Honey</button>
          <button type="button" class="filter-pill category-filter-btn" data-category="dairy">Dairy and Cheese</button>
          <button type="button" class="filter-pill category-filter-btn" data-category="tea-spices">Tea and Spices</button>
          <button type="button" class="filter-pill category-filter-btn" data-category="pickles-dried">Pickles and Dried</button>
        </div>

        <!-- Products Grid -->
        <div style="margin-top: 2.5rem;" class="product-grid shopping-grid" id="product-cards-container">
          @if(count($products) > 0)
            @foreach($products as $product)
              <div class="product-card-wrap" data-category="{{ $product['category'] ?? 'grains' }}">
                <article class="product-card">
                  <div class="product-card-img-wrap">
                    @php
                      $pImg = $product['image'] ?? 'assets/images/products/rice-marsi.jpg';
                      $imgUrl = (str_starts_with($pImg, 'http') || str_starts_with($pImg, 'assets/')) ? asset($pImg) : asset($pImg);
                    @endphp
                    <img src="{{ $imgUrl }}" alt="{{ $product['name'] }}" class="product-card-img" loading="lazy">
                    @if(!empty($product['tag']))
                      <span class="product-season-badge">{{ $product['tag'] }}</span>
                    @endif
                  </div>
                  <div class="product-card-body">
                    <span class="product-card-origin">{{ $product['district'] ?? 'Nepal' }}</span>
                    <h3 class="product-card-title">
                      <a href="{{ route('products.detail', $product['slug']) }}">{{ $product['name'] }}</a>
                    </h3>
                    <p class="product-card-nepali">{{ $product['nepali'] }}</p>
                    <p class="product-card-short">{{ $product['description'] }}</p>
                    <div class="product-card-footer">
                      <span class="product-pack">{{ $product['unit'] ? 'Per ' . $product['unit'] : 'Pack' }}</span>
                      <a href="{{ route('products.detail', $product['slug']) }}" class="product-view-btn">View details →</a>
                    </div>
                  </div>
                </article>
              </div>
            @endforeach
          @else
            <div style="grid-column: 1 / -1; text-align: center; padding: 3rem 1rem; color: var(--color-muted);">
              No products found in the catalogue.
            </div>
          @endif
        </div>
      </div>
    </section>
  </main>
@endsection
