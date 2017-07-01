@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3>System Log</h3>
                </div>

                <div class="panel-body">

                    @if(! empty($lines))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col-sm-2">Date</th>
                                    <th class="col-sm-1">Type</th>
                                    <th class="col-sm-9">Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lines as $line)
                                    <tr>
                                        <td>
                                            <p>{{ $line[0] }} {{ $line[1] }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $line[2] }}</p>
                                        </td>
                                        <td>
                                            <p
                                                class="alert alert-{{ $css_map[$line['status']] }}"
                                                style="margin:0; word-break: break-all;"
                                            >
                                                {{ $line[3] }}
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="alert alert-info">No log file found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection