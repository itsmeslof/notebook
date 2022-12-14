@props(['notebook', 'activeShareLinks'])

<div class="flex flex-col space-y-4">
    @forelse ($activeShareLinks as $shareLink)
        <x-notebooks.share.link-details-card
            :$notebook
            :$shareLink
        />
    @empty
        <p>No active share links</p>
    @endforelse
</div>
