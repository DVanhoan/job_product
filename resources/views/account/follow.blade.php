@extends('layouts.account')

@section('content')
    <div class="account-layout border">
        <div class="account-hdr bg-primary text-white border">
            VIewing all followers
        </div>
        <div class="account-bdy p-3">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="table-responsive pt-3">
                        <table class="table table-hover table-striped small">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Email</th>
                                <th>followed on</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($follows->count())
                                @foreach ($follows as $follow)
                                    @php
                                        $user = App\Models\User::find($follow->follower_id);
                                    @endphp
                                    <tr>
                                        <td>{{ $follow->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <a
                                                href="mailto:{{ $user->email }}"
                                            >
                                                {{ $user->email }}
                                            </a>
                                        </td>
                                        <td>{{ $follow->created_at }}</td>
                                        <td>
                                            <form
                                                action="{{ route('account.destroyUser') }}"
                                                method="POST"
                                            >
                                                @csrf
                                                @method('delete')
                                                <input
                                                    type="hidden"
                                                    name="follows_id"
                                                    value="{{ $follow->id }}"
                                                />
                                                <button class="btn primary-btn">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>There isn't any followss.</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="d-flex justify-content-center mt-4 custom-pagination"
                    >
                        {{ $follows->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection
