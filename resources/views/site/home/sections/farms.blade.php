<!-- Partner Farms Showcase -->
<section class="section-padding">
  <div class="container">
    <div style="display: flex; flex-direction: column; justify-content: space-between; align-items: flex-start; gap: 1rem;" class="sm-flex-row">
      <div>
        <p class="section-label">{{ $settings['subtitle'] ?? 'Farmer origin' }}</p>
        <h2 class="section-title">{{ $settings['title'] ?? 'The farms behind your food' }}</h2>
        <p class="section-copy">{{ $settings['copy'] ?? 'The cooperatives and smallholder farms behind Munaa produce.' }}</p>
      </div>
      <a href="{{ route('farms') }}" class="btn btn-outline-forest">Explore all farms →</a>
    </div>

    <div class="farm-grid" style="margin-top: 2.5rem;">
      @if(isset($partner_farms) && $partner_farms->isNotEmpty())
        @foreach($partner_farms as $farm)
          <div class="farm-card-wrap">
            <article class="farm-card">
              <a href="{{ route('farms.detail', $farm->slug) }}" class="farm-card-img-wrap" aria-label="{{ $farm->name }}">
                <img src="{{ $farm->url_image }}" alt="{{ $farm->name }}" class="farm-card-img" loading="lazy">
              </a>
              <div class="farm-card-body">
                <span class="farm-location">{{ strtoupper(($farm->district ?? '') . ($farm->province ? ', ' . $farm->province : '')) }}</span>
                <h3 class="farm-title"><a href="{{ route('farms.detail', $farm->slug) }}">{{ $farm->name }}</a></h3>
                <p class="farm-meta">Elevation: {{ $farm->altitude ?? '2,400m' }} · {{ $farm->farmers_count ?? '100+' }} farmer families</p>
                <p class="farm-summary">{{ Str::limit(strip_tags($farm->description ?? ''), 130) }}</p>
                <div class="farm-card-footer">
                  <a href="{{ route('farms.detail', $farm->slug) }}" class="farm-link">View farm story & produce →</a>
                </div>
              </div>
            </article>
          </div>
        @endforeach
      @else
        <!-- Fallback Farm 1 -->
        <div class="farm-card-wrap">
          <article class="farm-card">
            <a href="{{ route('farms.detail', 'sinja-marsi-cooperative') }}" class="farm-card-img-wrap" aria-label="Sinja Valley High Altitude Cooperative">
              <img src="{{ asset('assets/images/farms/nepal-terrace-farm.jpg') }}" alt="Sinja Valley High Altitude Cooperative" class="farm-card-img" loading="lazy">
            </a>
            <div class="farm-card-body">
              <span class="farm-location">JUMLA, KARNALI PROVINCE</span>
              <h3 class="farm-title"><a href="{{ route('farms.detail', 'sinja-marsi-cooperative') }}">Sinja Valley High Altitude Cooperative</a></h3>
              <p class="farm-meta">Elevation: 2,400 - 2,800m · 140 farmer families</p>
              <p class="farm-summary">Historic origins of Nepali language and cold-climate agriculture. Farmers here use zero synthetic fertilizers and irrigate with direct glacier runoff.</p>
              <div class="farm-card-footer">
                <a href="{{ route('farms.detail', 'sinja-marsi-cooperative') }}" class="farm-link">View farm story & produce →</a>
              </div>
            </div>
          </article>
        </div>

        <!-- Fallback Farm 2 -->
        <div class="farm-card-wrap">
          <article class="farm-card">
            <a href="{{ route('farms.detail', 'marpha-thakali-orchard') }}" class="farm-card-img-wrap" aria-label="Muktinath Valley Orchard Collective">
              <img src="{{ asset('assets/images/farms/tea-field.jpg') }}" alt="Muktinath Valley Orchard Collective" class="farm-card-img" loading="lazy">
            </a>
            <div class="farm-card-body">
              <span class="farm-location">MUSTANG, GANDAKI PROVINCE</span>
              <h3 class="farm-title"><a href="{{ route('farms.detail', 'marpha-thakali-orchard') }}">Muktinath Valley Orchard Collective</a></h3>
              <p class="farm-meta">Elevation: 2,700m · 85 farmer families</p>
              <p class="farm-summary">Rain-shadow alpine climate with intense solar radiation produces unmatched natural sugars and crispness in every harvest.</p>
              <div class="farm-card-footer">
                <a href="{{ route('farms.detail', 'marpha-thakali-orchard') }}" class="farm-link">View farm story & produce →</a>
              </div>
            </div>
          </article>
        </div>

        <!-- Fallback Farm 3 -->
        <div class="farm-card-wrap">
          <article class="farm-card">
            <a href="{{ route('farms.detail', 'kanyam-small-tea-growers') }}" class="farm-card-img-wrap" aria-label="Kanyam Smallholder Bio-Tea Growers">
              <img src="{{ asset('assets/images/farms/kanyam-tea.jpg') }}" alt="Kanyam Smallholder Bio-Tea Growers" class="farm-card-img" loading="lazy">
            </a>
            <div class="farm-card-body">
              <span class="farm-location">ILAM, KOSHI PROVINCE</span>
              <h3 class="farm-title"><a href="{{ route('farms.detail', 'kanyam-small-tea-growers') }}">Kanyam Smallholder Bio-Tea Growers</a></h3>
              <p class="farm-meta">Elevation: 1,850m · 210 farmer families</p>
              <p class="farm-summary">Mist-covered mountain slopes yielding world-class organic tea leaves picked during morning dew by generational tea masters.</p>
              <div class="farm-card-footer">
                <a href="{{ route('farms.detail', 'kanyam-small-tea-growers') }}" class="farm-link">View farm story & produce →</a>
              </div>
            </div>
          </article>
        </div>
      @endif
    </div>
  </div>
</section>
