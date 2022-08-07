<x-app-layout>

<x-slot name="header">
    <h2 class="h4 font-weight-bold">
        {{ __('Tickets') }}
    </h2>
</x-slot>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Ticket {{ $ticket->title }}</div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ __('Title') }}
                                </th>
                                <td>
                                    {{ $ticket->title }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('Platform') }}
                                </th>
                                <td>
                                    {!! $ticket->platform->name !!}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('Department') }}
                                </th>
                                <td>
                                    {{ $ticket->department->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('User') }}
                                </th>
                                <td>
                                    {{ $ticket->user->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('Service') }}
                                </th>
                                <td>
                                    {{ $ticket->service->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('Note') }}
                                </th>
                                <td>
                                    {{ $ticket->note }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('Created By') }}
                                </th>
                                <td>
                                    {{ $ticket->created_by }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="comment_text">Leave a comment</label>
                            <textarea class="form-control @error('comment_text') is-invalid @enderror" id="comment_text" name="comment_text" rows="3" required></textarea>
                            @error('comment_text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('global.submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
