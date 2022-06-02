<div class="hmove">
    @forelse($news as $new)
        <div class="hitem text-black">{{ $new->heading }}</div>
    @empty
    @endforelse
</div>
