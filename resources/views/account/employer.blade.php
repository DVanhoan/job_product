@extends('layouts.employer')

@section('content')
<div class="employer-content border bg-light">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h4 class="card-title mb-0">Opening Jobs</h4>
        </div>
        <div class="card-body">
            @foreach ($posts as $post)
                <div class="row mb-4 hover-shadow align-items-center pb-3 pt-3 border rounded bg-white">


                    <div class="col-12 col-md-3 text-center">
                        <a href="{{ route('post.show', ['job' => $post]) }}">
                            <div class="p-2">
                                <img
                                    src="{{ asset($company->logo) }}"
                                    class="img-fluid rounded"
                                    alt="Company Logo"
                                    style="max-height: 100px; max-width: 100%;"
                                />
                            </div>
                        </a>
                    </div>


                    <div class="col-12 col-md-9 mt-3 mt-md-0">
                        <div class="p-md-2">
                            <a
                                href="{{ route('post.show', ['job' => $post]) }}"
                                class="text-dark text-decoration-none"
                            >
                                <h5 class="font-weight-bold mb-1">
                                    {{ $post->job_title }}
                                </h5>
                            </a>
                            <p class="text-muted mb-1">{{ $company->title }}</p>
                            <p class="small text-secondary mb-1">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $post->job_location }}
                            </p>
                            <p class="small text-secondary mb-3">
                                <i class="fas fa-lightbulb"></i>
                                {{ $post->skills }}
                            </p>


                            <div class="d-flex justify-content-between">
                                <div class="text-danger">
                                    <i class="fas fa-clock"></i>
                                    Apply Before:
                                    @php
                                        $date = new DateTime($post->deadline);
                                        echo date('d', $date->getTimestamp() - time());
                                    @endphp
                                    day[s] from now
                                </div>
                                <div class="text-info">
                                    <i class="fas fa-eye"></i>
                                    Views: {{ $post->views }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if ($posts)
            <div class="d-flex justify-content-center pagination-container">
                {{ $posts->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</div>
@endSection

@push('css')
    <style>
        .hover-shadow {
            transition: box-shadow 0.3s ease;
        }

        .hover-shadow:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #f8f9fa;
            font-size: 1.25rem;
        }

        .text-muted {
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .hover-shadow {
                padding: 1rem;
            }

            .font-weight-bold {
                font-size: 1rem;
            }

            .text-muted, .small {
                font-size: 0.8rem;
            }
        }

    </style>
@endpush
