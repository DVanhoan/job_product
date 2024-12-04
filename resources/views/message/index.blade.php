@extends('layouts.message')
@section('content')
<section class="message-section">
    <div id="message"></div>
    <script src="{{ mix('js/app.js') }}"></script>
</section>
@endsection

@push('css')
    <style>
        .message-section {
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }
    </style>
@endpush
