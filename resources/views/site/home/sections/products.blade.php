<!-- Featured Products Showcase -->
<section class="section-padding bg-leaf-soft border-line-y">
  <div class="container">
    <div style="display: flex; flex-direction: column; justify-content: space-between; align-items: flex-start; gap: 1rem;" class="sm-flex-row">
      <div>
        <p class="section-label">{{ $settings['subtitle'] ?? 'Product catalogue' }}</p>
        <h2 class="section-title">{{ $settings['title'] ?? 'Products from farms across Nepal' }}</h2>
        <p class="section-copy">{{ $settings['copy'] ?? 'Directly sourced from farmer groups with transparent grading and guaranteed quality.' }}</p>
      </div>
      <a href="{{ route('products') }}" class="btn btn-outline-forest">All products →</a>
    </div>

    <div style="margin-top: 2.5rem;" class="product-grid">
      @if(isset($featured_products) && $featured_products->isNotEmpty())
        @foreach($featured_products as $product)
          <div class="product-card-wrap">
            <article class="product-card">
              <div class="product-card-img-wrap">
                <img src="{{ $product->url_image }}" alt="{{ $product->name }}" class="product-card-img" loading="lazy">
                @if($product->tag)
                  <span class="product-season-badge">{{ $product->tag }}</span>
                @endif
              </div>
              <div class="product-card-body">
                <span class="product-card-origin">{{ $product->district ? $product->district . ' district' : 'Nepal' }}</span>
                <h3 class="product-card-title"><a href="{{ route('products.detail', $product->slug) }}">{{ $product->name }}</a></h3>
                @if($product->nepali_name)
                  <p class="product-card-nepali">{{ $product->nepali_name }}</p>
                @endif
                <p class="product-card-short">{{ Str::limit(strip_tags($product->description ?? ''), 85) }}</p>
                <div class="product-card-footer">
                  <span class="product-pack">{{ $product->unit ?: 'Per pack' }}</span>
                  <a href="{{ route('products.detail', $product->slug) }}" class="product-view-btn">View details →</a>
                </div>
              </div>
            </article>
          </div>
        @endforeach
      @else
        <!-- Fallback 1: Jumla Marsi Red Rice -->
        <div class="product-card-wrap">
          <article class="product-card">
            <div class="product-card-img-wrap">
              <img src="{{ asset('assets/images/products/rice-marsi.jpg') }}" alt="Jumla Marsi Red Rice" class="product-card-img" loading="lazy">
              <span class="product-season-badge">New harvest</span>
            </div>
            <div class="product-card-body">
              <span class="product-card-origin">Jumla district</span>
              <h3 class="product-card-title"><a href="{{ route('products.detail', 'jumla-marsi-rice') }}">Jumla Marsi Red Rice</a></h3>
              <p class="product-card-nepali">जुम्ला मार्सी चामल</p>
              <p class="product-card-short">Nutty, slightly sweet red rice grown above 2,400 metres in Sinja valley.</p>
              <div class="product-card-footer">
                <span class="product-pack">1 kg, 5 kg, 25 kg</span>
                <a href="{{ route('products.detail', 'jumla-marsi-rice') }}" class="product-view-btn">View details →</a>
              </div>
            </div>
          </article>
        </div>

        <!-- Fallback 2: Marpha Apple -->
        <div class="product-card-wrap">
          <article class="product-card">
            <div class="product-card-img-wrap">
              <img src="{{ asset('assets/images/products/apple-mustang.jpg') }}" alt="Marpha Apple" class="product-card-img" loading="lazy">
              <span class="product-season-badge">Asoj harvest</span>
            </div>
            <div class="product-card-body">
              <span class="product-card-origin">Mustang district</span>
              <h3 class="product-card-title"><a href="{{ route('products.detail', 'marpha-apple') }}">Marpha Apple</a></h3>
              <p class="product-card-nepali">मार्फा स्याउ</p>
              <p class="product-card-short">Crisp, juicy apples from the dry Kali Gandaki valley at 2,670m altitude.</p>
              <div class="product-card-footer">
                <span class="product-pack">Per kg & 10 kg box</span>
                <a href="{{ route('products.detail', 'marpha-apple') }}" class="product-view-btn">View details →</a>
              </div>
            </div>
          </article>
        </div>

        <!-- Fallback 3: Raw Chiuri Honey -->
        <div class="product-card-wrap">
          <article class="product-card">
            <div class="product-card-img-wrap">
              <img src="{{ asset('assets/images/products/honey-chiuri.jpg') }}" alt="Raw Chiuri Honey" class="product-card-img" loading="lazy">
            </div>
            <div class="product-card-body">
              <span class="product-card-origin">Surkhet district</span>
              <h3 class="product-card-title"><a href="{{ route('products.detail', 'chiuri-honey') }}">Raw Chiuri Honey</a></h3>
              <p class="product-card-nepali">चिउरी मह</p>
              <p class="product-card-short">Thick, pale winter honey harvested from butter tree forests by women beekeepers.</p>
              <div class="product-card-footer">
                <span class="product-pack">250g, 500g, 1kg</span>
                <a href="{{ route('products.detail', 'chiuri-honey') }}" class="product-view-btn">View details →</a>
              </div>
            </div>
          </article>
        </div>

        <!-- Fallback 4: Ilam Orthodox Black Tea -->
        <div class="product-card-wrap">
          <article class="product-card">
            <div class="product-card-img-wrap">
              <img src="{{ asset('assets/images/products/tea-ilam.jpg') }}" alt="Ilam Orthodox Black Tea" class="product-card-img" loading="lazy">
            </div>
            <div class="product-card-body">
              <span class="product-card-origin">Ilam district</span>
              <h3 class="product-card-title"><a href="{{ route('products.detail', 'ilam-orthodox-tea') }}">Ilam Orthodox Black Tea</a></h3>
              <p class="product-card-nepali">इलाम चिया</p>
              <p class="product-card-short">Hand rolled first and second flush from the misty slopes above Kanyam.</p>
              <div class="product-card-footer">
                <span class="product-pack">100g, 250g packs</span>
                <a href="{{ route('products.detail', 'ilam-orthodox-tea') }}" class="product-view-btn">View details →</a>
              </div>
            </div>
          </article>
        </div>
      @endif
    </div>
  </div>
</section>
