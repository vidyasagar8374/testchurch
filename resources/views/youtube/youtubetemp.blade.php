@extends('base')
@section('title', 'YouTube')
@section('content')

<div class="container-fluid contact-header shadow">
    <div class="breadcum-badge p-3 pt-5 pb-5 text-center">
        <h3>Telecast</h3>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <!-- Video Cards -->
        @if($listdata->count() > 0)
            @foreach($listdata as $item)
                <div class="col-md-4 col-sm-6 col-12 video-card mb-4">
                    <div class="video-wrapper">
                        <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ $item->video_id }}" frameborder="0" allowfullscreen></iframe>
                        <div class="video-info">
                            <div class="video-title">{{ $item->title }}</div>
                            <div class="video-description">{{ $item->subtitle }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center">No videos available.</p>
        @endif
    </div>

    <!-- Pagination -->
    <div class="mt-4">
    {{ $listdata->links('pagination::bootstrap-5') }}
    </div>
</div>

<style>
    .video-wrapper {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    .video-info {
        display: flex;
        flex-direction: column;
    }
    .video-title {
        font-weight: bold;
        font-size: 16px;
    }
    .video-description {
        font-size: 14px;
        color: gray;
    }
</style>

@endsection
