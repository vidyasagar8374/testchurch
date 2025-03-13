<?php $i = 1; ?>
@foreach($masslist as $key => $data)
@if($data->is_read == 1)
        <?php $classname = "bg-danger-subtle"; ?>
    @else
        <?php $classname = ""; ?>
    @endif
    <!-- Debugging -->
    <tr class="{{ $classname }}">

        <td>{{$i}}</td>
        <td>
            <p>{{$data->fname}} {{$data->lname}}</p>
        </td>
        <td>
            <p>{{$data->from_address}}</p>
        </td>
        <td> 
            @foreach($data->massrequestlist as $massrequestlist) 
                @foreach($massrequestlist->masslistname as $infolist)
                    <p>{{$infolist->short_code}}
                    @if(!empty($massrequestlist->mass_info_data)) : {{$massrequestlist->mass_info_data}} @endif</p>
                @endforeach
            @endforeach
        </td>
        <td>
        <div class="dropdown">
            <a class="" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-three-dots"></i>
            </a>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/isreadmass/{{ $data->id }}">Read</a></li>
            </ul>
            </div>
        </td>
    </tr>
    <?php $i++ ?>
@endforeach
