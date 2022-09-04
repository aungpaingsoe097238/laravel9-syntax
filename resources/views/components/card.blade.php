<div {{ $attributes->merge(['class' => 'card']) }}>
   <div class="card-body">
        <h5>{{ $title ?? 'Card Title' }}</h5>
       <hr>
       {{ $slot }}
   </div>
</div>
